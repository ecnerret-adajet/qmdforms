<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Collection;
use Carbon\Carbon;
use App\Drdrform;
use App\Ddrform;
use App\Ncnform;
use App\Ccirform;
use App\Company;
use App\Department;

class AdminPageController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
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
        $companies = Company::all();
        $departments = Department::all();

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

        return redirect('settings');
    }

}
