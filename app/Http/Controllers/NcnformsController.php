<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Collection;
use App\Notifications\NcnrequestToApproverNotification; // send to approval
use App\Notifications\NcnapproverToNotifiedSuccessNotification; // send to approval
use App\Notifications\NcnapproverToNotifiedFailNotification; // send to approval
use App\Notifications\NcnnotifiedEmail; // send to notified person
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Mail;
use Alert;
use Carbon\Carbon;
use App\Ncnform;
use App\Company;
use App\Department;
use App\Nonconformity;
use App\Status;
use App\Ncnapprover;
use App\Ncnnotified;
use App\User;
use PDF;


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
        $ncntrashed = Ncnform::onlyTrashed()->get();
        $ncnarchive = Ncnform::all()->where('active',0);
        return view('ncnforms.index', compact(
            'ncntrashed',
            'ncnarchive',
            'ncnforms'));
    }

    /**
     * Display a list of documents
     * for Notified Roles users
     */
    public function forNotified(){
        $ncnnotifieds = Ncnnotified::whereHas('ncnform', function($q){
                $q->where('id',Auth::user()->id);
        })->get();
        return view('ncnforms.notified_forms', compact('ncnnotifieds'));
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
        // $nonconformities = Nonconformity::pluck('name','id');
        $nonconformities = Nonconformity::get();

        $users = User::whereHas('roles', function($q){
            $q->where('id',2); // to approver
        })->pluck('name','id');

        // $users = User::pluck('name','id');


        return view('ncnforms.create', compact('companies',
            'nonconformities',
            'users',
            'departments'));
    }

    public function ncnapproverCreate($id)
    {

        $ncnform = Ncnform::findOrFail($id);
        $statuses = Status::pluck('name','id');
        
        $users = User::whereHas('roles', function($q){
            $q->where('id',5); // to notified
        })->pluck('name','id');

         // $users = User::pluck('name','id');


        return view('ncnforms.approver-create',compact('statuses',
            'id',
            'ncnform',
            'users'));
    }

    public function ncnnotifiedCreate($id)
    {
        $ncnform = Ncnform::findOrFail($id);
        return view('ncnforms.notified-create', compact('ncnform'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'company_list' => 'required',
            'department_list' => 'required',
            'user_list'  => 'required',
            'attach_file' => 'required',
            'date_issuance' => 'required|date',
            'nonconformity_list' => 'required'
        ],[
            'nonconformity_list.required' => 'Type of non-conformity is required'
        ]);

        $ncnform = Auth::user()->ncnforms()->create($request->all());
        $ncnform->name = Auth::user()->name;
        $ncnform->position = Auth::user()->position;
        $ncnform->attach_file = $request->file('attach_file')->store('ncnforms');
        $ncnform->save();

        $ncnform->companies()->attach($request->input('company_list'));
        $ncnform->departments()->attach($request->input('department_list'));
        $ncnform->nonconformities()->attach($request->input('nonconformity_list'));
        $ncnform->users()->attach($request->input('user_list'));

                //send email to approver
        Notification::send($ncnform->users, new NcnrequestToApproverNotification($ncnform));

         alert()->success('Success Message', 'Submitted Succesfully');
        return redirect('submitted');

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
            Notification::send($ncnapprover->users, new NcnapproverToNotifiedSuccessNotification($ncnapprover));
            }else{
            Notification::send($ncnapprover->user, new NcnapproverToNotifiedFailNotification($ncnapprover));               
            }
        }
         alert()->success('Success Message', 'Submitted Succesfully');
        return redirect('submitted');
    }


    public function ncnnotified($id, Request $request){

            $this->validate($request, [
                'action_taken' => 'required',
                'responsible' => 'required',
                'execution_date' => 'required',
            ]);


            $ncnform = Ncnform::findOrFail($id);

            $ncnnotified = $ncnform->ncnnotifieds()->create($request->all());
            // $ncnnotified->execution_date = Carbon::now();
            $ncnnotified->name = Auth::user()->name;
            $ncnnotified->position = Auth::user()->position;
            $ncnnotified->save();

            Notification::send($ncnform->user, new NcnnotifiedEmail($ncnnotified));

            alert()->success('Success Message', 'Submitted Succesfully');
            return redirect('submitted');
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ncnform $ncnform)
    {

        $nonconformities = Nonconformity::all();
        return view('ncnforms.show', compact('ncnform','nonconformities'));
    }

    /**
     * download to pdf
     */
    public function pdf(Ncnform $ncnform){
         $nonconformities = Nonconformity::all();
        $pdf = PDF::loadView('ncnforms.pdf', compact('ncnform','nonconformities'));
        return $pdf->stream('ncnform.pdf');
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
     * Transfer document to archive
     */
    public function archive(Request $request, $id)
    {
        $ncnform = Ncnform::findOrFail($id);
        $ncnform->active = 0;
        $ncnform->save();

        alert()->success('Success Message', 'Document is succefully archived');
        return redirect('ncnforms');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ncnform $ncnform)
    {
        $ncnform->active = 0;
        $ncnform->save();
        $ncnform->delete();
        alert()->success('Success Message', 'Document is succefully trashed');
        return redirect('ncnforms');
    }
}
