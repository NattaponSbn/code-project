<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Project;
use App\Projectmdd;
use App\Owner;
use App\Ownermdd;

class AdminController extends Controller
{
    //viewaddprojectBD
    public function viewaddbd() {
        $chk_user = DB::select("SELECT * FROM owner_project");
        $chk_type = DB::select("SELECT * FROM type_project");
        $chk_genre = DB::select("SELECT * FROM genre_project");
        $chk_category = DB::select("SELECT * FROM category_project");
        $chk_branch = DB::select("SELECT * FROM branch_project");
        return view('admin.addproject_Ad',compact('chk_user','chk_type','chk_genre','chk_category','chk_branch'));
    }

    //viewaddprojectMDD
    public function viewaddmdd() {
        $chk_user = DB::select("SELECT * FROM owner_projectmdd");
        $chk_type = DB::select("SELECT * FROM type_project");
        $chk_genre = DB::select("SELECT * FROM genre_project");
        $chk_category = DB::select("SELECT * FROM category_project");
        $chk_branch = DB::select("SELECT * FROM branch_project");
        return view('admin.addprojectMDD_Ad',compact('chk_user','chk_type','chk_genre','chk_category','chk_branch'));
    }

    public function insertprojectBD_Ad(Request $request) {
        
        $codeu = 'PB';
        $cont = count(DB::select("SELECT No_PB FROM projects"));
        $nextint = $cont+1;
        $string_id = substr("000".$nextint,-4);
        $nextid = $codeu.$string_id;
        session_start();
        $_SESSION['dataprject'] = 'project';
        $userid = $_SESSION['adminid'];
        $logo = 'defaultlogo.png';
        $status_p = '0';

        $user_id=$request->owner_p;
        $chk_yet=DB::select("SELECT projects.user_id FROM projects WHERE projects.user_id='$user_id'");
        if(isset($chk_yet)?$chk_yet:''){
            return redirect('addBD')->with('yetdata', 'ผู้ใช้คนนี้มีผลงานอยู่ในระบบเเล้ว');
            // echo 'ผู้ใช้คนนี้มีผลงานอยู่ในระบบเเล้ว';
        }else {
            if($_POST['owner_p']=='' || $userid=='' || $nextid=='' || $_POST['project_name']==''
            || $_POST['project_name_en']=='' || $_POST['keyword_project']=='' || $_POST['des_project']=='' 
            || $_POST['type_project']==''|| $_POST['genre_project']=='' || $_POST['branch_project']=='' 
            || $_POST['advisor_p']==''|| $logo=='') {
                return redirect('addBD')->with('errordata', 'เกิดข้อผิดพลาด');
            }
            else {
                // echo $userid;
                $project = new Project;
                $project->user_id=$request->owner_p;
                $project->ad_id=$userid;
                $project->project_id=$nextid;
                $project->status_p=$status_p;
                $project->project_name=$request->project_name;
                $project->name_en=$request->project_name_en;
                $project->keyword_project=$request->keyword_project;
                $project->des_project=$request->des_project;
                $project->type_id=$request->type_project;
                $project->genre_id=$request->genre_project;
                $project->category_id=$request->category_project;
                $project->branch_id=$request->branch_project;
                $project->advisor_p=$request->advisor_p;
                $project->logo=$logo;
                $project->save();

                $imgproject1 = 'defaultimg1.png';
                $imgproject2 = 'defaultimg2.png';
                $imgproject3 = 'defaultimg3.png';

                DB::INSERT("INSERT INTO img_project (img_p_1, img_p_2, img_p_3, p_id) VALUES ('$imgproject1','$imgproject2','$imgproject3','$user_id')");
                return redirect('viewproject')->with('successappproject', 'สร้างผลงานเรียบร้อย');
            }
        }
        
    }

