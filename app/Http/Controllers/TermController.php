<?php

namespace App\Http\Controllers;

use App\Models\Term;
use App\Http\Requests\StoreTermRequest;
use App\Http\Requests\UpdateTermRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class TermController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->input('text') && count($request->input('text')) > 0 ){
                Term::where(column: 'school_id',operator: Auth::guard('school')->user()->id )->delete();

                foreach($request->input('text') as $ted){
                    if(!empty($ted)){



                    Term::create([
                        'school_id' => Auth::guard('school')->user()->id,
                        'text' => $ted,
                    ]);}
                }
                return view(view: 'welcome' );



        }else{
            $terms = Term::where('school_id',Auth::guard('school')->user()->id)->get();
            return view('terms.index',data: ['terms' => $terms]);

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
