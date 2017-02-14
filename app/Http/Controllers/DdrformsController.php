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
use DB;
use Illuminate\Support\Facades\Input;

class DdrformsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ddrforms   = Ddrform::all();
        $ddrtrashed = Ddrform::onlyTrashed()->get();
        $ddrarchive = Ddrform::all()->where('active',0);

        return view('ddrforms.index', compact(
            'ddrtrashed',
            'ddrarchive',
            'ddrforms'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {     
        $departments = Department::pluck('name','id');
        $users = User::pluck('name','id');


        return view('ddrforms.create',compact('departments','users'));
    }    


    /**
     * create form for approver
     */
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

        $this->validate($request, [
            'reason_distribution' => 'required',
            'date_needed' => 'required|date',
            'department_list' => 'required',
            'user_list' => 'required',
            'document_title[]' => 'required',
            'control_code[]' => 'required',
            'copy_no[]' => 'required',
            'copy_holder[]' => 'required',
            'recieved_by[]' => 'required',
            'date_list[]' => 'required' 
        ]); 


        $ddrform = Auth::user()->ddrforms()->create($request->all());
        $ddrform->name = Auth::user()->name;
        $ddrform->position = Auth::user()->position;
        $ddrform->date_requested = Carbon::now();
        $ddrform->save();

        $ddrform->departments()->attach($request->input('department_list'));
        $ddrform->users()->attach($request->input('user_list'));

        /**
         * ddrlist array request
         */
        foreach($request->document_title as $key=>$value){
            $data[]=[
                'document_title'=> $value, 
                'control_code'=> $request->control_code[$key], 
                'copy_no'=> $request->copy_no[$key], 
                'copy_holder'=> $request->copy_holder[$key], 
                'recieved_by'=> $request->recieved_by[$key], 
                'date_list'=> $request->date_list[$key], 
            ];
        }

       foreach($data as $row){
            $ddrlist = $ddrform->ddrlists()->create($row);
        }

  




        //send email to approver
        Notification::send($ddrform->users, new DdrformsToApproverNotification($ddrform));


         alert()->success('Success Message', 'Submitted Succesfully');
       return redirect('submitted');
    }

    public function ddrapprover($id, Request $request)
    {

        $this->validate($request, [
            'remarks' => 'required',
            'status_list' => 'required'
        ]); 


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
    

        alert()->success('Success Message', 'Submitted Succesfully');
        return redirect('submitted');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ddrform $ddrform)
    {
        return view('ddrforms.show', compact('ddrform'));
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
        $ddrform = Ddrform::findOrFail($id);
        $ddrform->active = 0;
        $ddrform->save();

        alert()->success('Success Message', 'Document is succefully archived');
        return redirect('ddrforms');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ddrform $ddrform)
    {
        $ddrform->active = 0;
        $ddrform->save();
        $ddrform->delete();

        alert()->success('Success Message', 'Document is succefully trashed');
        return redirect('ddrforms');
    }
}
