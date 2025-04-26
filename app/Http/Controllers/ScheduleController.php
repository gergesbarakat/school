<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Schedule;
use App\Models\School;
use App\Models\SchoolClass;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ScheduleController extends Controller
{
    public function index(Request $request)
    {
        $classroom = Classroom::find($request->get('class_id'));
        $grade = Grade::find($request->get('grade_id'));
        $school = School::find($request->get('school_id'));
        $school_classes = SchoolClass::get()->where('school_id', $request->input('school_id'));

        return view('schedules.index', [
            'schools' => School::all(),
            'grades' => Grade::all(),
            'classrooms' => Classroom::all(),
            'teachers' => Teacher::all(),
            'subjects' => Subject::all(),
            'school_id' => $request->get('school_id'),
            'grade_id' => $request->get('grade_id'),
            'class_id' => $request->get('class_id'),
            'school_classes' => $school_classes,
            'classroom' => $classroom,
            'grade' => $grade,
            'school' => $school,
        ]);
    }
    public function show(Request $request)
    {
        $school_id = $request->query('s');
        $grade_id = $request->query('g');
        $class_id = $request->query('c');
        $school_classes = SchoolClass::where('school_id', $school_id)->get()->all();
        $schedules = Schedule::where('school_id', $school_id)
            ->where('grade_id', $grade_id)
            ->where('classroom_id', $class_id)
            ->get();
        $a = '';
        $b = '';
        $c = '';
        $s = '';
        $ww = 0;
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

            $unique_subjects = [];
            foreach ($schedules as $schedule) {
                $unique_subjects[] = $schedule->subject_id;
            }
            $unique_subjects = array_unique($unique_subjects);
            $row = 1;
            foreach ($unique_subjects as $unique_subject) {
                $schedules = Schedule::where('school_id', $school_id)
                    ->where('grade_id', $grade_id)
                    ->where('classroom_id', $class_id)
                    ->where('subject_id', $unique_subject)
                    ->get();

                $s = $s . '<tr class="border-black">
                    <tr class="border-black">
                <td class="bg-red-200 number  rownumber"> ' . $row . '   </td>

                <td class="bg-red-200">
                    ' . Subject::find($unique_subject)->name . '
                </td>
                <td class="bg-red-200">
                ' . Schedule::where('school_id', $school_id)
                    ->where('grade_id', $grade_id)
                    ->where('classroom_id', $class_id)
                    ->where('subject_id', $unique_subject)
                    ->get()->first()->classes_per_week . '               </td>';
                $ww = $ww + Schedule::where('school_id', $school_id)
                    ->where('grade_id', $grade_id)
                    ->where('classroom_id', $class_id)
                    ->where('subject_id', $unique_subject)
                    ->get()->first()->classes_per_week;
                foreach ($schedules as $schedule) {

                    $teacher = Teacher::find($schedule->teacher_id)->name;

                    $s = $s . '
                       <td>
                        ' . $teacher . '
                    </td>';

                }
                $s = $s . '
                </tr>';
                $row++;
            }
            foreach ($school_classes as $school_class) {
                $a = $a . '<th class="border-black bg-red-200">المعلمة</th>';

            }
            foreach ($school_classes as $school_class) {
                $b = $b . ' <th class="border-black  " colspan="1">' . $school_class->name . '</th>';

            }

            $html = '
                                        <style>
                            table.dataTable thead th,
                            table.dataTable tfoot th {
                                text-align: center;
                                justify-content: center;
                                align-items: center;
                                border: 1px solid black;

                            }

                            table.dataTable.row-border>tbody>tr>*,
                            table.dataTable.display>tbody>tr>* {
                                text-align: center;
                                justify-content: center;
                                align-items: center;
                                border: 1px solid black;

                            }
                        </style>
                        <table id="schedule-table" class="overflow-x-scroll display justify-center text-center" style="width:100%">
                            <thead>
                                <tr class="border-black">
                                    <th colspan="3" width="30%">الصفوف</th>
                                    ' . $b . '

                                </tr>
                                <tr class="border-black">
                                    <th class="border-black bg-red-200" colspan="1" data-dt-order="disable">العدد
                                    </th>
                                    <th class="border-black bg-red-200" colspan="1">المواد</th>
                                    <th class="border-black bg-red-200" colspan="1">عدد الحصص</th>'
            . $a .
            '</tr>
                            </thead>
                            <tbody>
        ' . $s . '
             </tbody>
                            <tfoot>
                                <tr class="border-black">
                                    <th colspan="3">اجمالي الحصص ' . $ww . '</th>

                                </tr>
                            </tfoot>
                        </table>


                        <a href="schedules/' . $schedules->first()->id . '/edit"class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                        EDIT Table
                    </a>
         ';
        }
        return (['html' => $html]);
    }

    public function create(Request $request)
    {
        // Pass selected values from the request to the view for pre-filling
        $classroom = Classroom::find($request->get('class_id'));
        $grade = Grade::find($request->get('grade_id'));
        $school = School::find($request->get('school_id'));
        $school_classes = SchoolClass::get()->where('school_id', $request->input('school_id'));
        return view('schedules.add', [
            'schools' => School::all(),
            'grades' => Grade::all(),
            'classrooms' => Classroom::all(),
            'teachers' => Teacher::all(),
            'subjects' => Subject::all(),
            'school_id' => $request->get('school_id'),
            'grade_id' => $request->get('grade_id'),
            'class_id' => $request->get('class_id'),
            'school_classes' => $school_classes,
            'classroom' => $classroom,
            'grade' => $grade,
            'school' => $school,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'school_id' => 'required',
            'grade' => 'required',
            'classroom' => 'required',
        ]);

        // Clear existing schedule first (optional)
        Schedule::where('school_id', $request->school_id)
            ->where('grade_id', $request->grade_id)
            ->where('class_id', $request->class_id)
            ->delete();

        foreach ($request->row as $id => $row) {
            $a = ['subject', 'classes_per_week'];
            foreach ($row as $key => $value) {

                if ($key == 'subject' || $key == 'classes_per_week') {
                } else {
                    $schoolclass_id = Str::chopStart($key, 'class');

                    Schedule::create([
                        'school_id' => $request->school_id,
                        'grade_id' => $request->grade,
                        'classroom_id' => $request->classroom,
                        'class_id' => $schoolclass_id,
                        'teacher_id' => $value['teacher'],
                        'subject_id' => $row['subject'],
                        'schedule_data' => $row['classes_per_week'],
                        'classes_per_week' => $row['classes_per_week'],
                        'row_id' => $id,

                    ]);
                }
            }
        }

        return redirect(route('schedules.index'))->with('success', 'Schedule created successfully');
    }

    public function edit(Request $request, $id)
    {
        $schedule = Schedule::find($id);
        $classroom = Classroom::find($schedule->classroom_id);
        $grade = Grade::find($schedule->grade_id);
        $school = School::find($schedule->school_id);
        $school_classes = SchoolClass::get()->where('school_id', $schedule->school_id);

        $schedules = Schedule::get()->where('school_id', $schedule->school_id)->where('classroom_id', $schedule->classroom_id)->where('grade_id', $schedule->grade_id) ;

        return view('schedules.edit', [
            'schools' => School::all(),
            'grades' => Grade::all(),
            'classrooms' => Classroom::all(),
            'teachers' => Teacher::all(),
            'subjects' => Subject::all(),
            'schedules' => $schedules,
            'school_id' => $schedule->school_id,
            'grade_id' => $schedule->grade_id,
            'class_id' => $schedule->class_id,
            'school_classes' => $school_classes,
            'classroom' => $classroom,
            'grade' => $grade,
            'school' => $school,
        ]);

    }
    public function update(Request $request, $id)
    {

        $validated = $request->validate([
            'school_id' => 'required',
            'grade' => 'required',
            'classroom' => 'required',
        ]);

           // Clear existing schedule first (optional)
        Schedule::where('school_id', $request->school_id)
            ->where('grade_id', $request->grade)
            ->where('classroom_id', $request->classroom)
            ->delete();
            $schedules = [];
        foreach ($request->row as $id => $row) {
            $a = ['subject', 'classes_per_week'];
            foreach ($row as $key => $value) {

                if ($key == 'subject' || $key == 'classes_per_week') {
                } else {
                    $schoolclass_id = Str::chopStart($key, 'class');

                    $schedules[] = Schedule::create([
                        'school_id' => $request->school_id,
                        'grade_id' => $request->grade,
                        'classroom_id' => $request->classroom,
                        'class_id' => $schoolclass_id,
                        'teacher_id' => $value['teacher'],
                        'subject_id' => $row['subject'],
                        'schedule_data' => $row['classes_per_week'],
                        'classes_per_week' => $row['classes_per_week'],
                        'row_id' => $id,

                    ]);
                }
            }
        }

        return redirect(route('schedules.index'))->with('success', 'Schedule created successfully');

        // $validated = $request->validate([
        //     'school_id' => 'required',
        //     'grade' => 'required',
        //     'classroom' => 'required',
        // ]);

        // // Clear existing schedule first (optional)
        // foreach ($request->row as $id => $row) {
        //     $a = ['subject', 'classes_per_week'];
        //     foreach ($row as $key => $value) {

        //         if ($key == 'subject' || $key == 'classes_per_week') {
        //         } else {
        //             $schoolclass_id = Str::chopStart($key, 'class');
        //             $schedule = Schedule::where('school_id', $request->school_id)
        //                 ->where('grade_id', $request->grade)
        //                 ->where('classroom_id', $request->classroom)
        //                 ->where('class_id', $schoolclass_id)
        //                 ->where('row_id', $id)

        //             ;
        //             $schedule->update([
        //                 'school_id' => $request->school_id,
        //                 'grade_id' => $request->grade,
        //                 'classroom_id' => $request->classroom,
        //                 'class_id' => $schoolclass_id,
        //                 'teacher_id' => $value['teacher'],
        //                 'subject_id' => $row['subject'],
        //                 'schedule_data' => $row['classes_per_week'],
        //                 'classes_per_week' => $row['classes_per_week'],
        //                 'row_id' => $id,

        //             ]);
        //         }
        //     }
        // }

        return redirect(route('schedules.index'))->with('success', 'Schedule updated successfully');
    }

    public function getGrades()
    {
        return response()->json(Grade::select('id', 'name')->get());
    }

    public function getClassrooms($id)
    {
        return response()->json(Classroom::select('id', 'name')->where('grade_id', $id)->get());
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
    public function getClassesByGrade($gradeId, Request $request)
    {
        $schoolId = $request->query('school_id');

        $classes = Classroom::where('grade_id', $gradeId)
            ->get(['id', 'name']);

        return response()->json($classes);
    }
}