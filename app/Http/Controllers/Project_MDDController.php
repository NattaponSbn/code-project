<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Projectmdd;

class Project_MDDController extends Controller
{
    
    //เพิ่มข้อมูล project
    public function insertproject(Request $request) {

        $codeu = 'PM';
        $cont = count(DB::select("SELECT No_PM FROM projectmdd"));
        $nextint = $cont+1;
        $string_id = substr("000".$nextint,-4);
        $nextid = $codeu.$string_id;

        $status_m='0';

        $foder = 'project/fileproject/p_MDD';
        $fileP = $request->file('fileproject');
        $filename = $request->file('fileproject')->getClientOriginalName();
        $nameimg = '/'.rand() . '.' . $filename;
        $fileP->move(public_path($foder),$nameimg);

        $fileproject='/fileproject/p_MDD'.$nameimg;

        $project = new Projectmdd;
        session_start();
        $userid = $_SESSION['usersid'];
        $project->user_id=$userid;
        $project->project_m_id=$nextid;
        $project->project_m_name=$request->project_name;
        $project->keyword_m_project=$request->keyword_project;
        $project->des_m_project=$request->des_project;
        $project->status_m=$status_m;
        // $dataproject->facebook=$request->facebook;
        // $dataproject->email=$request->email;
        // $dataproject->phone=$request->phone;
        $project->type_id=$request->type_project;
        $project->genre_id=$request->genre_project;
        $project->category_id=$request->category_project;
        $project->branch_id=$request->branch_project;
        $project->file_m=$fileproject;
        $project->filename=$filename;
        $project->save();
        return redirect('homeMDD')->with('successappproject', 'สร้างผลงานเรียบร้อย');
    }

    public function showproject() {
        $project = Projectmdd::with('user')->orderby('project_id')->paginate(5);
        return view('admin.project',compact('project'));
    }

    // dropdown show
    public function viewadd() {
        $chk_type = DB::select("SELECT * FROM type_project");
        $chk_genre = DB::select("SELECT * FROM genre_project");
        $chk_category = DB::select("SELECT * FROM category_project");
        $chk_branch = DB::select("SELECT * FROM branch_project");
        $chk_year = DB::select("SELECT * FROM year_project");

        return view('project.addprojectMDD',compact('chk_type','chk_genre','chk_category','chk_branch','chk_year'));
    }

