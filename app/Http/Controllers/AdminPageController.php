<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Drdrform;
use App\Ddrform;
use App\Ncnform;
use App\Ccirform;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Collection;
use Carbon\Carbon;

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
}
