<?php

namespace App\Http\Controllers;

use App\Dataproject;
use Illuminate\Http\Request;

class UserprojectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $dataproject = Dataproject::with('Datausers');
        // return view('Detailproject',compact('dataproject'));
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
        //
        $dataproject = new Dataproject;
        $dataproject->project_name=$request->project_name;
        $dataproject->keyword_project=$request->keyword_project;
        $dataproject->des_project=$request->des_project;
        // $dataproject->facebook=$request->facebook;
        // $dataproject->email=$request->email;
        // $dataproject->phone=$request->phone;
        $dataproject->type_project=$request->type_project;
        $dataproject->genre_project=$request->genre_project;
        $dataproject->category_project=$request->category_project;
        $dataproject->branch_project=$request->branch_project;
        session_start();
        $userid = $_SESSION['usersid'];
        $dataproject->users_id=$userid;
       
        $dataproject->save();
        return redirect('Detailproject');
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
        //
    }
}
