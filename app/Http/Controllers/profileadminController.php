<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class profileadminController extends Controller
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
        //
        session_start();
        $chkuser = $_SESSION['adminid'];
        
        if ($_SESSION['staus'] = 'admin') {
            // echo ("อัพโหลดเรียบร้อย...");
            $this->validate($request,
            ['img' => 'required|image|mimes:png,jpeg|max:5048']);
        
            //upload
            $foder = 'img_admin';
            $filename = $request->file('img')->getClientOriginalName();
            $nameimg = rand() . '.' . $filename;
            
            
            // $pathimg = $request->file('img')->store('imgaccount/',$nameimg);
            $pathimg = Image::make($request->file('img'))->fit(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            });
            
            $pathimg->save(public_path($foder. '/' .$nameimg));
            
            $img=$nameimg;
            // return ['path'=>$path,'upload'=>'success'];
            
            $name = $request->input('name');
            $email = $request->input('email');
            $username = $request->input('username');
            DB::update("UPDATE admin_company SET admin_name = '$name', admin_email ='$email',
            admin_user ='$username', pathimg='$img' WHERE admin_id='$chkuser'");
            return redirect('profileadmin')->with('successupdate', 'อัพเดทข้อมูลเรียบร้อย');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        session_start();
        $chkidproject = $_SESSION['adminid'];
        // echo $chkidproject;
        // $imgaccount = DB::select("SELECT * FROM imgaccount,users WHERE  AND id='$chkidproject'");
        $imgaccount = DB::select("SELECT * FROM admin_company WHERE admin_id ='$chkidproject'");
        $user = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidproject'");
       
        return view('admin.profileadmin',compact('user','imgaccount'));
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
    public function pageadmin() {
        session_start();
        $chkid = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
        $imgaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkid'");
        return view('admin.homeadmin',compact('imgaccount'));
    }
}
