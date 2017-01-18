<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Collection;
use App\Notification\NcnrequestToApproverNotification; // send to approval
use Illuminate\Support\Facades\Notification;
use Alert;
use Carbon\Carbon;
use App\Ncnform;
use App\Company;
use App\Department;
use App\Nonconformity;
use App\Status;
use App\Ncnapprover;


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
        return view('ncnform.index', compact('ncnforms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ncnform.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ncnrequest = new Ncnform;
        $ncnrequest->user()->associate(Auth::user());
        $ncnrequest->issuer = $request->input('issuer');
        $ncnrequest->position = $request->input('position');
        $ncnrequest->companies()->attach($request->input('company_list'));
        $ncnrequest->departments()->attach($request->input('department_list'));
        $ncnrequest->nonconformities()->attach($request->input('nonconformity_list'));
        $ncnrequest->notif_number = $request->input('notif_number');
        $ncnrequest->recurrence_no = $request->input('recurrence_no');
        $ncnrequest->date_issuance = $request->input('date_issuance');
        $ncnrequest->issued_by = $request->input('issued_by');
        $ncnrequest->issued_position = $request->input('issued_position');
        $ncnrequest->users()->attach($request->input('user_list'));
        $ncnrequest->details_non_conformity = $request->input('details_non_conformity');
        $ncnrequest->attach_file = $request->file('attach_file')->store('ncnforms');
        $ncnrequest->save();
                //send email to approver
        Notification::send($ncnrequest->users, new NcnrequestToApproverNotification($ncnrequest));

        Alert::success('Success Message', 'Successfully submitted a form');
        return redirect('ncnforms');

    }


    public function ncnapprover($id, Request $request)
    {
        $ncnrequest = Ncnform::findOrFail($id);

        $ncnapprover = new Ncnapprover;
        $ncnapprover->user()->associate(Auth::user());
        $ncnapprover->ncnform()->associate($ncnrequest);
        $ncnapprover->date_approval = Carbon::now();
        $ncnapprover->remarks = $request->input('remarks');
        $ncnapprover->statuses()->attach($request->input('status_list')); 
        $ncnapprover->users()->attach($request->input('user_list')); //select notified user
        $ncnapprover->save();

         /**
         * Notify the approver via email
         */
        foreach($ncnapprover->statuses as $status){
            if($status->id == 1){
            Notification::send($ncnapprover->users, new MissingApproverToManagementSuccessNotification($ncnapprover));
            }else{
            Notification::send($ncnform->user, new MissingApproverToManagementFailedNotification($ncnapprover));               
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
