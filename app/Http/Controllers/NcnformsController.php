<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Collection;
use App\Notifications\NcnrequestToApproverNotification; // send to approval
use App\Notifications\NcnapproverToNotifiedSuccessNotification; // send to approval
use App\Notifications\NcnapproverToNotifiedFailNotification; // send to approval
use Illuminate\Support\Facades\Notification;
use Alert;
use Carbon\Carbon;
use App\Ncnform;
use App\Company;
use App\Department;
use App\Nonconformity;
use App\Status;
use App\Ncnapprover;
use App\User;


class NcnformsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ncnforms = Ncnform::all();
        return view('ncnforms.index', compact('ncnforms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::pluck('name','id');
        $departments = Department::pluck('name','id');
        $nonconformities = Nonconformity::pluck('name','id');
        $users = User::pluck('name','id');
        return view('ncnforms.create', compact('companies',
            'nonconformities',
            'users',
            'departments'));
    }

    public function ncnapproverCreate($id)
    {

        $ncnform = Ncnform::findOrFail($id);
        $statuses = Status::pluck('name','id');
        $users = User::pluck('name','id');

        return view('ncnforms.approver-create',compact('statuses',
            'id',
            'ncnform',
            'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ncnform = new Ncnform;
        $ncnform->user()->associate(Auth::user());
        $ncnform->name = Auth::user()->name;
        $ncnform->position = Auth::user()->position;
        $ncnform->notif_number = $request->input('notif_number');
        $ncnform->recurrence_no = $request->input('recurrence_no');
        $ncnform->date_issuance = $request->input('date_issuance');
        $ncnform->issued_by = $request->input('issued_by');
        $ncnform->issued_position = $request->input('issued_position');
        $ncnform->details_non_conformity = $request->input('details_non_conformity');
        $ncnform->attach_file = $request->file('attach_file')->store('ncnforms');
        $ncnform->save();

        $ncnform->companies()->attach($request->input('company_list'));
        $ncnform->departments()->attach($request->input('department_list'));
        $ncnform->nonconformities()->attach($request->input('nonconformity_list'));
        $ncnform->users()->attach($request->input('user_list'));

                //send email to approver
        Notification::send($ncnform->users, new NcnrequestToApproverNotification($ncnform));

        Alert::success('Success Message', 'Successfully submitted a form');
        return redirect('ncnforms');

    }


    public function ncnapprover($id, Request $request)
    {
        $ncnform = Ncnform::findOrFail($id);

        $ncnapprover = new Ncnapprover;
        $ncnapprover->user()->associate(Auth::user());
        $ncnapprover->ncnform()->associate($ncnform);

        $ncnapprover->date_approval = Carbon::now();
        $ncnapprover->name = Auth::user()->name;
        $ncnapprover->position = Auth::user()->position;
        $ncnapprover->remarks = $request->input('remarks');
        
        $ncnapprover->save();

        $ncnapprover->statuses()->attach($request->input('status_list')); 
        $ncnapprover->users()->attach($request->input('user_list')); //select notified user

         /**
         * Notify the approver via email
         */
        foreach($ncnapprover->statuses as $status){
            if($status->id == 1){
            Notification::send($ncnapprover->user, new NcnapproverToNotifiedSuccessNotification($ncnapprover));
            }else{
            Notification::send($ncnform->user, new NcnapproverToNotifiedFailNotification($ncnapprover));               
            }
        }


        Alert::success('Success Message', 'Successfully updated a form');
        return redirect('ncnforms');


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