    public function insertprojectMDD_Ad(Request $request) {
        
        $codeu = 'PM';
        $cont = count(DB::select("SELECT No_PM FROM projectmdd"));
        $nextint = $cont+1;
        $string_id = substr("000".$nextint,-4);
        $nextid = $codeu.$string_id;

        session_start();
        $_SESSION['dataprject'] = 'project';
        $adminid = $_SESSION['adminid'];
        $logo = 'defaultlogo.png';

        $user_id=$request->owner_m;
        $status_m='0';
        
        // echo $user_id;
        $chk_yet=DB::select("SELECT projectmdd.user_id FROM projectmdd WHERE projectmdd.user_id='$user_id'");
        if(isset($chk_yet)?$chk_yet:''){
            return redirect('addMDD')->with('yetdata', 'ผู้ใช้คนนี้มีผลงานอยู่ในระบบเเล้ว');
            // echo 'ผู้ใช้คนนี้มีผลงานอยู่ในระบบเเล้ว';
        }
        else {
            if($_POST['owner_m']=='' || $adminid=='' || $nextid=='' || $_POST['project_name']==''
            || $_POST['project_name_en']=='' || $_POST['keyword_project']=='' || $_POST['des_project']=='' 
            || $_POST['type_project']==''|| $_POST['genre_project']=='' || $_POST['branch_project']=='' 
            || $_POST['advisor_m']=='') {
                return redirect('addMDD')->with('errordata', 'เกิดข้อผิดพลาด');
            }
            else {
                $project = new Projectmdd;
                $project->user_id=$request->owner_m;
                $project->adm_id=$adminid;
                $project->project_m_id=$nextid;
                $project->project_m_name=$request->project_name;
                $project->project_m_name_en=$request->project_name_en;
                $project->keyword_m_project=$request->keyword_project;
                $project->des_m_project=$request->des_project;
                $project->status_m=$status_m;
                $project->type_id=$request->type_project;
                $project->genre_id=$request->genre_project;
                $project->category_id=$request->category_project;
                $project->branch_id=$request->branch_project;
                $project->advisor_m=$request->advisor_m;
                $project->save();
                return redirect('viewprojectmdd')->with('successappproject', 'สร้างผลงานเรียบร้อย');
            }
            
        }
        // echo $userid;
    }
    public function delete_project($project_id){
        // $chk = DB::select("SELECT * FROM projects WHERE projects.project_id='$project_id'");
        // // print_r($chk);
        // compact('chk');
        // foreach($chk as $chks) {
        //     $id=$chks->project_id;
        //     DB::delete("DELETE FROM img_project WHERE img_project.p_id='$id'");
        // }
        DB::delete("DELETE FROM img_project WHERE img_project.p_id='$project_id'");
        DB::delete("DELETE FROM projects WHERE projects.project_id='$project_id'");
            
        //ลบไฟล์ทั้งใน database เเละ ในโฟลเดอร์
        //ไฟล์บทคัดย่อ
        $chk_A = DB::select("SELECT fileA_path FROM file_ad WHERE id_projectA='$project_id'");
        foreach($chk_A as $chk_A){
            @unlink("project/$chk_A->fileA_path");
        }
        DB::delete("DELETE FROM file_ad WHERE id_projectA='$project_id'");

        //ไฟล์เล่ม
        $chk_B = DB::select("SELECT fileB_path FROM file_book WHERE id_projectB='$project_id'");
        foreach($chk_B as $chk_B){
            @unlink("project/$chk_B->fileB_path");
        }
        // unlink("project/.$chk_B");
        DB::delete("DELETE FROM file_book WHERE id_projectB='$project_id'");
        
        //ไฟล์โปสเตอร์
        $chk_P = DB::select("SELECT fileP_path FROM file_postter WHERE id_projectP='$project_id'");
        foreach($chk_P as $chk_P){
            @unlink("project/$chk_P->fileP_path");
        }
        DB::delete("DELETE FROM file_postter WHERE id_projectP='$project_id'");

        //ไฟล์สไล
        $chk_S = DB::select("SELECT fileS_path FROM file_slide WHERE id_projectS='$project_id'");
        foreach($chk_S as $chk_S){
            @unlink("project/$chk_S->fileS_path");
        }
        DB::delete("DELETE FROM file_slide WHERE id_projectS='$project_id'");

        DB::delete("DELETE FROM link_code WHERE id_projectL='$project_id'");
        DB::delete("DELETE FROM rating_p WHERE rating_p.project_id='$project_id'");
        DB::delete("DELETE FROM login_log WHERE login_log.login_project='$project_id'");
        DB::delete("DELETE FROM temp_star WHERE id_pro='$project_id'");

        return back()->with('delete_project', 'ลบข้อมูลเรียบร้อย');
    }
    public function delete_projectmdd($project_m_id){
        $chk_M = DB::select("SELECT file_m FROM projectmdd WHERE projectmdd.project_m_id='$project_m_id'");
        foreach($chk_M as $chk_M){
            @unlink("project/$chk_M->file_m");
        }
        DB::delete("DELETE FROM projectmdd WHERE projectmdd.project_m_id='$project_m_id'");
        DB::delete("DELETE FROM rating_m WHERE rating_p.project_id='$project_m_id'");
        DB::delete("DELETE FROM login_logmdd WHERE login_log.login_project='$project_m_id'");
        return back()->with('delete_project', 'ลบข้อมูลเรียบร้อย');
    }

