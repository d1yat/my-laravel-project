<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
    	// $pengantin = DB::select('select * from pengantin where id_pengantin = ?', ['2310290001']);
    	$pengantin = DB::table('pengantin')
    				 ->where('id_pengantin', '2310290001')
    				 ->first();
    	// dd($pengantin);

    	return view('home.index', ['pengantin' => $pengantin]);
    }
}
