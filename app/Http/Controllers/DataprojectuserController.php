<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataadminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dataproject_user = DB::select('SELECT * FROM addproject');
        return view('editdatauseradmin',['datauseradmin']);
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
        $datauseradmin = DB::select('SELECT * FROM admin_company WHERE admin_company_id = ?',[$id]);
        return view('editdatauseradmin', ['datauseradmin'=>$datauseradmin]);
        // $users = DB::select('SELECT * FROM admin_company WHERE admin_company_id = ?',[$id]);
        // return view('editdatauseradmin',['users'=>$users]);
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
        $adminname = $request->input('admin_company_name');
        $adminuser = $request->input('admin_company_user');
        DB::update('UPDATE admin_company SET admin_company_name = ?, admin_company_user=? WHERE admin_company_id = ?', [$adminname,$adminuser,$id]);
        return redirect('dataviewadmin')->with('success', 'อัพเดทข้อมูลเรียบร้อย');
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
        DB::delete('DELETE FROM admin_company WHERE admin_company_id=?',[$id]);
        return redirect('dataviewadmin')->with('success', 'ลบข้อมูลเรียบร้อย'); 
    }
}