    public function datadetil(){
        session_start();
        $chkid = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
        $imgaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkid'");
        
        //data รวม user
        $chk_user = count(DB::select("SELECT NO_User FROM users"));
        $chk_owner = count(DB::select("SELECT no_id FROM owner_project"));
        $chk_owner_m = count(DB::select("SELECT no_o_m FROM owner_projectmdd"));
        $sum_user = $chk_user+$chk_owner+$chk_owner_m;
        
        //data รวม project(1)
        $chk_project = count(DB::select("SELECT No_PB FROM projects WHERE projects.status_p in ('1')"));
        $chk_projectmdd = count(DB::select("SELECT NO_PM FROM projectmdd WHERE projectmdd.status_m in ('1')"));
        $sum_project = $chk_project+$chk_projectmdd;

        //data รวม project(0)
        $cp_project = count(DB::select("SELECT No_PB FROM projects WHERE projects.status_p in ('0')"));
        $cm_project = count(DB::select("SELECT NO_PM FROM projectmdd WHERE projectmdd.status_m in ('0')"));
        $sum_upload = $cp_project+$cm_project;
        $_SESSION['project0']='peoject0';

        $chk_project0 = DB::select("SELECT * FROM projects,users WHERE projects.user_id=users.U_id and projects.status_p in ('0')");
        $chk_projectA0 = DB::select("SELECT * FROM projects,owner_project WHERE owner_project.owner_id=projects.user_id and projects.status_p in ('0')");
        $countID = count(DB::select("SELECT * FROM projects WHERE projects.status_p in ('0')"));
        // print_r($chk_projectA0);
        return view('admin.homeadmin',compact('imgaccount','sum_user','sum_project','chk_project0','chk_projectA0','sum_upload','countID'));
        // print_r($chk_project0);
        // if(isset($chk_project0) ? $chk_project0:'') {
        //     // foreach($chk_project0 as $chk_project0){
        //     //     $chk_id = $chk_project0->project_id;
        //     //     echo $chk_id;
        //     for($i=0;$i<$countID;$i++){
        //         $chk_id = $chk_project0[$i];
        //         compact('chk_id');
        //         foreach($chk_id as $chk_id){
        //             echo $chk_id;
                    
        //         }
        //         if(DB::select("SELECT * FROM projects,users WHERE projects.user_id=users.U_id AND projects.project_id='$chk_id'")){
        //             $project0 = DB::select("SELECT * FROM projects,users WHERE projects.user_id=users.U_id AND projects.project_id='$chk_id'");
        //             // print_r($project0);
        //             // return view('admin.homeadmin',compact('imgaccount','sum_user','sum_project','project0','sum_upload','countID'));
        //         }
        //         elseif(DB::select("SELECT * FROM projects,owner_project WHERE owner_project.owner_id=projects.user_id AND projects.project_id='$chk_id'")){
        //             $project0 = DB::select("SELECT * FROM projects,owner_project WHERE owner_project.owner_id=projects.user_id AND projects.project_id='$chk_id'");
        //             $_SESSION['status_p'] = 'owner';
        //             // print_r($project0);
        //             return view('admin.homeadmin',compact('imgaccount','sum_user','sum_project','project0','sum_upload','countID'));
        //         }
        //         else {
        //             echo 'ไม่มีข้อมูลเเสดง';
        //         }
                
        //     }
            
            
        // }
        // print_r($project0);

        
        
    }

