<?php

namespace App\Http\Controllers;

use App\Project;
use App\User;
use DB;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;


class ProjectController extends Controller
{
    //เพิ่มข้อมูล project
    public function insertproject(Request $request) {
        $project = new Project;
        session_start();
        $userid = $_SESSION['usersid'];
        $project->user_id=$userid;
        $project->project_m_name=$request->project_name;
        $project->keyword_m_project=$request->keyword_project;
        $project->des_m_project=$request->des_project;
        // $dataproject->facebook=$request->facebook;
        // $dataproject->email=$request->email;
        // $dataproject->phone=$request->phone;
        $project->type_id=$request->type_project;
        $project->genre_id=$request->genre_project;
        $project->category_id=$request->category_project;
        $project->branch_id=$request->branch_project;
        $project->save();
        return redirect('homeMDD')->with('successappproject', 'สร้างผลงานเรียบร้อย');
    }

    public function showproject() {
        $project = Project::with('user')->orderby('project_id')->paginate(5);
        return view('admin.project',compact('project'));
    }

    // dropdown show
    public function viewadd() {
        $chk_type = DB::select("SELECT * FROM type_project");
        $chk_genre = DB::select("SELECT * FROM genre_project");
        $chk_category = DB::select("SELECT * FROM category_project");
        $chk_branch = DB::select("SELECT * FROM branch_project");
        return view('project.addprojectMDD',compact('chk_type','chk_genre','chk_category','chk_branch'));
    }

    // join หน้า detailprject เเละโชว์ข้อมูล project
    public function project() {
        session_start();
        $chkidproject = $_SESSION['usersid'];
        
        $data = DB::select("SELECT * FROM type_project,genre_project,category_project,users,projectmdd 
        WHERE users.id=projectmdd.user_id and id='$chkidproject' AND projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id 
        AND projectmdd.category_id=category_project.category_id ");
        

        $chk_type = DB::select("SELECT * FROM type_project");
        $chk_genre = DB::select("SELECT * FROM genre_project");
        $chk_category = DB::select("SELECT * FROM category_project");
        $chk_branch = DB::select("SELECT * FROM branch_project");
        return view('project.detailprojectMDD',compact('data','chk_type','chk_genre','chk_category','chk_branch','imglogoproject'));
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
         genre_id ='$genre_project', category_id ='$category_project',  WHERE users.id=projectmdd.user_id AND id='$chkidproject'");
        
        return redirect('project.detailproject')->with('success', 'อัพเดทข้อมูลเรียบร้อย');
    }

    public function itemproject() {
        session_start();
        // $chkid = $_SESSION['usersid'];
        $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
        $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
        $item = DB::select("SELECT * FROM projectmdd,type_project WHERE projectmdd.type_id=type_project.type_id and project_m_id='1'");
        
        $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_company_id='$chkidadmin'");

        return view('homeMDD',compact('item','adminaccount'));
    }


}
