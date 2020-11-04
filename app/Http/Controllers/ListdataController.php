<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Datauser;
use App\Dataproject;
use App\Datalist;
use App\User;
use App\Dataupload;
use App\Datafileupload;
use App\Http\Controllers;

class ListdataController extends Controller
{
    //
    public function Datalist()
    {
        session_start();
        $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';

        $imgaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        $data = DB::select("SELECT * FROM users");
        $dataadmin = DB::select("SELECT * FROM admin_company");
        return view('admin.datauser', compact('data', 'dataadmin', 'imgaccount'));
    }

    public function Datalistadmin()
    {
        session_start();
        $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';

        $imgaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");

        $dataadmin = DB::select("SELECT * FROM admin_company");
        return view('admin.dataadmin', compact('dataadmin', 'imgaccount'));
    }

    public function Datalistproject()
    {
        // $dataproject = DB::select('SELECT * FROM addproject');
        $dataproject = Dataproject::all();
        return view('dataproject', ['dataproject' => $dataproject]);
    }


    public function Newarrivaldata()
    {
        session_start();
        $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
        $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
        $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
        $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        // $item = DB::select("SELECT * FROM projects,type_project WHERE projects.type_id=type_project.type_id and project_id='6'");
        $datas0 = DB::select("SELECT * FROM projects,type_project WHERE projects.type_id=type_project.type_id AND projects.status_p in ('0') ORDER BY projects.created_at DESC");
        // $datas1 = DB::select("SELECT *,AVG(rate_index) AS AvgRate  
        // FROM projects,type_project,rating_p WHERE projects.type_id=type_project.type_id 
        // AND projects.project_id=rating_p.project_id AND projects.status_p in ('1') 
        // GROUP BY rating_p.project_id 
        // ORDER BY projects.created_at DESC LIMIT 20");
        $temp = DB::select("SELECT * FROM projects,genre_project,type_project
        WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id 
        AND projects.status_p in ('1')
        ORDER BY projects.created_at DESC LIMIT 20");

            
        foreach($temp as $data){
            $ID = $data->project_id;
            $temp_star = DB::select("SELECT *,AVG(rate_index) as AvgRate FROM rating_p WHERE rating_p.project_id = '$ID' GROUP BY rating_p.project_id");
            compact('temp_star');
            foreach($temp_star as $temp_star){
                $idr = $temp_star->rating_id;
                $idp = $temp_star->project_id;
                $ida = $temp_star->AvgRate;
                $chkvalur = DB::select("SELECT id_pro FROM temp_star WHERE id_pro='$idp'");
                // print_r($chkvalur);
                if(isset($chkvalur)?$chkvalur:''){
                    DB::update("UPDATE temp_star SET id_star='$idr',avg_sum='$ida' WHERE id_pro='$idp'");
                    DB::update("UPDATE projects SET fk_star='$idr' WHERE project_id='$idp'");
                    // echo 'มีเเล้ว';
                }else{
                    DB::insert("INSERT INTO temp_star(id_star,id_pro, avg_sum) VALUES ('$idr','$idp','$ida')");
                    DB::update("UPDATE projects SET fk_star='$idr' WHERE project_id='$idp'");
                    // echo 'มีเเล้ว';
                }
            }
            // echo'<pre>';
            // print_r($temp_star);
            // echo'</pre>';
        }

        $datas1 = DB::select("SELECT *,COUNT(login_project) AS countview FROM projects,genre_project,type_project,login_log,temp_star
        WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id AND temp_star.id_star=projects.fk_star
        AND projects.project_id=login_log.login_project
        GROUP BY login_project ORDER BY projects.created_at DESC LIMIT 20");
        // echo'<pre>';
        //     print_r($datas1);
        //     echo'</pre>';

        $datascount = count(DB::select("SELECT * FROM projects,type_project WHERE projects.type_id=type_project.type_id AND projects.status_p in ('1') ORDER BY projects.created_at DESC"));
        $chk_genre = DB::select("SELECT * FROM genre_project");
        $chk_category = DB::select("SELECT * FROM category_project");
        $chk_type = DB::select("SELECT * FROM type_project");
        $chk_branch = DB::select("SELECT * FROM branch_project");
        return view('pagewedsum.Newarrival', compact('datas0', 'datas1', 'imgaccount', 'adminaccount','datascount','chk_genre','chk_category','chk_type','chk_branch'));
    }


    public function dataIot()
    {
        session_start();
        $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
        $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
        $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
        $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        // $item = DB::select("SELECT * FROM projects,type_project WHERE projects.type_id=type_project.type_id and project_id='6'");
        $datas0 = DB::select("SELECT * FROM projects,genre_project,type_project WHERE genre_project.genre_name in ('ไอโอที(IoT)') AND projects.status_p in ('0') AND projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id ");
        $datas1 = DB::select("SELECT *, AVG(rate_index) AvgRate 
        FROM projects,genre_project,type_project,rating_p 
        WHERE genre_project.genre_name in ('ไอโอที(IoT)') AND projects.status_p in ('1') 
        AND projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id AND projects.project_id=rating_p.project_id
        GROUP BY rating_p.project_id LIMIT 20");
        // print_r($datas1);
        $chk_genre = DB::select("SELECT * FROM genre_project");
        $chk_category = DB::select("SELECT * FROM category_project");
        $chk_type = DB::select("SELECT * FROM type_project");
        $chk_branch = DB::select("SELECT * FROM branch_project");
        return view('pagewedsum.pageIot', compact('datas1', 'imgaccount', 'adminaccount','chk_genre','chk_category','chk_type','chk_branch'));
    }

    public function popular(){
        session_start();
        $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
        $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
        $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
        $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        $chk_genre = DB::select("SELECT * FROM genre_project");
        $chk_category = DB::select("SELECT * FROM category_project");
        $chk_type = DB::select("SELECT * FROM type_project");
        $chk_branch = DB::select("SELECT * FROM branch_project");
        // $item = DB::select("SELECT * FROM projects,type_project WHERE projects.type_id=type_project.type_id and project_id='6'");
        $datas0 = DB::select("SELECT * FROM projects,genre_project,type_project WHERE genre_project.genre_name in ('ยอดนิยม') AND projects.status_p in ('0') AND projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id ");
        
        $temp = DB::select("SELECT *,COUNT(login_project) AS countview FROM projects,genre_project,type_project,login_log 
        WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id AND projects.project_id=login_log.login_project AND projects.status_p in ('1')
        GROUP BY login_project ORDER BY COUNT(login_project) DESC LIMIT 20");

        // DB::table('temp_star')->truncate();
        compact('temp');
        foreach($temp as $data){
            $ID = $data->login_project;
            $temp_star = DB::select("SELECT *,AVG(rate_index) as AvgRate FROM rating_p WHERE rating_p.project_id = '$ID' GROUP BY rating_p.project_id");
            compact('temp_star');
            foreach($temp_star as $temp_star){
                $idr = $temp_star->rating_id;
                $idp = $temp_star->project_id;
                $ida = $temp_star->AvgRate;
                $chkvalur = DB::select("SELECT id_pro FROM temp_star WHERE id_pro='$idp'");
                // print_r($chkvalur);
                if(isset($chkvalur)?$chkvalur:''){
                    DB::update("UPDATE temp_star SET id_star='$idr',avg_sum='$ida' WHERE id_pro='$idp'");
                    DB::update("UPDATE projects SET fk_star='$idr' WHERE project_id='$idp'");
                    // echo 'มีเเล้ว';
                }else{
                    DB::insert("INSERT INTO temp_star(id_star,id_pro, avg_sum) VALUES ('$idr','$idp','$ida')");
                    DB::update("UPDATE projects SET fk_star='$idr' WHERE project_id='$idp'");
                    // echo 'มีเเล้ว';
                }
            }
            // echo'<pre>';
            // print_r($temp_star);
            // echo'</pre>';
        }

        $datas1 = DB::select("SELECT *,COUNT(login_project) AS countview FROM projects,genre_project,type_project,login_log,temp_star
        WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id AND projects.project_id=login_log.login_project 
        AND  temp_star.id_star=projects.fk_star
        GROUP BY login_project ORDER BY COUNT(login_project) DESC LIMIT 20");
        return view('pagewedsum.pagePopular', compact('datas1', 'imgaccount', 'adminaccount','chk_genre','chk_category','chk_type','chk_branch'));
        // echo'<pre>';
        //     print_r($datas1);
        //     echo'</pre>';


        // compact('data');
        // foreach($data as $data){
        //     $ID = $data->login_project;
        //     $datas1 = DB::select("SELECT *,AVG(rate_index) as AvgRate
        //     FROM projects,genre_project,type_project,login_log,rating_p
        //     WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id AND rating_p.project_id = '$ID'
        //     GROUP BY rating_p.project_id");

        //     $view = DB::select("SELECT COUNT(login_project) AS countview FROM login_log WHERE login_project = '$ID' GROUP BY login_project ");
        //     // echo'<pre>';
        //     // print_r($view);
        //     // echo'</pre>';
            
        // }
        // echo'<pre>';
        //     print_r($datas1);
        //     echo'</pre>';
        
       
        // $datas1 = DB::select("SELECT login_project,COUNT(login_project) AS countview FROM login_log GROUP BY login_project ORDER BY COUNT(login_project) DESC");
                    // echo'<pre>';
                    // print_r($datas1);
                    // echo'</pre>';
                    // compact('datas1');
                    // foreach($datas1 as $datas1){
                    //     $datas = $datas1->project_id;
                    //     $avg = DB::select("SELECT AVG(rate_index) AvgRate FROM rating_p,projects,genre_project,type_project
                    //     WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id AND rating_p.project_id = '$datas'
                    //     GROUP BY rating_p.project_id");
                    //     // echo'<pre>';
                    //     // print_r($avg);
                    //     // echo'</pre>';
                    // }
                    // 
                    // $count = count(DB::select("SELECT *,AVG(rate_index) AvgRate
                    // FROM rating_p,projects,genre_project,type_project
                    // WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id AND projects.project_id=rating_p.project_id
                    // GROUP BY rating_p.project_id
                    // HAVING AvgRate >=3
                    // ORDER BY AvgRate DESC"));
        // for($i=0;$i<$count;$i++){
        //     $dataID = $datas[$i]->project_id;
        //     $datas1 = DB::select("SELECT *,AVG(rate_index) AvgRate
        //             FROM rating_p,projects,genre_project,type_project
        //             WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id AND projects.project_id=rating_p.project_id AND projects.project_id != '$dataID'
        //             GROUP BY rating_p.project_id
        //             HAVING AvgRate >=3
        //             ORDER BY AvgRate DESC");
        //     if($i == $count){
        //         break;
        //     }
            
        // }
        
        // $datas1 = DB::select("SELECT *, AVG(rate_index) AvgRate 
        // FROM projects,genre_project,type_project,rating_p 
        // WHERE genre_project.genre_name in ('ยอดนิยม') AND projects.status_p in ('1') 
        // AND projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id AND projects.project_id=rating_p.project_id
        // GROUP BY rating_p.project_id");
        // print_r($datas1);
        
    }

    public function pursue(){
        session_start();
        $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
        $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
        $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
        $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        // $item = DB::select("SELECT * FROM projects,type_project WHERE projects.type_id=type_project.type_id and project_id='6'");
        $datas0 = DB::select("SELECT * FROM users,projectmdd,genre_project,type_project,category_project WHERE category_project.category_name in ('ติดตาม') AND projectmdd.type_id=type_project.type_id 
        AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projectmdd.user_id=users.U_id AND projectmdd.status_m in ('0') ORDER BY RAND()");
        // $itemA = DB::select("SELECT project_m_id FROM owner_projectmdd,projectmdd,genre_project,type_project,category_project WHERE category_project.category_name in ('ติดตาม') AND projectmdd.type_id=type_project.type_id 
        // AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projectmdd.user_id=owner_projectmdd.owner_m_id  ORDER BY RAND()");
        $datas1 = DB::select("SELECT *,AVG(rate_m_index) AS AvgRate 
        FROM users,projectmdd,genre_project,type_project,category_project,rating_m WHERE category_project.category_name in ('ติดตาม') AND projectmdd.type_id=type_project.type_id 
        AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projectmdd.user_id=users.U_id AND projectmdd.status_m in ('1') AND projectmdd.project_m_id=rating_m.project_m_id 
        GROUP BY rating_m.project_m_id
        ORDER BY RAND()");
        $datasA1 = DB::select("SELECT *,AVG(rate_m_index) AS AvgRate 
        FROM owner_projectmdd,projectmdd,genre_project,type_project,category_project,rating_m WHERE category_project.category_name in ('ติดตาม') AND projectmdd.type_id=type_project.type_id 
        AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.category_id=category_project.category_id AND projectmdd.user_id=owner_projectmdd.owner_m_id AND projectmdd.status_m in ('1') AND projectmdd.project_m_id=rating_m.project_m_id 
        GROUP BY rating_m.project_m_id
        ORDER BY RAND() " );
        // print_r($datasA1);
        // $datas1 = DB::select("SELECT *, AVG(rate_index) AvgRate 
        // FROM projects,genre_project,type_project,rating_p 
        // WHERE genre_project.genre_name in ('ไอโอที(IoT)') AND projects.status_p in ('1') 
        // AND projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id AND projects.project_id=rating_p.project_id
        // GROUP BY rating_p.project_id");
        $chk_genre = DB::select("SELECT * FROM genre_project");
        $chk_category = DB::select("SELECT * FROM category_project");
        $chk_type = DB::select("SELECT * FROM type_project");
        $chk_branch = DB::select("SELECT * FROM branch_project");
        
        return view('pagewedsum.MDD.pursue', compact('datas0', 'datas1', 'datasA1', 'imgaccount', 'adminaccount','chk_genre','chk_category','chk_type','chk_branch'));
    }

    public function advisor_p(){
        // echo '1';
        session_start();
        $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
        $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
        $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
        $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        $chk_genre = DB::select("SELECT * FROM genre_project");
        $chk_category = DB::select("SELECT * FROM category_project");
        $chk_type = DB::select("SELECT * FROM type_project");
        $chk_branch = DB::select("SELECT * FROM branch_project");
        $advisor_p = $_SESSION['advisor_p'];
        if(isset($advisor_p)?$advisor_p:''){
            $adv = DB::select("SELECT *,COUNT(login_project) AS countview FROM projects,login_log,temp_star,genre_project,type_project WHERE projects.advisor_p in ('$advisor_p') 
            AND projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id AND projects.project_id=login_log.login_project 
            AND temp_star.id_star=projects.fk_star GROUP BY login_project");
            // echo '<pre>';
            // print_r($adv);
            // echo '</pre>';
            return view('wed.advisor_p',compact('adv','imgaccount', 'adminaccount','chk_genre','chk_category','chk_type','chk_branch'));
        }else{
            return back();
        }
    }

    function adduser(Request $request)
    {
        $userdata = new User;
        $userdata->name = $request->name;
        $userdata->gender = $request->gender;
        $userdata->province = $request->province;
        $userdata->email = $request->email;
        $userdata->username = $request->username;
        $userdata->password = $request->password;
        $userdata->save();
        return redirect('dataview')->with('success', 'เพิ่มข้อมูลเรียบร้อย');

        // print_r($request->input());
    }

    public function addfileproject(Request $request)
    {
        //
        // echo ("อัพโหลดเรียบร้อย...");
        $path = $request->file('fileimgToUpload')->store('imgupload');
        $pathfile = $request->file('fileToUpload')->store('fileupload');
        return ['path' => $path, $pathfile, 'upload' => 'success'];
    }

    public function genre($genre_id){
        session_start();
        $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
        $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
        $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
        $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        // echo $type_id;
        $chkgenre = DB::select("SELECT *,AVG(rate_index) AS AvgRate FROM projects,genre_project,type_project,rating_p WHERE genre_project.genre_id='$genre_id'
        AND projects.status_p in ('1') AND projects.type_id=type_project.type_id AND projects.genre_id = genre_project.genre_id AND projects.project_id=rating_p.project_id GROUP BY rating_p.project_id ORDER BY RAND()");
        $genre = DB::select("SELECT genre_project.genre_name FROM projects,genre_project WHERE genre_project.genre_id='$genre_id' LIMIT 1");
        compact('genre');
        if(isset($genre)?$genre:''){
            foreach($genre as $genre){
                $genre_name = $genre->genre_name;
            }
            
        }else{
            $genre_name='';
        }
        

        $chk_genre = DB::select("SELECT * FROM genre_project");
        $chk_category = DB::select("SELECT * FROM category_project");
        $chk_type = DB::select("SELECT * FROM type_project");
        $chk_branch = DB::select("SELECT * FROM branch_project");
        // echo'<pre>';
        // print_r($type_name);
        // echo'</pre>';
        return view('wed.genre', compact('chkgenre','genre_name','imgaccount', 'adminaccount','chk_type','chk_category','chk_genre','chk_branch'));

        // $chk_genre = DB::select("SELECT *,AVG(rate_index) AS AvgRate FROM projects,genre_project,type_project WHERE genre_project.genre_id='$genre_id' 
        // AND projects.genre_id = genre_project.genre_id AND projectmdd.status_p in ('1') AND projects.type_id=type_project.type_id");
        // return view('wed.genre', compact('chk_genre', 'imgaccount', 'adminaccount'));
    }

    public function category($category_id){
        session_start();
        $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
        $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
        $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
        $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        // echo $type_id;
        $chkcategory = DB::select("SELECT *,AVG(rate_index) AS AvgRate FROM projects,category_project,type_project,rating_p WHERE category_project.category_id='$category_id'
        AND projects.status_p in ('1') AND projects.type_id=type_project.type_id AND projects.category_id = category_project.category_id AND projects.project_id=rating_p.project_id GROUP BY rating_p.project_id ORDER BY RAND()");
        $category = DB::select("SELECT category_project.category_name FROM projects,category_project WHERE category_project.category_id='$category_id' LIMIT 1");
        compact('category');
        // $category_name = $category[0]->category_name;
        if(isset($category)?$category:''){
            foreach($category as $category){
                $category_name = $category->category_name;
            }
            
        }else{
            $category_name='';
        }
        

        $chk_genre = DB::select("SELECT * FROM genre_project");
        $chk_category = DB::select("SELECT * FROM category_project");
        $chk_type = DB::select("SELECT * FROM type_project");
        $chk_branch = DB::select("SELECT * FROM branch_project");
        // echo'<pre>';
        // print_r($chkcategory);
        // echo'</pre>';
        return view('wed.category', compact('chkcategory','category_name','imgaccount', 'adminaccount','chk_type','chk_category','chk_genre','chk_branch'));

        // $chk_category = DB::select("SELECT *,AVG(rate_index) AS AvgRate FROM projects,category_project,type_project WHERE genre_project.genre_id='$category_id' 
        // AND projects.category_id = category_project.category_id AND projects.status_p in ('1') AND projects.type_id=type_project.type_id");
        // return view('wed.category', compact('chk_category', 'imgaccount', 'adminaccount'));
    }

    public function type($type_id){
        session_start();
        $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
        $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
        $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
        $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        // echo $type_id;
        $chktype = DB::select("SELECT *,AVG(rate_index) AS AvgRate FROM projects,type_project,rating_p WHERE type_project.type_id='$type_id' 
        AND projects.status_p in ('1') AND projects.type_id=type_project.type_id AND projects.project_id=rating_p.project_id GROUP BY rating_p.project_id ORDER BY RAND()");
        $type = DB::select("SELECT type_project.type_name FROM projects,type_project WHERE type_project.type_id='$type_id' AND projects.type_id=type_project.type_id LIMIT 1");
        compact('type');
        // $type_name = $type[0]->type_name;
        if(isset($type)?$type:''){
            foreach($type as $type){
                $type_name = $type->type_name;
            }
            
        }else{
            $type_name='';
        }

        $chk_genre = DB::select("SELECT * FROM genre_project");
        $chk_category = DB::select("SELECT * FROM category_project");
        $chk_type = DB::select("SELECT * FROM type_project");
        $chk_branch = DB::select("SELECT * FROM branch_project");
        // echo'<pre>';
        // print_r($type_name);
        // echo'</pre>';
        return view('wed.type', compact('chktype','type_name','imgaccount', 'adminaccount','chk_type','chk_category','chk_genre','chk_branch'));
    }

    public function listdetil(){
        session_start();
        $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
        $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
        $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
        $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        $chk_genre = DB::select("SELECT * FROM genre_project");
        $chk_category = DB::select("SELECT * FROM category_project");
        $chk_type = DB::select("SELECT * FROM type_project");
        $chk_branch = DB::select("SELECT * FROM branch_project");

        
        if(isset($chkid)?$chkid:''){
            $list = DB::select("SELECT * FROM projects,type_project,users WHERE projects.type_id=type_project.type_id AND projects.user_id='$chkid' AND projects.user_id=users.U_id");
            // echo'<pre>';
            // print_r($list);
            // echo'</pre>';
        }else{
            $null = $_SESSION['non'] = 'null';
        }
        return view('project.listdetail',compact('list','imgaccount', 'adminaccount','chk_type','chk_category','chk_genre','chk_branch'));
    }

    public function readinto(){
        $file = 'คู่มือระบบจัดเก็บโครงงาน วิจัยและวิทยานิพนธ์.pdf';
        $filename = 'คู่มือระบบจัดเก็บโครงงาน วิจัยและวิทยานิพนธ์.pdf';
        // echo $filename;
        header('Content-type: application/html');
        header('Content-Disposition: inline; filename="' . $filename . '"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');
        @readfile($file);
    }
}