    public function confirmproject($project_id){
        $confirm = '1';
        DB::update("UPDATE projects SET projects.status_p='$confirm' WHERE projects.project_id ='$project_id'");
        return back()->with('successconfirm', 'ยืนยันเรียบร้อย');
    }

    public function readfile($project_id){
        $chk_file = DB::select("SELECT * FROM projects WHERE project_id='$project_id' ");
        compact('chk_file');
        // print_r($chk_file);
        foreach($chk_file as $chk_file){
            $file_chk = $chk_file->temp_file_chk;
            $namefile_chk = $chk_file->temp_namefile_chk;
        }
        // $file = 'project'.$file_chk;
        // $filename = $namefile_chk;
        // // echo $filename;
        // // header('Content-type: application/html');
        // // header('Content-Disposition: inline; filename="' . $filename . '"');
        // // header('Content-Transfer-Encoding: binary');
        // // header('Accept-Ranges: bytes');
        // @readfile($file);
        return view('admin.readfile',compact('file_chk','namefile_chk'));
    }

     // admin show
     public function showdata() {
        session_start();
        $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';

        $imgaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");

        $project = DB::select("SELECT * FROM type_project,genre_project,category_project,users,projects,img_project,year_project
        WHERE users.U_id=projects.user_id AND projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id 
        AND projects.category_id=category_project.category_id AND projects.project_id=img_project.p_id AND projects.project_year=year_project.NO_Y");
        // echo'<pre>';
        // print_r($project);
        // echo'</pre>';
        $projectA = DB::select("SELECT * FROM type_project,genre_project,category_project,admin_company,owner_project,projects,img_project,year_project
        WHERE owner_project.owner_id=projects.user_id and admin_company.admin_id=projects.ad_id AND projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id 
        AND projects.category_id=category_project.category_id AND projects.project_id=img_project.p_id AND projects.project_year=year_project.NO_Y");

        return view('admin.project',compact('project','imgaccount','projectA'));
    }

    public function showdatamdd() {
        session_start();
        $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';

        $imgaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");

        $projectmdd = DB::select("SELECT * FROM type_project,genre_project,category_project,users,projectmdd,year_project
        WHERE users.U_id=projectmdd.user_id AND projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id 
        AND projectmdd.category_id=category_project.category_id AND projectmdd.project_m_year=year_project.NO_Y");

        $projectmddA = DB::select("SELECT * FROM type_project,genre_project,category_project,admin_company,owner_projectmdd,projectmdd,year_project
        WHERE owner_projectmdd.owner_m_id=projectmdd.user_id and admin_company.admin_id=projectmdd.adm_id AND projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id 
        AND projectmdd.category_id=category_project.category_id AND projectmdd.project_m_year=year_project.NO_Y ");

        return view('admin.projectmdd',compact('projectmdd','imgaccount','projectmddA'));
    }
}
