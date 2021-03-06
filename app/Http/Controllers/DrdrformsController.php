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
use App\Drdrcopyholder;
use App\Drdrmr;
use App\User;
use PDF;


class DrdrformsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drdrforms = Drdrform::all()->where('active',1);
        $drdrtrashed = Drdrform::onlyTrashed()->get();
        $drdrarchive = Drdrform::all()->where('active',0);
        return view('drdrforms.index', compact('drdrforms',
            'drdrtrashed',
            'drdrarchive'));
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

        $users = User::whereHas('roles', function($q){
            $q->where('id',3); // to revierwer
        })->pluck('name','id');

        // $users = User::pluck('name','id');

        return view('drdrforms.create', compact('companies','types','users'));
    }

    public function drdrReviewerCreate($id)
    {
        $drdrform = Drdrform::findOrFail($id);

        $statuses = Status::pluck('name','id');

        $users = User::whereHas('roles', function($q){
            $q->where('id',2); // to approver
        })->pluck('name','id');

        // $users = User::pluck('name','id');

        
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
        $this->validate($request, [
            'document_title' => 'required',
            'reason_request' => 'required',
            'revision_number' => 'required',
            'company_list' => 'required',
            'type_list' => 'required',
            'user_list' => 'required',
            'attach_file' => 'required'
        ]); 

    
        $drdrform = Auth::user()->drdrforms()->create($request->all());
        $drdrform->name = Auth::user()->name; //fake to main form
        $drdrform->position = Auth::user()->position; //fake to main form
        $drdrform->date_request = Carbon::now(); //fake to main form
         if($request->hasFile('attach_file')){
        $drdrform->attach_file = $request->file('attach_file')->store('drdrforms');
      }
        $drdrform->save();

        $drdrform->companies()->attach($request->input('company_list'));
        $drdrform->types()->attach($request->input('type_list'));
        $drdrform->users()->attach($request->input('user_list')); // select the reviewer

        //send email to approver
        Notification::send($drdrform->users, new DrdrformsToReviewerNotification($drdrform));


        alert()->success('Success Message', 'Submitted Succesfully');
        return redirect('submitted');
    }


    public function drdrreviewer($id, Request $request)
    {
        $this->validate($request, [
            'remarks' => 'required',
            'status_list' => 'required',
            'user_list' => 'required',
            // 'attach_file' => 'required',
            'consider_document' => 'required'
        ]); 

        $drdrform = Drdrform::findOrFail($id);

        $drdrreviewer = new Drdrreviewer;
        $drdrreviewer->fill($request->all());
        $drdrreviewer->drdrform()->associate($drdrform);
        $drdrreviewer->user()->associate(Auth::user());
        $drdrreviewer->date_review = Carbon::now();
        $drdrreviewer->name = Auth::user()->name;
        $drdrreviewer->position = Auth::user()->position;

        if($request->hasFile('attach_file')){
        $drdrreviewer->attach_file = $request->file('attach_file')->store('drdrreviewer');
        }

        $drdrreviewer->save();
        /**
         * belongs to many method
         */
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

         alert()->success('Success Message', 'Submitted Succesfully');
        return redirect('submitted');
    }


    public function drdrapprover($id, Request $request)
    {

        $this->validate($request, [
            'remarks' => 'required',
            // 'attach_file' => 'required',
            'status_list' => 'required',
            'date_effective' => 'required|date',
            'copyholder.*' => 'required',
            'copy_no.*' => 'required'
        ]); 


        $drdrform = Drdrform::findOrFail($id);


        $drdrapprover = new Drdrapprover;
        $drdrapprover->user()->associate(Auth::user());
        $drdrapprover->drdrform()->associate($drdrform);
        $drdrapprover->remarks = $request->input('remarks');

        // $drdrapprover->attach_file = $request->input('attach_file');

        $drdrapprover->date_effective = $request->input('date_effective');
        $drdrapprover->name = Auth::user()->name;
        $drdrapprover->position = Auth::user()->position;
        $drdrapprover->date_approved = Carbon::now();

         if($request->hasFile('attach_file')){
        $drdrapprover->attach_file = $request->file('attach_file')->store('drdrapprover');
        }

        $drdrapprover->save();
        $drdrapprover->statuses()->attach($request->input('status_list'));

        /**
         * Drdr copy holder reviwer section
         */
        foreach($request->copy_no as $key=>$value){
            $data[] =[
                'copy_no' => $value,
                'copyholder' => $request->copyholder[$key]
            ];
        }

        foreach($data as $row){
            $drdrcopyholder = $drdrapprover->drdrcopyholders()->create($row);
        }

        /**
         * Notify the approver via email
        */
        foreach($drdrapprover->statuses as $status){
            if($status->id == 1){
                  Notification::send($drdrform->user, new DrdrapproverToDrdrformSuccessNotification($drdrapprover));                                     
            }else{
                  Notification::send($drdrform->user, new DrdrapproverToDrdrformFailedNotification($drdrapprover));
            }
        }

         alert()->success('Success Message', 'Submitted Succesfully');
        return redirect('submitted');
        
    }

    /**
     * For Management Review verification
     */
    public function drdrmr(Request $request, $id)
    {
        $drdrform = Drdrform::findOrFail($id);

        $drdrmr = new Drdrmr($request->all());
        // attach file here
        $drdrmr->drdrform()->associate($drdrform);
        $drdrmr->verified_date = Carbon::now();
        $drdrmr->verified_by = Auth::user()->name;
        $drdrmr->position = Auth::user()->position;
        $drdrmr->save();

        alert()->success('Success Message', 'Submitted Succesfully');
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
     * download to pdf
     */
    public function pdf(Drdrform $drdrform){
        $row = 0;
        $pdf = PDF::loadView('drdrforms.pdf', compact('drdrform','row'));
        return $pdf->stream('drdrform.pdf');
    }

    /**
     * download attached file
     */
    public function downloadFile($id)
    {
        $drdrform = Drdrform::findOrFail($id);
        $myFile = public_path().$drdrform->attach_file;
        $newName = 'drdrforms'.time();
        return response()->download($myFile, $newName);
    }

    /**

     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Drdrform $drdrform)
    {
        $companies = Company::pluck('name','id');
        $types = Type::pluck('name','id');

        foreach($drdrform->users as $user){
          $reviewer_name = $user->id; // reviewer name
        }


        $reviewer = Drdrreviewer::with('users')->whereHas('drdrform', function($q) use ($drdrform){
        $q->where('id',$drdrform->id);
        })->take(1)->first();
        foreach($reviewer->users->take(1) as $user){
          $approver_name = $user->id; // approver name
        }

        $approver = Drdrapprover::whereHas('drdrform', function($q) use ($drdrform){
        $q->where('id',$drdrform->id);
        })->take(1)->first();


        $drdrmr = Drdrmr::whereHas('drdrform', function($q) use ($drdrform){
        $q->where('id',$drdrform->id);
        })->take(1)->first();

        //users dropdown

        $reviewer_list = User::whereHas('roles', function($q){
            $q->where('id',3); // to revierwer
        })->pluck('name','id');

        $approver_list = User::whereHas('roles', function($q){
            $q->where('id',2); // to approver
        })->pluck('name','id');

        return view('drdrforms.edit', compact('companies',
          'drdrmr','approver','types','reviewer_list','approver_list','drdrform','approver_name','reviewer_name'));
    }
      


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,
      Drdrreviewer $drdrreviewer, 
      Drdrapprover $drdrapprover,
      Drdrform $drdrform)
    {
         $this->validate($request, [
            'document_title' => 'required',
            'reason_request' => 'required',
            'revision_number' => 'required',
            'company_list' => 'required',
            'type_list' => 'required',
            'approver_list' => 'required',
            'reviewer_list' => 'required',
        ]); 


        $drdrform->update($request->except('date_request'));
        if($request->hasFile('attach_file')){
          $drdrform->attach_file = $request->file('attach_file')->store('drdrforms');
        }
        $drdrform->save();

        $drdrform->companies()->sync( (array) $request->input('company_list'));
        $drdrform->types()->sync( (array) $request->input('type_list'));
        $drdrform->users()->sync( (array) $request->input('reviewer_list'));
        foreach($drdrform->users->take(1) as $pass){
          $reviewer_namex = $pass->name;
          $reviewer_positionx = $pass->position;
        }


        $drdrreviewer = Drdrreviewer::with('users')->whereHas('drdrform', function($q) use ($drdrform){
        $q->where('id',$drdrform->id);
        })->take(1)->first();
        $drdrreviewer->name = $reviewer_namex;
        $drdrreviewer->position = $reviewer_positionx;
        $drdrreviewer->save();
        $drdrreviewer->users()->sync( (array) $request->input('approver_list'));
        foreach($drdrreviewer->users->take(1) as $pass){
          $reviewer_namey = $pass->name;
          $reviewer_positiony = $pass->position;
        }


        //updates drdrform for approver's database
        $approver = Drdrapprover::whereHas('drdrform', function($q) use ($drdrform){
        $q->where('id',$drdrform->id);
        })->take(1)->first();
        $approver->date_effective = $request->input('date_effective');
        $approver->name = $reviewer_namey;
        $approver->position = $reviewer_positiony;
        $approver->save();


        //update verified date
        $drdrmr = Drdrmr::whereHas('drdrform', function($q) use ($drdrform){
        $q->where('id',$drdrform->id);
        })->take(1)->first();
        $drdrmr->verified_date = $request->input('verified_date');
        $drdrmr->save();


        alert()->success('Success Message', 'Update Succesfully');
        return redirect('drdrforms');
    }


    /**
     * Document Transfer to archive
     */
    public function archive(Request $request, $id)
    {
        $drdrform = Drdrform::findOrFail($id);
        $drdrform->active = 0;
        $drdrform->save();

        alert()->success('Success Message', 'Document is succefully archived');
        return redirect('drdrforms');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Drdrform $drdrform)
    {
        $drdrform->active = 0;
        $drdrform->save();
        $drdrform->delete();
        
        alert()->success('Success Message', 'Document is succefully trashed');
        return redirect('drdrforms');
    }

    public function restore(Request $request, $id)
    {
        Drdrform::withTrashed()->find($id)->restore();
        $drdrform = Drdrform::findOrFail($id);
        $drdrform->active = 1;
        $drdrform->save();

        alert()->success('Success Message', 'Restore Successful!');
        return redirect('drdrforms');
    }

    
}
