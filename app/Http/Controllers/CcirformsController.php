<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Collection;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CcirformToMrNotification;
use Carbon\Carbon;
use Alert;
use App\Ccirform;
use App\Company;
use App\User;



class CcirformsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ccirforms = Ccirform::all();
        $ccirtrashed = Ccirform::onlyTrashed()->get();
        $ccirarchive = Ccirform::all()->where('active',0);
        return view('ccirforms.index', compact(
            'ccirtrashed',
            'ccirarchive',
            'ccirforms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::pluck('name','id');
        return view('ccirforms.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $ccirform = new Ccirform;
        $ccirform->user()->associate(Auth::user());
        $ccirform->date_issuance = Carbon::now();
        $ccirform->name = Auth::user()->name;
        $ccirform->customer_reference = $request->input('customer_reference');
        $ccirform->brand_name = $request->input('brand_name');
        $ccirform->affected_quantities = $request->input('affected_quantities');
        $ccirform->product_no = $request->input('product_no');
        $ccirform->date_delivery = $request->input('date_delivery');
        $ccirform->conduct_traceability = $request->input('conduct_traceability');
        if($request->hasFile('attach_file')){
        $ccirform->attach_file = $request->file('attach_file')->store('ccirforms');
        }
        $ccirform->save();

        $ccirform->companies()->attach($request->input('company_list'));

        //send email to approver
        Notification::send(User::first(), new CcirformToMrNotification($ccirform));

        alert()->success('Success Message', 'Submitted Succesfully');
        return redirect('submitted');
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
     * Transfer document to archive
     */
    public function archive(Request $request, $id)
    {
        $ccirform = Ccirform::findOrFail($id);
        $ccirform->active = 0;
        $ccirform->save();

        alert()->success('Success Message', 'Document is succefully archived');
        return redirect('ccirforms');
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ccirform $ccirform)
    {
        $ccirform->active = 0;
        $ccirform->save();
        $ccirform->delete();

        alert()->success('Success Message', 'Document is succefully trashed');
        return redirect('ccirforms');
    }
}
