<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postulation;
use App\Models\JobOffer;
use App\Models\User;
use App\Mail\receiveApplication;
use Illuminate\Support\Facades\Auth;

class PostulationController extends Controller
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
        $file = $request->file;
        $filename = $request->filename;
        $file->store('resume-apply','public');
        $title = JobOffer::where('token',$request->token)->value('title');
        $id = JobOffer::where('token',$request->token)->value('id_owner');
        $email_owner = User::where('id',$id)->value('email');
        Postulation::create([
            'id_owner' => $id,
            'token' => $request->token,
            'job_title' => $title,
            'name' => $filename,
            'cv_file' => $file->hashName(),
            'country' => 'null',
            'state' => 'null'
        ]);

        \Mail::to($email_owner)->send(new receiveApplication($title));

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
        Postulation::where('id',$id)->delete();
        $arr = Postulation::where('id_owner',Auth::id())->get();
        return $arr;
    }
}
