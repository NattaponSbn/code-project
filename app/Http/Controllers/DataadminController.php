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
        $datauseradmin = DB::select('SELECT * FROM admin_company');
        return view('admin.editdatauseradmin',compact('datauseradmin'));
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
    public function show($admin_company_id)
    {
        //
        $admin = DB::select('SELECT * FROM admin_company WHERE admin_id = ?',[$admin_company_id]);
        return view('admin.editdatauseradmin', compact('admin'));
        
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
    public function update(Request $request, $admin_company_id)
    {
        //
        $adminname = $request->input('admin_company_name');
        $adminuser = $request->input('admin_company_user');
        DB::update('UPDATE admin_company SET admin_name = ?, admin_user=? WHERE admin_id = ?', [$adminname,$adminuser,$admin_company_id]);
     
        return redirect('viewadmin')->with('success', 'อัพเดทข้อมูลเรียบร้อย');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($admin_company_id)
    {
        DB::delete('DELETE FROM admin_company WHERE admin_id=?',[$admin_company_id]);
        return redirect('dataview')->with('success', 'ลบข้อมูลเรียบร้อย'); 
    }
}
