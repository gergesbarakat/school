<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Schedule;
use App\Models\School;
use App\Models\Subject;
use App\Models\Teacher;

use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schools = School::all();
        $grades = Grade::all(); // Fetch all grades
        $classrooms = Classroom::all(); // Fetch all classrooms

        return view('schedules.index', compact('schools', 'grades', 'classrooms'));
    }
    public function show(Request $request)
    {
        $school_id = $request->query('s');
        $grade_id = $request->query('g');
        $class_id = $request->query('c');

        $schedules = Schedule::where('school_id', $school_id)
            ->where('grade_id', $grade_id)
            ->where('class_id', $class_id)
            ->get();
        if ($schedules->isEmpty()) {
            $html = '
                <div class="text-center mt-5">
                    <h2 class="text-xl text-gray-700 mb-4">No table available</h2>
                    <a href="' . route('schedules.create', [
                'school_id' => $school_id,
                'grade_id' => $grade_id,
                'class_id' => $class_id,
            ]) . '" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                        Add Table
                    </a>
                </div>';
        } else {
            $days = ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday'];
            $times = ['08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00'];

            $html = '
                <div class="mb-4 text-right">
        <a href="' . url('/schedules/' . $schedules->first()->id . '/edit') . '" class="   bg-blue-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition">Edit Schedule</a>                </div>';

            $html .= '<table class="table-auto w-full border border-gray-300 text-center">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border p-2">Day / Time</th>';

            foreach ($times as $time) {
                $html .= "<th class='border p-2'>$time</th>";
            }

            $html .= '</tr></thead><tbody>';

            foreach ($days as $day) {
                $html .= "<tr><td class='border p-2 font-semibold'>$day</td>";
                foreach ($times as $time) {
                    $cell = $schedules->firstWhere(fn($s) => $s->day === $day && $s->time === $time);
                    if ($cell) {
                        $teacher =  Teacher::find($cell->teacher_id)->name ?? 'N/A';
                        $subject =  Subject::find($cell->subject_id)->name ?? 'N/A';
                        $html .= "<td class='border p-2'>
                                    <div class='text-sm text-gray-800 font-bold'>$subject</div>
                                    <div class='text-xs text-gray-600'>$teacher</div>
                                  </td>";
                    } else {
                        $html .= "<td class='border p-2 text-gray-400'>--</td>";
                    }
                }
                $html .= '</tr>';
            }

            $html .= '</tbody></table>';
        }

        return response()->json(['html' => $html]);
    }

    public function create(Request $request)
    {
        // Pass selected values from the request to the view for pre-filling
        $classroom = Classroom::find($request->get('class_id'));
        $grade = Grade::find($request->get('grade_id'));
        $school = School::find($request->get('school_id'));

        return view('schedules.add', [
            'schools' => School::all(),
            'grades' => Grade::all(),
            'classrooms' => Classroom::all(),
            'teachers' => Teacher::all(),
            'subjects' => Subject::all(),
            'days' => ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday'],
            'timeSlots' => ['08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00'],
            'school_id' => $request->get('school_id'),
            'grade_id' => $request->get('grade_id'),
            'class_id' => $request->get('class_id'),
            'scheduleData' => [],
            'classroom' => $classroom,
            'grade' => $grade,
            'school' => $school,
        ]);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'school_id' => 'required',
            'grade_id' => 'required',
            'class_id' => 'required',
        ]);

        // Clear existing schedule first (optional)
        Schedule::where('school_id', $request->school_id)
            ->where('grade_id', $request->grade_id)
            ->where('class_id', $request->class_id)
            ->delete();

        $days = ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday'];
        $times = ['08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00'];

        foreach ($days as $day) {
            foreach ($times as $time) {
                $teacherId = $request->input("teacher.$day.$time");
                $subjectId = $request->input("subject.$day.$time");

                if ($teacherId && $subjectId) {
                    Schedule::create([
                        'school_id' => $request->school_id,
                        'grade_id' => $request->grade_id,
                        'class_id' => $request->class_id,
                        'day' => $day,
                        'time' => $time,
                        'teacher_id' => $teacherId,
                        'subject_id' => $subjectId,
                    ]);
                }
            }
        }
        $tearequestcherId =  Schedule::where('school_id', $request->school_id)
            ->where('grade_id', $request->grade_id)
            ->where('class_id', $request->class_id)->get()->all();

        return response()->json(['success' => true]);
    }

    public function edit($id)
    {
        $firstSchedule = Schedule::findOrFail($id);

        $school_id = $firstSchedule->school_id;
        $grade_id = $firstSchedule->grade_id;
        $class_id = $firstSchedule->class_id;
        $classroom = Classroom::find($class_id);
        $grade = Grade::find($grade_id);
        $school = School::find($school_id);

        $teachers = Teacher::all();
        $subjects = Subject::all();

        $days = ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday'];
        $times = ['08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00'];

        $schedules = Schedule::where('school_id', $school_id)
            ->where('grade_id', $grade_id)
            ->where('class_id', $class_id)
            ->get();
        $schedule_id = $schedules->first()->id;

        // Create table HTML
        $table = '<table class="table-auto w-full border border-gray-300 text-center">';
        $table .= '<thead><tr class="bg-gray-200"><th class="border p-2">Day / Time</th>';

        foreach ($times as $time) {
            $table .= "<th class='border p-2'>$time</th>";
        }

        $table .= '</tr></thead><tbody>';

        foreach ($days as $day) {
            $table .= "<tr><td class='border p-2 font-semibold'>$day</td>";
            foreach ($times as $time) {
                $cell = $schedules->firstWhere('day', $day)?->where('time', $time);

                $schedule = $schedules->first(function ($s) use ($day, $time) {
                    return $s->day === $day && $s->time === $time;
                });

                $subjectOptions = '<option value="">--</option>';
                foreach ($subjects as $subject) {
                    $selected = $schedule && $schedule->subject_id == $subject->id ? 'selected' : '';
                    $subjectOptions .= "<option value='{$subject->id}' $selected>{$subject->name}</option>";
                }

                $teacherOptions = '<option value="">--</option>';
                foreach ($teachers as $teacher) {
                    $selected = $schedule && $schedule->teacher_id == $teacher->id ? 'selected' : '';
                    $teacherOptions .= "<option value='{$teacher->id}' $selected>{$teacher->name}</option>";
                }

                $table .= "<td class='border p-2'>
                        <select name='subject[{$day}][{$time}]' class='mb-1 w-full border rounded px-1 py-1'>
                            $subjectOptions
                        </select>
                        <select name='teacher[{$day}][{$time}]' class='w-full border rounded px-1 py-1'>
                            $teacherOptions
                        </select>
                       </td>";
            }
            $table .= '</tr>';
        }

        $table .= '</tbody></table>';

        return view('schedules.edit', compact('table', 'school_id', 'grade_id', 'class_id', 'schedule_id', 'school', 'grade', 'classroom'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'school_id' => 'required',
            'grade_id' => 'required',
            'class_id' => 'required',
        ]);


        $days = ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday'];
        $times = ['08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00'];

        foreach ($days as $day) {
            foreach ($times as $time) {
                $teacherId = $request->input("teacher.$day.$time");
                $subjectId = $request->input("subject.$day.$time");

                if ($teacherId && $subjectId) {
                    $schedule = Schedule::where('school_id', $request->school_id)
                        ->where('grade_id', $request->grade_id)
                        ->where('class_id', $request->class_id)
                        ->where('day', $day)
                        ->where('time', $time)
                        ->first();

                    if ($schedule) {
                        // If exists, update it
                        $schedule->update([
                            'teacher_id' => $teacherId,
                            'subject_id' => $subjectId,
                        ]);
                    } else {
                        // If not, create a new one
                        Schedule::create([
                            'school_id' => $request->school_id,
                            'grade_id' => $request->grade_id,
                            'class_id' => $request->class_id,
                            'day' => $day,
                            'time' => $time,
                            'teacher_id' => $teacherId,
                            'subject_id' => $subjectId,
                        ]);
                    }
                }
            }
        }

        return response()->json(['success' => true]);
    }

    public function getGrades()
    {
        return response()->json(Grade::select('id', 'name')->get());
    }

    public function getClassrooms()
    {
        return response()->json(Classroom::select('id', 'name')->get());
    }
    public function getSchedule(Request $request)
    {
        $school_id = $request->school_id;
        $grade_id = $request->grade_id;
        $class_id = $request->class_id;

        $schedules = Schedule::where('school_id', $school_id)
            ->where('grade_id', $grade_id)
            ->where('class_id', $class_id)
            ->get();

        if ($schedules->isEmpty()) {
            return view('schedules.partials.no-schedule');
        }

        return view('schedules.partials.schedule-table', compact('schedules'));
    }

    public function fetch(Request $request)
    {
        $schedules = Schedule::where('school_id', $request->s)
            ->where('grade', $request->g)
            ->where('classroom', $request->c)
            ->get();

        if ($schedules->isEmpty()) {
            return '<h2 class="text-red-600 text-lg font-bold mb-4">No schedule available</h2>
                <a href="' . route('schedules.create', ['school_id' => $request->s, 'grade' => $request->g, 'classroom' => $request->c]) . '" class="bg-green-600 text-white px-4 py-2 rounded">Add Schedule</a>';
        }

        // Now build the table HTML
        $days = ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday'];
        $times = ['08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00'];

        $table = '<table class="w-full table-auto border border-collapse border-gray-400">
                <thead><tr><th class="border px-2 py-1">Day</th>';

        foreach ($times as $time) {
            $table .= "<th class='border px-2 py-1'>{$time}</th>";
        }

        $table .= '</tr></thead><tbody>';

        foreach ($days as $day) {
            $table .= "<tr><td class='border px-2 py-1 font-semibold'>{$day}</td>";

            foreach ($times as $time) {
                $schedule = $schedules->firstWhere('day', $day)->firstWhere('time', $time);
                if ($schedule) {
                    $teacherName = optional($schedule->teacher)->name ?? 'N/A';
                    $subjectName = optional($schedule->subject)->name ?? 'N/A';
                    $table .= "<td class='border px-2 py-1'><strong>$teacherName</strong><br><small>$subjectName</small></td>";
                } else {
                    $table .= "<td class='border px-2 py-1'>-</td>";
                }
            }

            $table .= '</tr>';
        }

        $table .= '</tbody></table>';

        // Add Edit Button
        $editUrl = route('schedules.edit', [
            'school_id' => $request->s,
            'grade' => $request->g,
            'classroom' => $request->c,
        ]);

        $table = "<a href='{$editUrl}' class='my-4 inline-block bg-yellow-600 text-white px-4 py-2 rounded'>Edit Schedule</a><br>" . $table;

        return $table;
    }
}