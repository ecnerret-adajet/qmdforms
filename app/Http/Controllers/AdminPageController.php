<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Collection;
use Illuminate\Pagination\Paginator;
use Carbon\Carbon;
use App\Drdrform;
use App\Ddrform;
use App\Ncnform;
use App\Ccirform;
use App\Company;
use App\Department;
use App\Drdrapprover;
use App\Ddrapprover;
use App\Ncnapprover;
use App\Status;
use App\Drdrreviewer;

class AdminPageController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function submitted()
    {
        $drdrformsown = Drdrform::where('user_id', Auth::user()->id)->get();
        $ddrformsown = Ddrform::where('user_id', Auth::user()->id)->get();
        $ncnformsown = Ncnform::where('user_id', Auth::user()->id)->get();
        $ccirformsown = Ccirform::where('user_id', Auth::user()->id)->get();

        return view('admin.submitted', compact(
            'drdrformsown',
            'ddrformsown',
            'ncnformsown',
            'ccirformsown'
        ));
    }

    public function reviewed(){

        $drdrformsreviewed = Drdrform::whereHas('drdrapprovers', function($q){
            $q->where('user_id',Auth::user()->id);
        })->get();

        $ddrformsreviewed = Ddrform::whereHas('ddrapprovers', function($q){
            $q->where('user_id',Auth::user()->id);
        })->get();

        $ncnformsreviewed = Ncnform::whereHas('ncnapprovers', function($q){
            $q->where('user_id',Auth::user()->id);
        })->get();

        return view('admin.reviewed', compact('drdrformsreviewed','ddrformsreviewed','ncnformsreviewed'));
    }

    public function pendingReviewer(){


        $drdrformsown = Drdrform::whereHas('users', function($q){
            $q->where('user_id', Auth::user()->id);
        })->doesntHave('drdrreviewers')->get();
 

        return view('admin.pendingReviewer', compact('drdrformsown'));

    }

    public function pendingApprover(){


        $drdrformsown = Drdrform::whereHas('drdrreviewers.users', function($q){
            $q->where('user_id', Auth::user()->id);
        })->doesntHave('drdrapprovers')->get(); 


        $ddrformsown = Ddrform::whereHas('users', function($q){
            $q->where('user_id', Auth::user()->id);
        })->doesntHave('ddrapprovers')->get();



        $ncnformsown = Ncnform::whereHas('users', function($q){
            $q->where('user_id', Auth::user()->id);
        })->doesntHave('ncnapprovers')->get();


        return view('admin.pendingApprover', compact(
            'drdrformsown',
            'ddrformsown',
            'ncnformsown'
        ));
    }   


    public function forms()
    {
    	$drdrforms = Drdrform::all();
    	$ddrforms = Ddrform::all();
    	$ncnforms = Ncnform::all();
    	$ccirforms = Ccirform::all();
    	return view('admin.forms', compact(
    		'ccirforms',
    		'ddrforms',
    		'ncnforms',
    		'drdrforms'));
    }

    public function settings()
    {
        $companies = Company::orderBy('id','DESC')->paginate(3);
        $departments = Department::orderBy('id','DESC')->paginate(3);

        return view('admin.settings', compact('companies','departments'));
    }

    public function storeCompany(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3'
        ]);

        $company = new Company;
        $company->name = $request->input('name');
        $company->save();

        alert()->success('New company has been added', 'Add Succesfully');
        return redirect('settings');

    }

    public function editCompany(Request $request, $id)
    {
        $company = Company::findOrFail($id);
        $company->name  = $request->input('name');
        $company->save();

        alert()->success('Company name has been added', 'Update Succesfully');
        return redirect('settings');
    }

    public function destroyCompany($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        alert()->success('Company successfully deleted', 'Added Succesfully');
        return redirect('settings');
    }




    public function storeDepartment(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3'
        ]);

        $department = new Department;
        $department->name = $request->input('name');
        $department->save();

        alert()->success('Department successfully deleted', 'Added Succesfully');
        return redirect('settings');
    }

    public function editDepartment(Request $request, $id)
    {
        $department = Department::findOrFail($id);
        $department->name  = $request->input('name');
        $department->save();

        alert()->success('Department name has been added', 'Update Succesfully');
        return redirect('settings');
    }

    public function destroyDepartment($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        alert()->success('Department successfully deleted', 'Delete Succesfully');
        return redirect('settings');
    }

}
