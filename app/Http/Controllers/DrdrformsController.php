<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Collection;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Image;
use Alert;
use App\Drdrform;
use App\Status;
use App\Company;
use App\Type;
use App\Department;
use App\Drdrreviewer;
use App\Drdrapprover;


class DrdrformsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drdrforms = Drdrform::all();
        return view('drdrforms.index', compact('drdrforms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('drdrforms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $drdrrequest = new Drdrform;
        $drdrrequest->user()->associate(Auth::user());
        $drdrrequest->companies()->attach($request->input('company_list'));
        $drdrrequest->types()->attach($request->input('type_list'));
        $drdrrequest->document_title = $request->input('document_title');
        $drdrrequest->reason_request = $request->input('reason_request');
        $drdrrequest->requester = Auth::user()->name; //fake to main form
        $drdrrequest->date_request = Carbon::now(); //fake to main form
        $drdrrequest->attach_file = $request->file('attach_file')->store('drdrforms');
        $drdrrequest->users()->attach($request->input('user_list')); // select the reviewer
        $drdrrequest->save();

        Alert::success('Success Message', 'Successfully submitted a form');
        return redirect('drdrforms');
    }


    public function drdrreviewer($id, Request $request)
    {

        $drdrrequest = Drdrform::findOrFail($id);

        $drdrreviewer =  new Drdrreviewer;
        $drdrreviewer->user()->associate(Auth::user());
        $drdrreviewer->statuses()->attach($request->input('status_list'));
        $drdrreviewer->users()->attach($request->input('user_list'));
        $drdrreviewer->date_review = Carbon::now();
        $drdrreviewer->attach_file = $request->file('attach_file')->store('drdrreviewer');
        $drdrreviewer->drdrform()->associate($drdrrequest);
        $drdrreviewer->save();

        Alert::success('Success Message', 'Successfully updated a form');
        return redirect('drdrforms');
    }


    public function drdrapprover($id, Request $request)
    {

        $drdrrequest = Drdrform::findOrFail($id);

        $drdrapprover = new Drdrapprover;
        $drdrapprover->user()->associate(Auth::user());
        $drdrapprover->statuses()->attach($request->input('status_list'));
        $drdrapprover->attach_file = $request->file('attach_file')->store('drdrreviwer');
        $drdrapprover->date_approved = Carbon::now();
        $drdrapprover->date_effective = $request->input('date_effective');
        $drdrapprover->remarks = $request->input('remarks');
        $drdrapprover->drdrform()->associate($drdrrequest);
        $drdrapprover->save();

        Alert::success('Success Message', 'Successfully updated a form');
        return redirect('drdrforms');
        
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Drdrform $drdrform)
    {
        return view('drdrforms.show', compact('drdrform'))
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