    // join หน้า detailprject เเละโชว์ข้อมูล project
    public function project() {
        session_start();
        $chkidproject = $_SESSION['usersid'];
        
        $data = DB::select("SELECT * FROM type_project,genre_project,category_project,users,projectmdd 
        WHERE users.U_id=projectmdd.user_id and U_id='$chkidproject' AND projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id 
        AND projectmdd.category_id=category_project.category_id ");

        $chk_type = DB::select("SELECT * FROM type_project");
        $chk_genre = DB::select("SELECT * FROM genre_project");
        $chk_category = DB::select("SELECT * FROM category_project");
        $chk_branch = DB::select("SELECT * FROM branch_project");
        return view('project.detailprojectMDD',compact('data','chk_type','chk_genre','chk_category','chk_branch'));
    }

    public function editproject(Request $request) {
        session_start();
        $chkidproject = $_SESSION['usersid'];

        $project_name = $request->input('project_name');
        $keyword_project = $request->input('keyword_project');
        $des_project = $request->input('des_project');
        $type_project = $request->input('type_project');
        $genre_project = $request->input('genre_project');
        $category_project = $request->input('category_project');

        DB::update("UPDATE users,projectmdd SET project_m_name = '$project_name', keyword_m_project ='$keyword_project', des_m_project ='$des_project', type_id ='$type_project',
         genre_id ='$genre_project', category_id ='$category_project', projectmdd.updated_at = CURRENT_TIMESTAMP() WHERE users.id=projectmdd.user_id AND U_id='$chkidproject'");
        
        return redirect('project.detailprojectMDD')->with('success', 'อัพเดทข้อมูลเรียบร้อย');
    }

    public function itemproject() {
        session_start();
        $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
        $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
        $userimg = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
        $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
        $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        $chk_genre = DB::select("SELECT * FROM genre_project");
        $chk_category = DB::select("SELECT * FROM category_project");
        $chk_type = DB::select("SELECT * FROM type_project");
        $chk_branch = DB::select("SELECT * FROM branch_project");

        $chk_follow = count(DB::select("SELECT NO_PM FROM projectmdd,category_project WHERE projectmdd.status_m in ('1') AND projectmdd.category_id=category_project.category_id AND category_project.category_name in ('เกษตร')"));
        $sum_follow = $chk_follow;

        $chk_health = count(DB::select("SELECT NO_PM FROM projectmdd,category_project WHERE projectmdd.status_m in ('1') AND projectmdd.category_id=category_project.category_id AND category_project.category_name in ('เพื่อสุขภาพ')"));
        $sum_health = $chk_health;

        $chk_game = count(DB::select("SELECT NO_PM FROM projectmdd,category_project WHERE projectmdd.status_m in ('1') AND projectmdd.category_id=category_project.category_id AND category_project.category_name in ('เกม')"));
        $sum_game = $chk_game;
        // if($chk_follow){
        //     $sum_follow = $chk_follow;
        // }else{$sum_follow = $chk_follow-$chk_follow;

        // $item = DB::select("SELECT * FROM projectmdd,type_project,category_project,users WHERE projectmdd.type_id=type_project.type_id and projectmdd.user_id=users.U_id
        // and projectmdd.category_id=category_project.category_id ORDER BY projectmdd.category_id=1");
        $item_m = DB::select("SELECT project_m_id FROM users,projectmdd,genre_project,type_project,category_project WHERE category_project.category_name in ('เกษตร') AND projectmdd.type_id=type_project.type_id 
        AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projectmdd.user_id=users.U_id ORDER BY RAND()");
        // print_r($item_m);
        if(isset($item_m[0])? $item_m[0]:'') {
            $item0 = $item_m[0]; //เลือกตำเเหน่งของข้อมูล
            compact('item0'); // ส่งค่า item0 จากการเลือกตำเเหน่ง
            foreach($item0 as $ite0){ // ทำการวง loop foreach เพื่อ เอาค่า id ออกจาก array
                $ite0; // id ของ ตำเเหน่งที่ 0 ที่ได้มาจากการ loop 
                // หลังจากได้ id ที่ เป็น str ก็นำมา select จาก database ทีละ id เเล้วส่งค่าไปแสดงผลหน้า homeBD
                // $item = DB::select("SELECT * FROM projectmdd,type_project,genre_project,type_project,category_project WHERE projectmdd.type_id=type_project.type_id 
                // AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projects.project_m_id='$ite0'");  
                
                $item_m0 = DB::select("SELECT *,AVG(rate_m_index) AS AvgRate FROM rating_m,users,projectmdd,genre_project,type_project,category_project WHERE projectmdd.type_id=type_project.type_id 
                AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projectmdd.user_id=users.U_id AND projectmdd.project_m_id=rating_m.project_m_id AND projectmdd.project_m_id='$ite0' ");
                //rateingproject
                // print_r($item);
                // $rate0 = DB::select("SELECT * FROM rating_p WHERE projects.type_id=type_project.type_id 
                // AND projects.project_id='$ite0'");  

                $svg0 = DB::select("SELECT AVG(rate_m_index) AS AvgRate FROM rating_m WHERE project_m_id='$ite0' GROUP BY rating_m.project_m_id"); 
                $svgrate0 = $svg0[0];
                compact('svgrate0');
                foreach($svgrate0 as $svgrate0){
                   $svgrate0 = round($svgrate0,$percision=1);
                }

                $view0 = DB::select("SELECT COUNT(login_logmdd.login_project) AS countview FROM login_logmdd,projectmdd
                    WHERE projectmdd.project_m_id=login_logmdd.login_project AND projectmdd.project_m_id='$ite0'
                    GROUP BY login_logmdd.login_project");
                    if(isset($view0)?$view0:''){
                        compact('view0');
                        foreach($view0 as $view0){
                            $viewcount0 = $view0->countview;
                        }
                    }else{
                        $viewcount0 = '0';
                    }
                
            }
        }else {
            $item_m0='';
            $viewcount0 = '0';
        }

        if(isset($item_m[1])? $item_m[1]:'') {
            $item1 = $item_m[1]; //เลือกตำเเหน่งของข้อมูล
            compact('item1'); // ส่งค่า item0 จากการเลือกตำเเหน่ง
            foreach($item1 as $ite1){ // ทำการวง loop foreach เพื่อ เอาค่า id ออกจาก array
                $ite1; // id ของ ตำเเหน่งที่ 0 ที่ได้มาจากการ loop 
                // หลังจากได้ id ที่ เป็น str ก็นำมา select จาก database ทีละ id เเล้วส่งค่าไปแสดงผลหน้า homeBD
                // $item = DB::select("SELECT * FROM projectmdd,type_project,genre_project,type_project,category_project WHERE projectmdd.type_id=type_project.type_id 
                // AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projects.project_m_id='$ite0'");  
                // echo $ite1;
                $item_m1 = DB::select("SELECT * FROM users,projectmdd,genre_project,type_project,category_project WHERE projectmdd.type_id=type_project.type_id 
                AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projectmdd.user_id=users.U_id AND projectmdd.project_m_id='$ite1' ");
                //rateingproject
                // print_r($item);
                // $rate0 = DB::select("SELECT * FROM rating_p WHERE projects.type_id=type_project.type_id 
                // AND projects.project_id='$ite0'");  

                $svg1 = DB::select("AVG(rate_m_index) AS AvgRate FROM rating_m WHERE project_m_id='$ite1' GROUP BY rating_m.project_m_id"); 
                $svgrate1 = $svg0[0];
                compact('svgrate0');
                foreach($svgrate0 as $svgrate0){
                   $svgrate0 = round($svgrate0,$percision=1);
                }
                
                
            }
        }else {
            $item_m1='';
        }

        $itemA = DB::select("SELECT project_m_id FROM owner_projectmdd,projectmdd,genre_project,type_project,category_project WHERE category_project.category_name in ('เกษตร') AND projectmdd.type_id=type_project.type_id 
        AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projectmdd.user_id=owner_projectmdd.owner_m_id  ORDER BY RAND()");
        // print_r($itemA);
        if(isset($itemA[0])? $itemA[0]:'') {
            $item0 = $itemA[0]; //เลือกตำเเหน่งของข้อมูล
            compact('item0'); // ส่งค่า item0 จากการเลือกตำเเหน่ง
            foreach($item0 as $ite0){ // ทำการวง loop foreach เพื่อ เอาค่า id ออกจาก array
                $ite0; // id ของ ตำเเหน่งที่ 0 ที่ได้มาจากการ loop 
                // หลังจากได้ id ที่ เป็น str ก็นำมา select จาก database ทีละ id เเล้วส่งค่าไปแสดงผลหน้า homeBD
                // $item = DB::select("SELECT * FROM projectmdd,type_project,genre_project,type_project,category_project WHERE projectmdd.type_id=type_project.type_id 
                // AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projects.project_m_id='$ite0'");  
                
                $itemA0 = DB::select("SELECT *,AVG(rate_m_index) AS AvgRate FROM rating_m,owner_projectmdd,projectmdd,genre_project,type_project,category_project WHERE projectmdd.type_id=type_project.type_id 
                AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projectmdd.user_id=owner_projectmdd.owner_m_id AND projectmdd.project_m_id=rating_m.project_m_id AND projectmdd.project_m_id='$ite0' GROUP BY rating_m.project_m_id");
                //rateingproject
                // print_r($item);
                // $rate0 = DB::select("SELECT * FROM rating_p WHERE projects.type_id=type_project.type_id 
                // AND projects.project_id='$ite0'");  

                $svgA0 = DB::select("SELECT AVG(rate_m_index) AS AvgRate FROM rating_m WHERE project_m_id='$ite0' GROUP BY rating_m.project_m_id"); 
                // print_r($svg0);
                $svgrate0 = $svg0[0];
                compact('svgrate0');
                foreach($svgrate0 as $svgrate0){
                  $svgrateA = round($svgrate0,$percision=1);
                }

                $view0 = DB::select("SELECT COUNT(login_logmdd.login_project) AS countview FROM login_logmdd,projectmdd
                WHERE projectmdd.project_m_id=login_logmdd.login_project AND projectmdd.project_m_id='$ite0'
                GROUP BY login_logmdd.login_project");
                if(isset($view0)?$view0:''){
                    compact('view0');
                    foreach($view0 as $view0){
                        $viewcountA0 = $view0->countview;
                    }
                }else{
                    $viewcountA0 = '0';
                }
                
            }
        }else {
            $itemA0='';
            $viewcountA0 = '0';
        }

        if(isset($itemA[1])? $itemA[1]:'') {
            $item1 = $itemA[1]; //เลือกตำเเหน่งของข้อมูล
            compact('item1'); // ส่งค่า item0 จากการเลือกตำเเหน่ง
            foreach($item1 as $ite1){ // ทำการวง loop foreach เพื่อ เอาค่า id ออกจาก array
                $ite1; // id ของ ตำเเหน่งที่ 0 ที่ได้มาจากการ loop 
                // หลังจากได้ id ที่ เป็น str ก็นำมา select จาก database ทีละ id เเล้วส่งค่าไปแสดงผลหน้า homeBD
                // $item = DB::select("SELECT * FROM projectmdd,type_project,genre_project,type_project,category_project WHERE projectmdd.type_id=type_project.type_id 
                // AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projects.project_m_id='$ite0'");  
                
                $itemA1 = DB::select("SELECT * FROM owner_projectmdd,projectmdd,genre_project,type_project,category_project WHERE projectmdd.type_id=type_project.type_id 
                AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projectmdd.user_id=owner_projectmdd.owner_m_id AND projectmdd.project_m_id='$ite1'");
                
                //rateingproject
                // print_r($item);
                // $rate0 = DB::select("SELECT * FROM rating_p WHERE projects.type_id=type_project.type_id 
                // AND projects.project_id='$ite0'");  

                $svgA1 = DB::select("SELECT AVG(rate_m_index) AS AvgRate
                 FROM rating_m WHERE project_m_id='$ite1' 
                 GROUP BY rating_m.project_m_id"); 
                $svgrate0 = $svg0[0];
                compact('svgrate0');
                foreach($svgrate0 as $svgrate0){
                     $svgrateA = round($svgrate0,$percision=1);
                }
                
            }
        }else {
            $itemA1='';
        }
        // $item2 = DB::select("SELECT * FROM projectmdd,type_project,category_project,admin_company,owner_projectmdd WHERE projectmdd.type_id=type_project.type_id 
        // and projectmdd.user_id=owner_projectmdd.owner_m_id and projectmdd.adm_id=admin_company.admin_id 
        // and projectmdd.category_id=category_project.category_id ORDER BY projectmdd.category_id=1");

        //เพื่อสุขภาพ
        $item_h = DB::select("SELECT project_m_id FROM users,projectmdd,genre_project,type_project,category_project WHERE category_project.category_name in ('เพื่อสุขภาพ') AND projectmdd.type_id=type_project.type_id 
        AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projectmdd.user_id=users.U_id ORDER BY RAND()");
        // print_r($item_m);
        if(isset($item_h[0])? $item_h[0]:'') {
            $item0 = $item_h[0]; //เลือกตำเเหน่งของข้อมูล
            compact('item0'); // ส่งค่า item0 จากการเลือกตำเเหน่ง
            foreach($item0 as $ite0){ // ทำการวง loop foreach เพื่อ เอาค่า id ออกจาก array
                $ite0; // id ของ ตำเเหน่งที่ 0 ที่ได้มาจากการ loop 
                // หลังจากได้ id ที่ เป็น str ก็นำมา select จาก database ทีละ id เเล้วส่งค่าไปแสดงผลหน้า homeBD
                // $item = DB::select("SELECT * FROM projectmdd,type_project,genre_project,type_project,category_project WHERE projectmdd.type_id=type_project.type_id 
                // AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projects.project_m_id='$ite0'");  
                
                $item_h0 = DB::select("SELECT *,AVG(rate_m_index) AS AvgRate FROM rating_m,users,projectmdd,genre_project,type_project,category_project WHERE projectmdd.type_id=type_project.type_id 
                AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projectmdd.user_id=users.U_id AND projectmdd.project_m_id=rating_m.project_m_id AND projectmdd.project_m_id='$ite0' ");
                //rateingproject
                // print_r($item);
                // $rate0 = DB::select("SELECT * FROM rating_p WHERE projects.type_id=type_project.type_id 
                // AND projects.project_id='$ite0'");  

                $svg0 = DB::select("SELECT AVG(rate_m_index) AS AvgRate FROM rating_m WHERE project_m_id='$ite0' GROUP BY rating_m.project_m_id"); 
                $svgrate0 = $svg0[0];
                compact('svgrate0');
                foreach($svgrate0 as $svgrate0){
                   $svgrate0 = round($svgrate0,$percision=1);
                }

                $view0 = DB::select("SELECT COUNT(login_logmdd.login_project) AS countview FROM login_logmdd,projectmdd
                WHERE projectmdd.project_m_id=login_logmdd.login_project AND projectmdd.project_m_id='$ite0'
                GROUP BY login_logmdd.login_project");
                if(isset($view0)?$view0:''){
                    compact('view0');
                    foreach($view0 as $view0){
                        $viewcount_h0 = $view0->countview;
                    }
                }else{
                    $viewcount_h0 = '0';
                }
                
            }
        }else {
            $item_h0='';
            $viewcount_h0 = '';
        }

        if(isset($item_h[1])? $item_h[1]:'') {
            $item1 = $item_h[1]; //เลือกตำเเหน่งของข้อมูล
            compact('item1'); // ส่งค่า item0 จากการเลือกตำเเหน่ง
            foreach($item1 as $ite1){ // ทำการวง loop foreach เพื่อ เอาค่า id ออกจาก array
                $ite1; // id ของ ตำเเหน่งที่ 0 ที่ได้มาจากการ loop 
                // หลังจากได้ id ที่ เป็น str ก็นำมา select จาก database ทีละ id เเล้วส่งค่าไปแสดงผลหน้า homeBD
                // $item = DB::select("SELECT * FROM projectmdd,type_project,genre_project,type_project,category_project WHERE projectmdd.type_id=type_project.type_id 
                // AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projects.project_m_id='$ite0'");  
                // echo $ite1;
                $item_h1 = DB::select("SELECT * FROM users,projectmdd,genre_project,type_project,category_project WHERE projectmdd.type_id=type_project.type_id 
                AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projectmdd.user_id=users.U_id AND projectmdd.project_m_id='$ite1' ");
                //rateingproject
                // print_r($item);
                // $rate0 = DB::select("SELECT * FROM rating_p WHERE projects.type_id=type_project.type_id 
                // AND projects.project_id='$ite0'");  

                $svg1 = DB::select("AVG(rate_m_index) AS AvgRate FROM rating_m WHERE project_m_id='$ite1' GROUP BY rating_m.project_m_id"); 
                $svgrate1 = $svg0[0];
                compact('svgrate0');
                foreach($svgrate0 as $svgrate0){
                   $svgrate0 = round($svgrate0,$percision=1);
                }
                
            }
        }else {
            $item_h1='';
        }
       
        $itemA_h = DB::select("SELECT project_m_id FROM owner_projectmdd,projectmdd,genre_project,type_project,category_project WHERE category_project.category_name in ('เพื่อสุขภาพ') AND projectmdd.type_id=type_project.type_id 
        AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projectmdd.user_id=owner_projectmdd.owner_m_id  ORDER BY RAND()");
        // print_r($itemA);
        if(isset($itemA_h[0])? $itemA_h[0]:'') {
            $item0 = $itemA_h[0]; //เลือกตำเเหน่งของข้อมูล
            compact('item0'); // ส่งค่า item0 จากการเลือกตำเเหน่ง
            foreach($item0 as $ite0){ // ทำการวง loop foreach เพื่อ เอาค่า id ออกจาก array
                $ite0; // id ของ ตำเเหน่งที่ 0 ที่ได้มาจากการ loop 
                // หลังจากได้ id ที่ เป็น str ก็นำมา select จาก database ทีละ id เเล้วส่งค่าไปแสดงผลหน้า homeBD
                // $item = DB::select("SELECT * FROM projectmdd,type_project,genre_project,type_project,category_project WHERE projectmdd.type_id=type_project.type_id 
                // AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projects.project_m_id='$ite0'");  
                
                $itemA_h0 = DB::select("SELECT *,AVG(rate_m_index) AS AvgRate FROM rating_m,owner_projectmdd,projectmdd,genre_project,type_project,category_project WHERE projectmdd.type_id=type_project.type_id 
                AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projectmdd.user_id=owner_projectmdd.owner_m_id AND projectmdd.project_m_id=rating_m.project_m_id AND projectmdd.project_m_id='$ite0' GROUP BY rating_m.project_m_id");
                //rateingproject
                // print_r($item);
                // $rate0 = DB::select("SELECT * FROM rating_p WHERE projects.type_id=type_project.type_id 
                // AND projects.project_id='$ite0'");  

                $svgA0 = DB::select("SELECT AVG(rate_m_index) AS AvgRate FROM rating_m WHERE project_m_id='$ite0' GROUP BY rating_m.project_m_id"); 
                // print_r($svg0);
                $svgrate0 = $svg0[0];
                compact('svgrate0');
                foreach($svgrate0 as $svgrate0){
                  $svgrateA = round($svgrate0,$percision=1);
                }
                
                $view0 = DB::select("SELECT COUNT(login_logmdd.login_project) AS countview FROM login_logmdd,projectmdd
                WHERE projectmdd.project_m_id=login_logmdd.login_project AND projectmdd.project_m_id='$ite0'
                GROUP BY login_logmdd.login_project");
                if(isset($view0)?$view0:''){
                    compact('view0');
                    foreach($view0 as $view0){
                        $viewcountA_h0 = $view0->countview;
                    }
                }else{
                    $viewcountA_h0 = '0';
                }
            }
        }else {
            $itemA_h0='';
            $viewcountA_h0 = '';
        }

        if(isset($itemA_h[1])? $itemA_h[1]:'') {
            $item1 = $itemA_h[1]; //เลือกตำเเหน่งของข้อมูล
            compact('item1'); // ส่งค่า item0 จากการเลือกตำเเหน่ง
            foreach($item1 as $ite1){ // ทำการวง loop foreach เพื่อ เอาค่า id ออกจาก array
                $ite1; // id ของ ตำเเหน่งที่ 0 ที่ได้มาจากการ loop 
                // หลังจากได้ id ที่ เป็น str ก็นำมา select จาก database ทีละ id เเล้วส่งค่าไปแสดงผลหน้า homeBD
                // $item = DB::select("SELECT * FROM projectmdd,type_project,genre_project,type_project,category_project WHERE projectmdd.type_id=type_project.type_id 
                // AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projects.project_m_id='$ite0'");  
                
                $itemA_h1 = DB::select("SELECT * FROM owner_projectmdd,projectmdd,genre_project,type_project,category_project WHERE projectmdd.type_id=type_project.type_id 
                AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projectmdd.user_id=owner_projectmdd.owner_m_id AND projectmdd.project_m_id='$ite1'");
                
                //rateingproject
                // print_r($item);
                // $rate0 = DB::select("SELECT * FROM rating_p WHERE projects.type_id=type_project.type_id 
                // AND projects.project_id='$ite0'");  

                $svgA1 = DB::select("SELECT AVG(rate_m_index) AS AvgRate
                 FROM rating_m WHERE project_m_id='$ite1' 
                 GROUP BY rating_m.project_m_id"); 
                $svgrate0 = $svg0[0];
                compact('svgrate0');
                foreach($svgrate0 as $svgrate0){
                     $svgrateA = round($svgrate0,$percision=1);
                }
                
            }
        }else {
            $itemA_h1='';
        }

        $item_g = DB::select("SELECT project_m_id FROM users,projectmdd,genre_project,type_project,category_project WHERE category_project.category_name in ('สังคมเเละสื่อสาร') AND projectmdd.type_id=type_project.type_id 
        AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projectmdd.user_id=users.U_id ORDER BY RAND()");
        // print_r($item_m);
        if(isset($item_g[0])? $item_g[0]:'') {
            $item0 = $item_g[0]; //เลือกตำเเหน่งของข้อมูล
            compact('item0'); // ส่งค่า item0 จากการเลือกตำเเหน่ง
            foreach($item0 as $ite0){ // ทำการวง loop foreach เพื่อ เอาค่า id ออกจาก array
                $ite0; // id ของ ตำเเหน่งที่ 0 ที่ได้มาจากการ loop 
                // หลังจากได้ id ที่ เป็น str ก็นำมา select จาก database ทีละ id เเล้วส่งค่าไปแสดงผลหน้า homeBD
                // $item = DB::select("SELECT * FROM projectmdd,type_project,genre_project,type_project,category_project WHERE projectmdd.type_id=type_project.type_id 
                // AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projects.project_m_id='$ite0'");  
                
                $item_g0 = DB::select("SELECT *,AVG(rate_m_index) AS AvgRate FROM rating_m,users,projectmdd,genre_project,type_project,category_project WHERE projectmdd.type_id=type_project.type_id 
                AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projectmdd.user_id=users.U_id AND projectmdd.project_m_id=rating_m.project_m_id AND projectmdd.project_m_id='$ite0' ");
                //rateingproject
                // print_r($item);
                // $rate0 = DB::select("SELECT * FROM rating_p WHERE projects.type_id=type_project.type_id 
                // AND projects.project_id='$ite0'");  

                $svg0 = DB::select("SELECT AVG(rate_m_index) AS AvgRate FROM rating_m WHERE project_m_id='$ite0' GROUP BY rating_m.project_m_id"); 
                $svgrate0 = $svg0[0];
                compact('svgrate0');
                foreach($svgrate0 as $svgrate0){
                   $svgrate0 = round($svgrate0,$percision=1);
                }

                $view0 = DB::select("SELECT COUNT(login_logmdd.login_project) AS countview FROM login_logmdd,projectmdd
                WHERE projectmdd.project_m_id=login_logmdd.login_project AND projectmdd.project_m_id='$ite0'
                GROUP BY login_logmdd.login_project");
                if(isset($view0)?$view0:''){
                    compact('view0');
                    foreach($view0 as $view0){
                        $viewcount_g0 = $view0->countview;
                    }
                }else{
                    $viewcount_g0 = '0';
                }
                
            }
        }else {
            $item_g0='';
            $viewcount_g0 = '';
        }

        if(isset($item_g[1])? $item_g[1]:'') {
            $item1 = $item_g[1]; //เลือกตำเเหน่งของข้อมูล
            compact('item1'); // ส่งค่า item0 จากการเลือกตำเเหน่ง
            foreach($item1 as $ite1){ // ทำการวง loop foreach เพื่อ เอาค่า id ออกจาก array
                $ite1; // id ของ ตำเเหน่งที่ 0 ที่ได้มาจากการ loop 
                // หลังจากได้ id ที่ เป็น str ก็นำมา select จาก database ทีละ id เเล้วส่งค่าไปแสดงผลหน้า homeBD
                // $item = DB::select("SELECT * FROM projectmdd,type_project,genre_project,type_project,category_project WHERE projectmdd.type_id=type_project.type_id 
                // AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projects.project_m_id='$ite0'");  
                // echo $ite1;
                $item_g1 = DB::select("SELECT * FROM users,projectmdd,genre_project,type_project,category_project WHERE projectmdd.type_id=type_project.type_id 
                AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projectmdd.user_id=users.U_id AND projectmdd.project_m_id='$ite1' ");
                //rateingproject
                // print_r($item);
                // $rate0 = DB::select("SELECT * FROM rating_p WHERE projects.type_id=type_project.type_id 
                // AND projects.project_id='$ite0'");  

                $svg1 = DB::select("AVG(rate_m_index) AS AvgRate FROM rating_m WHERE project_m_id='$ite1' GROUP BY rating_m.project_m_id"); 
                $svgrate1 = $svg0[0];
                compact('svgrate0');
                foreach($svgrate0 as $svgrate0){
                   $svgrate0 = round($svgrate0,$percision=1);
                }
                
            }
        }else {
            $item_g1='';
        }
       
        $itemA_g = DB::select("SELECT project_m_id FROM owner_projectmdd,projectmdd,genre_project,type_project,category_project WHERE category_project.category_name in ('สังคมเเละสื่อสาร') AND projectmdd.type_id=type_project.type_id 
        AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projectmdd.user_id=owner_projectmdd.owner_m_id  ORDER BY RAND()");
        // print_r($itemA);
        if(isset($itemA_g[0])? $itemA_g[0]:'') {
            $item0 = $itemA_g[0]; //เลือกตำเเหน่งของข้อมูล
            compact('item0'); // ส่งค่า item0 จากการเลือกตำเเหน่ง
            foreach($item0 as $ite0){ // ทำการวง loop foreach เพื่อ เอาค่า id ออกจาก array
                $ite0; // id ของ ตำเเหน่งที่ 0 ที่ได้มาจากการ loop 
                // หลังจากได้ id ที่ เป็น str ก็นำมา select จาก database ทีละ id เเล้วส่งค่าไปแสดงผลหน้า homeBD
                // $item = DB::select("SELECT * FROM projectmdd,type_project,genre_project,type_project,category_project WHERE projectmdd.type_id=type_project.type_id 
                // AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projects.project_m_id='$ite0'");  
                
                $itemA_g0 = DB::select("SELECT *,AVG(rate_m_index) AS AvgRate FROM rating_m,owner_projectmdd,projectmdd,genre_project,type_project,category_project WHERE projectmdd.type_id=type_project.type_id 
                AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projectmdd.user_id=owner_projectmdd.owner_m_id AND projectmdd.project_m_id=rating_m.project_m_id AND projectmdd.project_m_id='$ite0' GROUP BY rating_m.project_m_id");
                //rateingproject
                // print_r($item);
                // $rate0 = DB::select("SELECT * FROM rating_p WHERE projects.type_id=type_project.type_id 
                // AND projects.project_id='$ite0'");  

                $svgA0 = DB::select("SELECT AVG(rate_m_index) AS AvgRate FROM rating_m WHERE project_m_id='$ite0' GROUP BY rating_m.project_m_id"); 
                // print_r($svg0);
                $svgrate0 = $svg0[0];
                compact('svgrate0');
                foreach($svgrate0 as $svgrate0){
                  $svgrateA = round($svgrate0,$percision=1);
                }

                $view0 = DB::select("SELECT COUNT(login_logmdd.login_project) AS countview FROM login_logmdd,projectmdd
                WHERE projectmdd.project_m_id=login_logmdd.login_project AND projectmdd.project_m_id='$ite0'
                GROUP BY login_logmdd.login_project");
                if(isset($view0)?$view0:''){
                    compact('view0');
                    foreach($view0 as $view0){
                        $viewcountA_g0 = $view0->countview;
                    }
                }else{
                    $viewcountA_g0 = '0';
                }
                
            }
        }else {
            $itemA_g0='';
            $viewcountA_g0 = '';
        }

        if(isset($itemA_g[1])? $itemA_g[1]:'') {
            $item1 = $itemA_g[1]; //เลือกตำเเหน่งของข้อมูล
            compact('item1'); // ส่งค่า item0 จากการเลือกตำเเหน่ง
            foreach($item1 as $ite1){ // ทำการวง loop foreach เพื่อ เอาค่า id ออกจาก array
                $ite1; // id ของ ตำเเหน่งที่ 0 ที่ได้มาจากการ loop 
                // หลังจากได้ id ที่ เป็น str ก็นำมา select จาก database ทีละ id เเล้วส่งค่าไปแสดงผลหน้า homeBD
                // $item = DB::select("SELECT * FROM projectmdd,type_project,genre_project,type_project,category_project WHERE projectmdd.type_id=type_project.type_id 
                // AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projects.project_m_id='$ite0'");  
                
                $itemA_g1 = DB::select("SELECT * FROM owner_projectmdd,projectmdd,genre_project,type_project,category_project WHERE projectmdd.type_id=type_project.type_id 
                AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projectmdd.user_id=owner_projectmdd.owner_m_id AND projectmdd.project_m_id='$ite1'");
                
                //rateingproject
                // print_r($item);
                // $rate0 = DB::select("SELECT * FROM rating_p WHERE projects.type_id=type_project.type_id 
                // AND projects.project_id='$ite0'");  

                $svgA1 = DB::select("SELECT AVG(rate_m_index) AS AvgRate
                 FROM rating_m WHERE project_m_id='$ite1' 
                 GROUP BY rating_m.project_m_id"); 
                $svgrate0 = $svg0[0];
                compact('svgrate0');
                foreach($svgrate0 as $svgrate0){
                     $svgrateA = round($svgrate0,$percision=1);
                }
                
            }
        }else {
            $itemA_g1='';
        }

        //lennig
        $item_l = DB::select("SELECT project_m_id FROM users,projectmdd,genre_project,type_project,category_project WHERE category_project.category_name in ('การศึกษา') AND projectmdd.type_id=type_project.type_id 
        AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projectmdd.user_id=users.U_id ORDER BY RAND()");
        // print_r($item_l);
        if(isset($item_l[0])? $item_l[0]:'') {
            $item0 = $item_l[0]; //เลือกตำเเหน่งของข้อมูล
            compact('item0'); // ส่งค่า item0 จากการเลือกตำเเหน่ง
            foreach($item0 as $ite0){ // ทำการวง loop foreach เพื่อ เอาค่า id ออกจาก array
                $ite0; // id ของ ตำเเหน่งที่ 0 ที่ได้มาจากการ loop 
                // หลังจากได้ id ที่ เป็น str ก็นำมา select จาก database ทีละ id เเล้วส่งค่าไปแสดงผลหน้า homeBD
                // $item = DB::select("SELECT * FROM projectmdd,type_project,genre_project,type_project,category_project WHERE projectmdd.type_id=type_project.type_id 
                // AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projects.project_m_id='$ite0'");  
                
                $item_l0 = DB::select("SELECT *,AVG(rate_m_index) AS AvgRate FROM rating_m,users,projectmdd,genre_project,type_project,category_project WHERE projectmdd.type_id=type_project.type_id 
                AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projectmdd.user_id=users.U_id AND projectmdd.project_m_id=rating_m.project_m_id AND projectmdd.project_m_id='$ite0' ");
                //rateingproject
                // print_r($item);
                // $rate0 = DB::select("SELECT * FROM rating_p WHERE projects.type_id=type_project.type_id 
                // AND projects.project_id='$ite0'");  

                $svg0 = DB::select("SELECT AVG(rate_m_index) AS AvgRate FROM rating_m WHERE project_m_id='$ite0' GROUP BY rating_m.project_m_id"); 
                $svgrate0 = $svg0[0];
                compact('svgrate0');
                foreach($svgrate0 as $svgrate0){
                   $svgrate0 = round($svgrate0,$percision=1);
                }

                $view0 = DB::select("SELECT COUNT(login_logmdd.login_project) AS countview FROM login_logmdd,projectmdd
                WHERE projectmdd.project_m_id=login_logmdd.login_project AND projectmdd.project_m_id='$ite0'
                GROUP BY login_logmdd.login_project");
                if(isset($view0)?$view0:''){
                    compact('view0');
                    foreach($view0 as $view0){
                        $viewcount_l0 = $view0->countview;
                    }
                }else{
                    $viewcount_l0 = '0';
                }
                
            }
        }else {
            $item_l0='';
            $viewcount_l0 = '';
        }

        if(isset($item_l[1])? $item_l[1]:'') {
            $item1 = $item_l[1]; //เลือกตำเเหน่งของข้อมูล
            compact('item1'); // ส่งค่า item0 จากการเลือกตำเเหน่ง
            foreach($item1 as $ite1){ // ทำการวง loop foreach เพื่อ เอาค่า id ออกจาก array
                $ite1; // id ของ ตำเเหน่งที่ 0 ที่ได้มาจากการ loop 
                // หลังจากได้ id ที่ เป็น str ก็นำมา select จาก database ทีละ id เเล้วส่งค่าไปแสดงผลหน้า homeBD
                // $item = DB::select("SELECT * FROM projectmdd,type_project,genre_project,type_project,category_project WHERE projectmdd.type_id=type_project.type_id 
                // AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projects.project_m_id='$ite0'");  
                // echo $ite1;
                $item_l1 = DB::select("SELECT * FROM users,projectmdd,genre_project,type_project,category_project WHERE projectmdd.type_id=type_project.type_id 
                AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projectmdd.user_id=users.U_id AND projectmdd.project_m_id='$ite1' ");
                //rateingproject
                // print_r($item);
                // $rate0 = DB::select("SELECT * FROM rating_p WHERE projects.type_id=type_project.type_id 
                // AND projects.project_id='$ite0'");  

                $svg1 = DB::select("AVG(rate_m_index) AS AvgRate FROM rating_m WHERE project_m_id='$ite1' GROUP BY rating_m.project_m_id"); 
                $svgrate1 = $svg0[0];
                compact('svgrate0');
                foreach($svgrate0 as $svgrate0){
                   $svgrate0 = round($svgrate0,$percision=1);
                }
                
            }
        }else {
            $item_l1='';
        }
       
        $itemA_l = DB::select("SELECT project_m_id FROM owner_projectmdd,projectmdd,genre_project,type_project,category_project WHERE category_project.category_name in ('การศึกษา') AND projectmdd.type_id=type_project.type_id 
        AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projectmdd.user_id=owner_projectmdd.owner_m_id  ORDER BY RAND()");
        // print_r($itemA_l);
        if(isset($itemA_l[0])? $itemA_l[0]:'') {
            $item0 = $itemA_l[0]; //เลือกตำเเหน่งของข้อมูล
            compact('item0'); // ส่งค่า item0 จากการเลือกตำเเหน่ง
            foreach($item0 as $ite0){ // ทำการวง loop foreach เพื่อ เอาค่า id ออกจาก array
                $ite0; // id ของ ตำเเหน่งที่ 0 ที่ได้มาจากการ loop 
                // หลังจากได้ id ที่ เป็น str ก็นำมา select จาก database ทีละ id เเล้วส่งค่าไปแสดงผลหน้า homeBD
                // $item = DB::select("SELECT * FROM projectmdd,type_project,genre_project,type_project,category_project WHERE projectmdd.type_id=type_project.type_id 
                // AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projects.project_m_id='$ite0'");  
                
                $itemA_l0 = DB::select("SELECT *,AVG(rate_m_index) AS AvgRate FROM rating_m,owner_projectmdd,projectmdd,genre_project,type_project,category_project WHERE projectmdd.type_id=type_project.type_id 
                AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projectmdd.user_id=owner_projectmdd.owner_m_id AND projectmdd.project_m_id=rating_m.project_m_id AND projectmdd.project_m_id='$ite0' GROUP BY rating_m.project_m_id");
                //rateingproject
                // print_r($itemA_l0);
                // $rate0 = DB::select("SELECT * FROM rating_p WHERE projects.type_id=type_project.type_id 
                // AND projects.project_id='$ite0'");  

                $svgA0 = DB::select("SELECT AVG(rate_m_index) AS AvgRate FROM rating_m WHERE project_m_id='$ite0' GROUP BY rating_m.project_m_id"); 
                // print_r($svg0);
                $svgrate0 = $svg0[0];
                compact('svgrate0');
                foreach($svgrate0 as $svgrate0){
                  $svgrateA = round($svgrate0,$percision=1);
                }

                $view0 = DB::select("SELECT COUNT(login_logmdd.login_project) AS countview FROM login_logmdd,projectmdd
                WHERE projectmdd.project_m_id=login_logmdd.login_project AND projectmdd.project_m_id='$ite0'
                GROUP BY login_logmdd.login_project");
                if(isset($view0)?$view0:''){
                    compact('view0');
                    foreach($view0 as $view0){
                        $viewcountA_l0 = $view0->countview;
                    }
                }else{
                    $viewcountA_l0 = '0';
                }
                
            }
        }else {
            $itemA_l0='';
            $viewcountA_l0 = '';
        }

        if(isset($itemA_l[1])? $itemA_l[1]:'') {
            $item1 = $itemA_l[1]; //เลือกตำเเหน่งของข้อมูล
            compact('item1'); // ส่งค่า item0 จากการเลือกตำเเหน่ง
            foreach($item1 as $ite1){ // ทำการวง loop foreach เพื่อ เอาค่า id ออกจาก array
                $ite1; // id ของ ตำเเหน่งที่ 0 ที่ได้มาจากการ loop 
                // หลังจากได้ id ที่ เป็น str ก็นำมา select จาก database ทีละ id เเล้วส่งค่าไปแสดงผลหน้า homeBD
                // $item = DB::select("SELECT * FROM projectmdd,type_project,genre_project,type_project,category_project WHERE projectmdd.type_id=type_project.type_id 
                // AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projects.project_m_id='$ite0'");  
                
                $itemA_l1 = DB::select("SELECT * FROM owner_projectmdd,projectmdd,genre_project,type_project,category_project WHERE projectmdd.type_id=type_project.type_id 
                AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projectmdd.user_id=owner_projectmdd.owner_m_id AND projectmdd.project_m_id='$ite1'");
                
                //rateingproject
                // print_r($item);
                // $rate0 = DB::select("SELECT * FROM rating_p WHERE projects.type_id=type_project.type_id 
                // AND projects.project_id='$ite0'");  

                $svgA1 = DB::select("SELECT AVG(rate_m_index) AS AvgRate
                 FROM rating_m WHERE project_m_id='$ite1' 
                 GROUP BY rating_m.project_m_id"); 
                $svgrate0 = $svg0[0];
                compact('svgrate0');
                foreach($svgrate0 as $svgrate0){
                     $svgrateA = round($svgrate0,$percision=1);
                }
                
                
            }
        }else {
            $itemA_l1='';
        }

        //sport
        $item_s = DB::select("SELECT project_m_id FROM users,projectmdd,genre_project,type_project,category_project WHERE category_project.category_name in ('กีฬา') AND projectmdd.type_id=type_project.type_id 
        AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projectmdd.user_id=users.U_id ORDER BY RAND()");
        // print_r($item_m);
        if(isset($item_s[0])? $item_s[0]:'') {
            $item0 = $item_s[0]; //เลือกตำเเหน่งของข้อมูล
            compact('item0'); // ส่งค่า item0 จากการเลือกตำเเหน่ง
            foreach($item0 as $ite0){ // ทำการวง loop foreach เพื่อ เอาค่า id ออกจาก array
                $ite0; // id ของ ตำเเหน่งที่ 0 ที่ได้มาจากการ loop 
                // หลังจากได้ id ที่ เป็น str ก็นำมา select จาก database ทีละ id เเล้วส่งค่าไปแสดงผลหน้า homeBD
                // $item = DB::select("SELECT * FROM projectmdd,type_project,genre_project,type_project,category_project WHERE projectmdd.type_id=type_project.type_id 
                // AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projects.project_m_id='$ite0'");  
                
                $item_s0 = DB::select("SELECT *,AVG(rate_m_index) AS AvgRate FROM rating_m,users,projectmdd,genre_project,type_project,category_project WHERE projectmdd.type_id=type_project.type_id 
                AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projectmdd.user_id=users.U_id AND projectmdd.project_m_id=rating_m.project_m_id AND projectmdd.project_m_id='$ite0' ");
                //rateingproject
                // print_r($item);
                // $rate0 = DB::select("SELECT * FROM rating_p WHERE projects.type_id=type_project.type_id 
                // AND projects.project_id='$ite0'");  

                $svg0 = DB::select("SELECT AVG(rate_m_index) AS AvgRate FROM rating_m WHERE project_m_id='$ite0' GROUP BY rating_m.project_m_id"); 
                $svgrate0 = $svg0[0];
                compact('svgrate0');
                foreach($svgrate0 as $svgrate0){
                   $svgrate0 = round($svgrate0,$percision=1);
                }

                $view0 = DB::select("SELECT COUNT(login_logmdd.login_project) AS countview FROM login_logmdd,projectmdd
                WHERE projectmdd.project_m_id=login_logmdd.login_project AND projectmdd.project_m_id='$ite0'
                GROUP BY login_logmdd.login_project");
                if(isset($view0)?$view0:''){
                    compact('view0');
                    foreach($view0 as $view0){
                        $viewcount_s0 = $view0->countview;
                    }
                }else{
                    $viewcount_s0 = '0';
                }
                
            }
        }else {
            $item_s0='';
            $viewcount_s0 = '';
        }

        if(isset($item_s[1])? $item_s[1]:'') {
            $item1 = $item_s[1]; //เลือกตำเเหน่งของข้อมูล
            compact('item1'); // ส่งค่า item0 จากการเลือกตำเเหน่ง
            foreach($item1 as $ite1){ // ทำการวง loop foreach เพื่อ เอาค่า id ออกจาก array
                $ite1; // id ของ ตำเเหน่งที่ 0 ที่ได้มาจากการ loop 
                // หลังจากได้ id ที่ เป็น str ก็นำมา select จาก database ทีละ id เเล้วส่งค่าไปแสดงผลหน้า homeBD
                // $item = DB::select("SELECT * FROM projectmdd,type_project,genre_project,type_project,category_project WHERE projectmdd.type_id=type_project.type_id 
                // AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projects.project_m_id='$ite0'");  
                // echo $ite1;
                $item_s1 = DB::select("SELECT * FROM users,projectmdd,genre_project,type_project,category_project WHERE projectmdd.type_id=type_project.type_id 
                AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projectmdd.user_id=users.U_id AND projectmdd.project_m_id='$ite1' ");
                //rateingproject
                // print_r($item);
                // $rate0 = DB::select("SELECT * FROM rating_p WHERE projects.type_id=type_project.type_id 
                // AND projects.project_id='$ite0'");  

                $svg1 = DB::select("AVG(rate_m_index) AS AvgRate FROM rating_m WHERE project_m_id='$ite1' GROUP BY rating_m.project_m_id"); 
                $svgrate1 = $svg0[0];
                compact('svgrate0');
                foreach($svgrate0 as $svgrate0){
                   $svgrate0 = round($svgrate0,$percision=1);
                }
                
            }
        }else {
            $item_s1='';
        }
       
        $itemA_s = DB::select("SELECT project_m_id FROM owner_projectmdd,projectmdd,genre_project,type_project,category_project WHERE category_project.category_name in ('กีฬา') AND projectmdd.type_id=type_project.type_id 
        AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projectmdd.user_id=owner_projectmdd.owner_m_id  ORDER BY RAND()");
        // print_r($itemA);
        if(isset($itemA_s[0])? $itemA_s[0]:'') {
            $item0 = $itemA_s[0]; //เลือกตำเเหน่งของข้อมูล
            compact('item0'); // ส่งค่า item0 จากการเลือกตำเเหน่ง
            foreach($item0 as $ite0){ // ทำการวง loop foreach เพื่อ เอาค่า id ออกจาก array
                $ite0; // id ของ ตำเเหน่งที่ 0 ที่ได้มาจากการ loop 
                // หลังจากได้ id ที่ เป็น str ก็นำมา select จาก database ทีละ id เเล้วส่งค่าไปแสดงผลหน้า homeBD
                // $item = DB::select("SELECT * FROM projectmdd,type_project,genre_project,type_project,category_project WHERE projectmdd.type_id=type_project.type_id 
                // AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projects.project_m_id='$ite0'");  
                
                $itemA_s0 = DB::select("SELECT *,AVG(rate_m_index) AS AvgRate FROM rating_m,owner_projectmdd,projectmdd,genre_project,type_project,category_project WHERE projectmdd.type_id=type_project.type_id 
                AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projectmdd.user_id=owner_projectmdd.owner_m_id AND projectmdd.project_m_id=rating_m.project_m_id AND projectmdd.project_m_id='$ite0' GROUP BY rating_m.project_m_id");
                //rateingproject
                // print_r($item);
                // $rate0 = DB::select("SELECT * FROM rating_p WHERE projects.type_id=type_project.type_id 
                // AND projects.project_id='$ite0'");  

                $svgA0 = DB::select("SELECT AVG(rate_m_index) AS AvgRate FROM rating_m WHERE project_m_id='$ite0' GROUP BY rating_m.project_m_id"); 
                // print_r($svg0);
                $svgrate0 = $svg0[0];
                compact('svgrate0');
                foreach($svgrate0 as $svgrate0){
                  $svgrateA = round($svgrate0,$percision=1);
                }

                $view0 = DB::select("SELECT COUNT(login_logmdd.login_project) AS countview FROM login_logmdd,projectmdd
                WHERE projectmdd.project_m_id=login_logmdd.login_project AND projectmdd.project_m_id='$ite0'
                GROUP BY login_logmdd.login_project");
                if(isset($view0)?$view0:''){
                    compact('view0');
                    foreach($view0 as $view0){
                        $viewcountA_s0 = $view0->countview;
                    }
                }else{
                    $viewcountA_s0 = '0';
                }
                
            }
        }else {
            $itemA_s0='';
            $viewcountA_s0 = '';
        }

        if(isset($itemA_s[1])? $itemA_s[1]:'') {
            $item1 = $itemA_s[1]; //เลือกตำเเหน่งของข้อมูล
            compact('item1'); // ส่งค่า item0 จากการเลือกตำเเหน่ง
            foreach($item1 as $ite1){ // ทำการวง loop foreach เพื่อ เอาค่า id ออกจาก array
                $ite1; // id ของ ตำเเหน่งที่ 0 ที่ได้มาจากการ loop 
                // หลังจากได้ id ที่ เป็น str ก็นำมา select จาก database ทีละ id เเล้วส่งค่าไปแสดงผลหน้า homeBD
                // $item = DB::select("SELECT * FROM projectmdd,type_project,genre_project,type_project,category_project WHERE projectmdd.type_id=type_project.type_id 
                // AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projects.project_m_id='$ite0'");  
                
                $itemA_s1 = DB::select("SELECT * FROM owner_projectmdd,projectmdd,genre_project,type_project,category_project WHERE projectmdd.type_id=type_project.type_id 
                AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projectmdd.user_id=owner_projectmdd.owner_m_id AND projectmdd.project_m_id='$ite1'");
                
                //rateingproject
                // print_r($item);
                // $rate0 = DB::select("SELECT * FROM rating_p WHERE projects.type_id=type_project.type_id 
                // AND projects.project_id='$ite0'");  

                $svgA1 = DB::select("SELECT AVG(rate_m_index) AS AvgRate
                 FROM rating_m WHERE project_m_id='$ite1' 
                 GROUP BY rating_m.project_m_id"); 
                $svgrate0 = $svg0[0];
                compact('svgrate0');
                foreach($svgrate0 as $svgrate0){
                     $svgrateA = round($svgrate0,$percision=1);
                }
                
            }
        }else {
            $itemA_s1='';
        }


        

        // $chk_genre = DB::select("SELECT * FROM genre_project");
        // $chk_category = DB::select("SELECT * FROM category_project");
        // $chk_type = DB::select("SELECT * FROM type_project");

        return view('homeMDD',compact('item_m0','item_m1','item_h0','item_h1','item_g0','item_g1','item_l0','item_l1','item_s0','item_l1','svgrate0','svgrateA','adminaccount','userimg','viewcountA0','viewcount0',
        'viewcountA_h0','viewcount_h0','viewcountA_g0','viewcount_g0','viewcountA_l0','viewcount_l0','viewcountA_s0','viewcount_s0','imgaccount','sum_follow','chk_health','sum_game','itemA1','itemA0','itemA_h0',
        'itemA_h1','itemA_g0','itemA_g1','itemA_l0','itemA_l1','itemA_s0','itemA_s1','chk_genre','chk_category','chk_type','chk_branch'));
    }
    
    public function editprojectadmin(Request $request) {
        
        $project_m_id = $request->input('project_m_id');
        $project_name = $request->input('project_name');
        $keyword_project = $request->input('keyword_project');
        $des_project = $request->input('des_project');
        $owner_p = $request->input('owner_m');
        $advisor_p = $request->input('advisor_m');
        $type_project = $request->input('type_project');
        $genre_project = $request->input('genre_project');
        $category_project = $request->input('category_project');
        $project_m_name_en = $request->input('project_name_en');

        DB::update("UPDATE projectmdd SET project_m_name = '$project_name', keyword_m_project ='$keyword_project', des_m_project ='$des_project', type_id ='$type_project',
         genre_id ='$genre_project', category_id ='$category_project', project_m_name_en ='$project_m_name_en', projectmdd.updated_at = CURRENT_TIMESTAMP() WHERE project_m_id='$project_m_id'");
        
        return redirect('viewprojectmdd')->with('successupdate', 'อัพเดทข้อมูลเรียบร้อย');
    }

    public function projectmdd($project_m_id) {

        $data = DB::select("SELECT * FROM type_project,genre_project,category_project,users,projectmdd 
        WHERE project_m_id='$project_m_id' AND projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id 
        AND projectmdd.category_id=category_project.category_id AND users.U_id=projectmdd.user_id ");
        
        $dataA = DB::select("SELECT * FROM type_project,genre_project,category_project,admin_company,owner_projectmdd,projectmdd 
        WHERE project_m_id='$project_m_id' AND projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id 
        AND projectmdd.category_id=category_project.category_id AND owner_projectmdd.owner_m_id=projectmdd.user_id AND admin_company.admin_id=projectmdd.adm_id ");

        $chk_type = DB::select("SELECT * FROM type_project");
        $chk_genre = DB::select("SELECT * FROM genre_project");
        $chk_category = DB::select("SELECT * FROM category_project");
        $chk_branch = DB::select("SELECT * FROM branch_project");

        if(isset($_SESSION['usersid'])?$_SESSION['usersid']:''){
            $ip = $_SERVER['REMOTE_ADDR'];
            DB::table('login_logmdd')->insert(
                [
                    'login_user' => $_SESSION['usersid'],
                    'login_project' => $project_m_id,
                    'login_ip' => $ip,
                    'login_datetime' => now(),
                    'login_status' => 'view',
                    'login_ontime' => '1',
                ]
            );
        }

        return view('project.detailprojectMDD_Ad',compact('data','chk_type','chk_genre','chk_category','chk_branch','project_m_id','dataA'));
    }

    public function downloadfile(Request $request) {
        session_start();
        $project_id = $request->project_id;
        // $rating = $request->rating;
        // $userID = $_SESSION['usersid'];

        // $codeu = 'R';
        // $cont = count(DB::select("SELECT NO_PM FROM rating_m"));
        // $nextint = $cont+1;
        // $string_id = substr("00".$nextint,-3);
        // $nextid = $codeu.$string_id;

        // DB::INSERT("INSERT INTO rating_m (rating_m_id, rate_m_index, project_m_id, user_m_id) VALUES ('$nextid','$rating','$project_id','1')");
        
        $file_m = DB::select("SELECT namefile,file_m FROM projectmdd WHERE project_m_id='$project_id'");
        compact('file_m');
        foreach($file_m as $file_m){
            $file = $file_m->file_m;
            $namefile = $file_m->namefile;
        }
        $file_path = public_path('project/'.$file);

        $ip = $_SERVER['REMOTE_ADDR'];
        DB::table('log_downloadmdd')->insert(
            [
                'login_user' => $_SESSION['usersid'],
                'id_project' => $project_id,
                'login_ip' => $ip,
                'login_datetime' => now(),
                'login_status' => 'd_file',
                'login_ontime' => '1',
            ]
        );

        return response()->download($file_path,$namefile);

    }
   
    
}