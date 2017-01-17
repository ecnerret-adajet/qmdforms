<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facade\Auth;
use Illuminate\Support\Facades\Collection;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Image;
use Alert;
use App\Ddrform;
use App\Status;
use App\Department;
use App\Ddrlist;
use App\Ddrapprover;

class DdrformsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ddrforms = Ddrform::all();
        return view('ddrforms.index', compact('ddrforms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ddrforms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ddrrequest = new Ddrfrom;
        $ddrrequest->user()->associate(Auth::user());
        $ddrrequest->departments()->attach($request->input('department_list'));
        $ddrrequest->reason_distribution = $request->input('reason_distribution');
        $ddrrequest->requested_by = Auth::user()->name;
        $ddrrequest->position = Auth::user()->position;
        $ddrrequest->date_requested = Carbon::now();
        $ddrrequest->date_needed = $request->input('date_needed');
        $ddrrequest->save();

        $ddrlist = new Ddrlist;
        $ddrlist->document_title = $request->input('document_title');
        $ddrlist->control_code = $request->input('control_code');
        $ddrlist->copy_no = $request->input('copy_no');
        $ddrlist->copy_holder = $request->input('copy_holder');
        $ddrlist->recieved_by = $request->input('recieved_by');
        $ddrlist->date_list = $request->input('date_list');
        $ddrlis->save();

        Alert::success('Success Message', 'Successfully submitted a form');
        return redirect('ddrforms');
    }

    public function ddrapprovers($id, Request $request)
    {
        $ddrforms = Ddrform::findOrFail($id);

        $ddrapprover = new Ddrapprover;
        $ddrapprover->ddrform()->associate($ddrforms);
        $ddrapprover->user()->associate(Auth::user());
        $ddrapprover->approved_by = $request->input('approved_by');
        $ddrapprover->position = $request->input('position');
        $ddrapprover->date_approved = Carbon::now();
        $ddrapprover->statuses()->attach($request->input('status_list'));
        $ddrapprover->save();

        Alert::success('Success Message', 'Successfully updated a form');
        return redirect('ddrforms');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
