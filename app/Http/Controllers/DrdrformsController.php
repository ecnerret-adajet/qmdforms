<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Collection;
use Illuminate\Support\Facades\Storage;
use App\Notifications\DrdrformsToReviewerNotification;
use App\Notifications\DrdrreviewerToApproverSuccessNotification;
use App\Notifications\DrdrreviewerToApproverFailedNotification;
use App\Notifications\DrdrapproverToDrdrformSuccessNotification;
use App\Notifications\DrdrapproverToDrdrformFailedNotification;
use Illuminate\Support\Facades\Notification;
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
use App\User;


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
        $companies = Company::pluck('name','id');
        $types = Type::pluck('name','id');
        $users = User::pluck('name','id');
        return view('drdrforms.create', compact('companies','types','users'));
    }

    public function drdrReviewerCreate($id)
    {
        $drdrform = Drdrform::findOrFail($id);

        $statuses = Status::pluck('name','id');
        $users = User::pluck('name','id');
        
        return view('drdrforms.reviewer-create', compact('statuses',
            'id',
            'drdrform',
            'users'));
    }

    public function drdrApproverCreate($id)
    {
        $drdrform = Drdrform::findOrFail($id);
        $statuses = Status::pluck('name','id');

        return view('drdrforms.approver-create', compact('statuses','id','drdrform'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $drdrform = new Drdrform;
        $drdrform->user()->associate(Auth::user());
        $drdrform->document_title = $request->input('document_title');
        $drdrform->reason_request = $request->input('reason_request');
        $drdrform->revision_number = $request->input('revision_number');
        $drdrform->name = Auth::user()->name; //fake to main form
        $drdrform->date_request = Carbon::now(); //fake to main form
        $drdrform->attach_file = $request->file('attach_file')->store('drdrforms');
        $drdrform->save();

        $drdrform->companies()->attach($request->input('company_list'));
        $drdrform->types()->attach($request->input('type_list'));
        $drdrform->users()->attach($request->input('user_list')); // select the reviewer

        //send email to approver
        Notification::send($drdrform->users, new DrdrformsToReviewerNotification($drdrform));

        Alert::success('Success Message', 'Successfully submitted a form');
        return redirect('drdrforms');
    }


    public function drdrreviewer($id, Request $request)
    {
        $drdrform = Drdrform::findOrFail($id);

        $drdrreviewer =  new Drdrreviewer;
        $drdrreviewer->user()->associate(Auth::user());
        $drdrreviewer->date_review = Carbon::now();
        $drdrreviewer->name = Auth::user()->name;
        $drdrreviewer->remarks = $request->input('remarks');
        $drdrreviewer->attach_file = $request->file('attach_file')->store('drdrreviewer');
        $drdrreviewer->drdrform()->associate($drdrform);
        $drdrreviewer->save();

        $drdrreviewer->statuses()->attach($request->input('status_list'));
        $drdrreviewer->users()->attach($request->input('user_list'));

        /**
         * Notify the approver via email
        */
        foreach($drdrreviewer->statuses as $status){
            if($status->id == 1){
                  Notification::send($drdrreviewer->users, new DrdrreviewerToApproverSuccessNotification($drdrreviewer));                                     
            }else{
                  Notification::send($drdrform->user, new DrdrreviewerToApproverFailedNotification($drdrreviewer));
            }
        }

        Alert::success('Success Message', 'Successfully updated a form');
        return redirect('drdrforms');
    }


    public function drdrapprover($id, Request $request)
    {

        $drdrform = Drdrform::findOrFail($id);

        $drdrapprover = new Drdrapprover;
        $drdrapprover->user()->associate(Auth::user());
        $drdrapprover->name = Auth::user()->name;
        $drdrapprover->attach_file = $request->file('attach_file')->store('drdrreviwer');
        $drdrapprover->date_approved = Carbon::now();
        $drdrapprover->date_effective = $request->input('date_effective');
        $drdrapprover->remarks = $request->input('remarks');
        $drdrapprover->drdrform()->associate($drdrform);
        $drdrapprover->save();

        
        $drdrapprover->statuses()->attach($request->input('status_list'));

        /**
         * Notify the approver via email
        */
        foreach($drdrapprover->statuses as $status){
            if($status->id == 1){
                  Notification::send($drdrapprover->user, new DrdrapproverToDrdrformSuccessNotification($drdrapprover));                                     
            }else{
                  Notification::send($drdrform->user, new DrdrapproverToDrdrformFailedNotification($drdrapprover));
            }
        }

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
        return view('drdrforms.show', compact('drdrform'));
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
