<?php

namespace App\Http\Controllers;

use App\Models\Term;
use App\Http\Requests\StoreTermRequest;
use App\Http\Requests\UpdateTermRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Classroom;
use App\Models\Schedule;

class TermController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if ($request->input('text') && count($request->input('text')) > 0) {
            Term::where(column: 'school_id', operator: Auth::guard('school')->user()->id)->delete();

            foreach ($request->input('text') as $ted) {
                if (!empty($ted)) {



                    Term::create([
                        'school_id' => Auth::guard('school')->user()->id,
                        'text' => $ted,
                    ]);
                }
            }
            return view(view: 'welcome');
        } else {




            if ($request->grade_class) {

                $classroom = Classroom::where('name', $request->grade_class)->get()->first();
                foreach ($request->class as $idd => $col) {

                    foreach ($col as $id => $g) {
                        if (count(Schedule::where('school_id', Auth::guard('school')->user()->id)->where('row_id', $id)->where('class_id', $idd)->where('grade_id', $classroom->grade_id)->where('classroom_id', $classroom->id)->get()) > 0) {
                            if (count(Schedule::where('school_id', Auth::guard('school')->user()->id)->where('row_id', $id)->where('class_id', $idd)->where('grade_id', $classroom->grade_id)->where('classroom_id', $classroom->id)->get()) > 1) {
                                Schedule::where('school_id', Auth::guard('school')->user()->id)->where('row_id', $id)->where('class_id', $idd)->where('grade_id', $classroom->grade_id)->where('classroom_id', $classroom->id)->delete();

                                $nn = Schedule::create([
                                    'school_id' => Auth::guard('school')->user()->id,
                                    'grade_id' => $classroom->grade_id,
                                    'classroom_id' => $classroom->id,
                                    'class_id' => $idd,
                                    'row_id' => $id,
                                    'teacher_id' => $g['teacher_id'],
                                    'classes_per_week' => '',
                                    'subject_id' => $g['subject_id'],
                                    'schedule_data' => $g['number'],
                                ]);
                            } else {
                                Schedule::where('school_id', Auth::guard('school')->user()->id)->where('row_id', $id)->where('class_id', $idd)->where('grade_id', $classroom->grade_id)->where('classroom_id', $classroom->id)->update([
                                    'school_id' => Auth::guard('school')->user()->id,
                                    'grade_id' => $classroom->grade_id,
                                    'classroom_id' => $classroom->id,
                                    'class_id' => $idd,
                                    'row_id' => $id,
                                    'teacher_id' => $g['teacher_id'],
                                    'classes_per_week' => '',
                                    'subject_id' => $g['subject_id'],
                                    'schedule_data' => $g['number'],

                                ]);
                            }
                        } else {
                            Schedule::create([
                                'school_id' => Auth::guard('school')->user()->id,
                                'grade_id' => $classroom->grade_id,
                                'classroom_id' => $classroom->id,
                                'class_id' => $idd,
                                'row_id' => $id,
                                'teacher_id' => $g['teacher_id'],
                                'classes_per_week' => '',
                                'subject_id' => $g['subject_id'],
                                'schedule_data' => $g['number'],

                            ]);
                        }
                    }
                }
            }

            $terms = Term::where('school_id', Auth::guard('school')->user()->id)->get();
            return view('terms.index', data: ['terms' => $terms]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTermRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Term $term)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Term $term)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTermRequest $request, Term $term)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Term $term)
    {
        //
    }
}
