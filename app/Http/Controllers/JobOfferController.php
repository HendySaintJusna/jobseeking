<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\JobOffer;

class JobOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $token = Str::random(15);
        JobOffer::create([
            'id_owner' => Auth::id(),
            'company' => $request->company,
            'token' => $token,
            'title' => $request->title,
            'city' => $request->city,
            'salary' => $request->salary,
            'desc' => $request->about_job,
            'category' => $request->field,
            'keywords' => json_encode($request->keywords),
            'job_country' => $request->country['selected'],
            'state_province' => $request->state,
            'time_needed' => $request->time_needed,
            'speaking' => $request->lang,
            'rank' => 0
        ]);

        return 'success';
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        JobOffer::where('id',$id)->delete();
        $arr = JobOffer::where('id_owner',Auth::id())->get();
        return $arr;
    }
}
