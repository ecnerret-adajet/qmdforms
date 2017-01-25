<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Collection;
use Illuminate\Support\Facades\Storage;
use App\Notifications\DdrformsToApproverNotification;
use App\Notifications\DdrformApprovedFailedNotification;
use App\Notifications\DdrformApprovedSuccessNotification;
use Illuminate\Support\Facades\Notification;
use Carbon\Carbon;
use Image;
use Alert;
use App\Ddrform;
use App\Status;
use App\Department;
use App\Ddrlist;
use App\Ddrapprover;
use App\User;

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
        $users = User::pluck('name','id');
        $departments = Department::pluck('name','id');
        return view('ddrforms.create',compact('departments','users'));
    }    


    public function ddrApproverCreate($id)
    {     
        $ddrform = Ddrform::findOrFail($id);
        $statuses = Status::pluck('name','id');

        return view('ddrforms.approver-create',compact('ddrform','statuses','id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ddrform = new Ddrform;
        $ddrform->user()->associate(Auth::user());
        $ddrform->reason_distribution = $request->input('reason_distribution');
        $ddrform->name = Auth::user()->name;
        $ddrform->position = Auth::user()->position;
        $ddrform->date_requested = Carbon::now();
        $ddrform->date_needed = $request->input('date_needed');
        $ddrform->save();

        $ddrform->departments()->attach($request->input('department_list'));
        $ddrform->users()->attach($request->input('user_list'));



        // $this->validate($request,[
        //     'document_title.*' => 'required',
        //     'control_code.*' => 'required',
        //     'copy_no.*' => 'required',
        //     'copy_holder.*' => 'required',
        //     'recieved_by.*' => 'required',
        //     'date_list.*' => 'required|date'
        // ]);

        $ddrlists = $request->all();
        foreach($request->input('document_title') as $ddrInput){
            $ddrlist = $ddrform->ddrlists()->save(new Ddrlist($ddrInput));
        }

        //send email to approver
        Notification::send($ddrform->users, new DdrformsToApproverNotification($ddrform));


        Alert::success('Success Message', 'Successfully submitted a form');
        return redirect('ddrforms');
    }

    public function ddrapprover($id, Request $request)
    {
        $ddrform = Ddrform::findOrFail($id);

        $ddrapprover = new Ddrapprover;
        $ddrapprover->user()->associate(Auth::user());
        $ddrapprover->ddrform()->associate($ddrform);

        $ddrapprover->name = Auth::user()->name;
        $ddrapprover->remarks = $request->input('remarks');
        $ddrapprover->position = Auth::user()->position;
        $ddrapprover->date_approved = Carbon::now();
        
        $ddrapprover->save();

        $ddrapprover->statuses()->attach($request->input('status_list'));
        /**
         * Notify the approver via email
        */
        foreach($ddrapprover->statuses as $status){
            if($status->id == 1){
                  Notification::send($ddrform->user, new DdrformApprovedSuccessNotification($ddrapprover));                                     
            }else{
                  Notification::send($ddrform->user, new DdrformApprovedFailedNotification($ddrapprover));
            }
        }
    

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
