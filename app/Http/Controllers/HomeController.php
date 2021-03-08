<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobOffer;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }



    public function searchjob(Request $request){

        $results = JobOffer::where('title', 'like', '%'.$request->search_job.'%')
        ->orWhere('keywords', 'like', '%'.$request->search_job.'%')
        ->orderBy('title')
        ->paginate(5);

        return $results;

    }

    public function searchcity(Request $request){

        $results = JobOffer::where('state_province', 'like', '%'.$request->search_city.'%')
        ->orWhere('city', 'like', '%'.$request->search_city.'%')
        ->orderBy('title')
        ->paginate(5);

        return $results;

    }


    public function index()
    {
        $arr_ip = geoip()->getLocation(\Request::ip());

        // if (Auth::check()) {
        //     // The user is logged in...
        // }
        
        return view('home',[
            'country' => $arr_ip->country
        ]);
    }
}
