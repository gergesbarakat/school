<?php



 namespace App\Http\Controllers;

 use App\Exports\UserSheetExport;
 use Maatwebsite\Excel\Facades\Excel;
 use Illuminate\Http\Request;

 
 class ExportsController extends Controller
 {
    public function export(Request $request)
    {
        $schoolId = $request->query('school_id');

        return Excel::download(new UserSheetExport($schoolId), 'schedules.xlsx');
    }
 }

