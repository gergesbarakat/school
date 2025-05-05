<?php

namespace App\Exports;

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Schedule;
use App\Models\School;
use App\Models\SchoolClass;
use App\Models\Subject;

use App\Models\Teacher;
use App\Models\Term;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class UserSheetExport implements WithMultipleSheets
{    protected $school_id;

    public function __construct($school_id)
    {
        $this->school_id = $school_id;
    }

    public function sheets(): array
    {
        $sheets = [];

        $sharedData = [
            'school_id' => $this->school_id,
            'schools' => School::where('id', $this->school_id)->get(),
            'grades' => Grade::all(),
            'schedules' => Schedule::where('school_id', $this->school_id)->get(),
            'teachers' => Teacher::where('school_id', $this->school_id)->get(),
            'subjects' => Subject::all(),
            'school_classes' => SchoolClass::where('school_id', $this->school_id)->get(),
            'classrooms' => Classroom::all(),
            'terms' => Term::where('school_id', $this->school_id)->get(),

        ];
        $viewsWithTitles = [
            ['view' => 'sssss.add', 'title' => 'معلومات هامة'],
            ['view' => 'sssss.edit', 'title' => 'انصبة المعلمات'],
            ['view' => 'sssss.table', 'title' => 'عدد الفصول'],

            ['view' => 'sssss.1', 'title' => 'أول ابتدائي'],
            ['view' => 'sssss.2', 'title' => 'ثاني ابتدائي'],
            ['view' => 'sssss.3', 'title' => 'ثالث ابتدائي'],
            ['view' => 'sssss.4', 'title' => 'رابع ابتدائي'],
            ['view' => 'sssss.5', 'title' => 'خامس ابتدائي'],
            ['view' => 'sssss.6', 'title' => 'سادس ابتدائي'],
            ['view' => 'sssss.7', 'title' => 'أول متوسط'],
            ['view' => 'sssss.8', 'title' => 'ثاني متوسط'],
            ['view' => 'sssss.9', 'title' => 'ثالث متوسط'],
            ['view' => 'sssss.10', 'title' => 'أول ثانوي'],
            ['view' => 'sssss.11', 'title' => 'ثاني ثانوي علمي'],
            ['view' => 'sssss.12', 'title' => 'ثاني ثانوي أدبي'],
            ['view' => 'sssss.13', 'title' => 'ثالث ثانوي علمي'],
            ['view' => 'sssss.14', 'title' => 'ثالث ثانوي أدبي'],
            ['view' => 'sssss.terms', 'title' => 'الشروط'],

            // add up to 14 as needed
        ];

        foreach ($viewsWithTitles as $index => $item) {
             $sheets[] = new TableExport($item['view'], $sharedData, $item['title']);
        }

        return $sheets;
    }
}
