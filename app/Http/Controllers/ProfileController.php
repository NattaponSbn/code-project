<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Imgaccount;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;


class ProfileController extends Controller
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
        $chkuser = $_SESSION['usersid'];
        
        if ($_SESSION['staus'] = 'user') {
            // echo ("อัพโหลดเรียบร้อย...");
            $this->validate($request,
            ['img' => 'required|image|mimes:png,jpeg|max:5048']);
        
            //upload
            $foder = 'imgaccount';
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
            $gender = $request->input('gender');
            $province = $request->input('province');
            $email = $request->input('email');
            $username = $request->input('username');
            DB::update("UPDATE users SET name = '$name', gender ='$gender', province ='$province', email ='$email',
            username ='$username', pathimg='$img', updated_at = CURRENT_TIMESTAMP() WHERE U_id='$chkuser'");
            return redirect('profile')->with('successupdate', 'อัพเดทข้อมูลเรียบร้อย');
        }
        else {
            echo 'error';
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
        session_start();
        $chkidproject = $_SESSION['usersid'];
        
        // $imgaccount = DB::select("SELECT * FROM imgaccount,users WHERE  AND id='$chkidproject'");
        $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkidproject'");
       
        $user = DB::select("SELECT * FROM users WHERE U_id='$chkidproject'");

        return view('profileuser',compact('user','imgaccount'));
    }

 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$user_id)
    {
        $name = $request->input('name');
        $gender = $request->input('gender');
        $province = $request->input('province');
        $username = $request->input('username');
        $email = $request->input('email');
        DB::update('UPDATE users SET name=?, gender=?, province=?, username=?, email=? WHERE U_id = ?',[$name,$gender,$province,$username,$email,$user_id]);
        return redirect('profileuser')->with('successupdate', 'อัพเดทข้อมูลเรียบร้อย');

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
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
