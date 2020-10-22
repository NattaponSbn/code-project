<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Autocomplete_MddController extends Controller
{
    public function searchmdd(Request $request){

        $keyword = $request->input('mddsearch');
        
        if(isset($keyword)?$keyword:''){
            session_start();
            $_SESSION['keyword-s'] = $keyword;
            // print_r($keyword);
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
            $chk_genre = DB::select("SELECT * FROM genre_project");
            $chk_category = DB::select("SELECT * FROM category_project");
            $chk_type = DB::select("SELECT * FROM type_project");
            
            $easysearch = DB::select("SELECT * FROM projectmdd,genre_project
            WHERE projectmdd.genre_id=genre_project.genre_id AND projectmdd.project_m_name LIKE '%$keyword%' 
            OR projectmdd.genre_id=genre_project.genre_id AND projectmdd.keyword_m_project1 LIKE '%$keyword%'
            OR projectmdd.genre_id=genre_project.genre_id AND projectmdd.keyword_m_project2 LIKE '%$keyword%' 
            OR projectmdd.genre_id=genre_project.genre_id AND projectmdd.keyword_m_project3 LIKE '%$keyword%'
            OR projectmdd.genre_id=genre_project.genre_id AND projectmdd.keyword_m_project4 LIKE '%$keyword%'
            ");

            $easysearchID = DB::select("SELECT * FROM projectmdd,genre_project
            WHERE projectmdd.genre_id=genre_project.genre_id AND projectmdd.project_m_name LIKE '%$keyword%' 
            OR projectmdd.genre_id=genre_project.genre_id AND projectmdd.keyword_m_project1 LIKE '%$keyword%'
            OR projectmdd.genre_id=genre_project.genre_id AND projectmdd.keyword_m_project2 LIKE '%$keyword%' 
            OR projectmdd.genre_id=genre_project.genre_id AND projectmdd.keyword_m_project3 LIKE '%$keyword%'
            OR projectmdd.genre_id=genre_project.genre_id AND projectmdd.keyword_m_project4 LIKE '%$keyword%'
            ");
            compact('easysearchID');
            foreach ($easysearch as $key_s) {
                $key_similar1 = $key_s->keyword_m_project1;
                $key_similar2 = $key_s->keyword_m_project2;
                $key_similar3 = $key_s->keyword_m_project3;
                $key_similar4 = $key_s->keyword_m_project4;
                $search_id = $key_s->project_m_id;
                $_SESSION['beforsearchmdd'] = 1;
                
                $similar = DB::select("SELECT *,ABS(projectmdd.project_m_id = '$search_id') AS pID
                FROM projectmdd,genre_project
                WHERE projectmdd.project_m_id != '$search_id' 
                AND projectmdd.genre_id=genre_project.genre_id AND projectmdd.keyword_m_project1 LIKE '%$key_similar1%' 
                OR projectmdd.genre_id=genre_project.genre_id AND projectmdd.keyword_m_project2 LIKE '%$key_similar2%' 
                OR projectmdd.genre_id=genre_project.genre_id AND projectmdd.keyword_m_project3 LIKE '%$key_similar3%' 
                OR projectmdd.genre_id=genre_project.genre_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
    
                
                return view('beforesearchMDD', compact('easysearch','imgaccount','adminaccount','similar','chk_genre','chk_category','chk_type'));
            }
        }else{
            return back();
        }
        
    }

    function detailsearch(Request $request)
    {
       
        
        $keyword = $request->input('detailsearch');
        $genreproject = $request->input('genre_project');
        $categoryproject = $request->input('category_project');
        $typeproject = $request->input('type_project');
        $branch_project = $request->input('branch_project');
        $year_project = $request->input('year_project');

        if(isset($genreproject) =='' & isset($categoryproject) =='' & isset($typeproject) =='' & isset($branch_project) =='' & isset($year_project) ==''){
            $detailsearch = DB::select("SELECT * FROM projectmdd,type_project,genre_project,branch_project,category_project,year_project
                WHERE projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y          
                AND projectmdd.project_name LIKE '%$keyword%' 
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y                 
                AND projectmdd.keyword_m_project1 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y                  
                AND projectmdd.keyword_m_project2 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y                 
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y                
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_m_project1;
                $key_similar2 = $key_s->keyword_m_project2;
                $key_similar3 = $key_s->keyword_m_project4;
                $key_similar4 = $key_s->keyword_m_project4;
                $search_id = $key_s->project_m_id;
                
                $similar = DB::select("SELECT *,ABS(projectmdd.project_m_id = '$search_id') AS pID
                FROM projectmdd,type_project
                WHERE projectmdd.project_m_id != '$search_id' 
                AND projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project1 LIKE '%$key_similar1%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project2 LIKE '%$key_similar2%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar3%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_m_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
            // echo('00000:');
        }
        if(isset($genreproject) =='' & isset($categoryproject) =='' & isset($typeproject) =='' & isset($branch_project) =='' & isset($year_project) !=''){
            // echo('00001:');
            $detailsearch = DB::select("SELECT * FROM projectmdd,type_project,genre_project,branch_project,category_project,year_project
                WHERE projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project          
                AND projectmdd.project_name LIKE '%$keyword%' 
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project                 
                AND projectmdd.keyword_m_project1 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project                 
                AND projectmdd.keyword_m_project2 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project                
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project                
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_m_project1;
                $key_similar2 = $key_s->keyword_m_project2;
                $key_similar3 = $key_s->keyword_m_project4;
                $key_similar4 = $key_s->keyword_m_project4;
                $search_id = $key_s->project_m_id;
                
                $similar = DB::select("SELECT *,ABS(projectmdd.project_m_id = '$search_id') AS pID
                FROM projectmdd,type_project
                WHERE projectmdd.project_m_id != '$search_id' 
                AND projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project1 LIKE '%$key_similar1%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project2 LIKE '%$key_similar2%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar3%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_m_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
            
        }
        if(isset($genreproject) =='' & isset($categoryproject) =='' & isset($typeproject) =='' & isset($branch_project) !='' & isset($year_project) ==''){
            // echo('00010:');
            $detailsearch = DB::select("SELECT * FROM projectmdd,type_project,genre_project,branch_project,category_project,year_project
                WHERE projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.branch_id=$branch_project           
                AND projectmdd.project_name LIKE '%$keyword%' 
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.branch_id=$branch_project                 
                AND projectmdd.keyword_m_project1 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.branch_id=$branch_project                  
                AND projectmdd.keyword_m_project2 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.branch_id=$branch_project                 
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.branch_id=$branch_project               
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_m_project1;
                $key_similar2 = $key_s->keyword_m_project2;
                $key_similar3 = $key_s->keyword_m_project4;
                $key_similar4 = $key_s->keyword_m_project4;
                $search_id = $key_s->project_m_id;
                
                $similar = DB::select("SELECT *,ABS(projectmdd.project_m_id = '$search_id') AS pID
                FROM projectmdd,type_project
                WHERE projectmdd.project_m_id != '$search_id' 
                AND projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project1 LIKE '%$key_similar1%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project2 LIKE '%$key_similar2%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar3%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_m_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
            
        }
        if(isset($genreproject) =='' & isset($categoryproject) =='' & isset($typeproject) =='' & isset($branch_project) !='' & isset($year_project) !=''){
            // echo('00011:');
            $detailsearch = DB::select("SELECT * FROM projectmdd,type_project,genre_project,branch_project,category_project,year_project
                WHERE projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project
                AND projectmdd.branch_id=$branch_project AND projectmdd.project_name LIKE '%$keyword%' 
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project 
                AND projectmdd.branch_id=$branch_project AND projectmdd.keyword_m_project1 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project
                AND projectmdd.branch_id=$branch_project                  
                AND projectmdd.keyword_m_project2 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project
                AND projectmdd.branch_id=$branch_project                 
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project  
                AND projectmdd.branch_id=$branch_project               
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_m_project1;
                $key_similar2 = $key_s->keyword_m_project2;
                $key_similar3 = $key_s->keyword_m_project4;
                $key_similar4 = $key_s->keyword_m_project4;
                $search_id = $key_s->project_m_id;
                
                $similar = DB::select("SELECT *,ABS(projectmdd.project_m_id = '$search_id') AS pID
                FROM projectmdd,type_project
                WHERE projectmdd.project_m_id != '$search_id' 
                AND projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project1 LIKE '%$key_similar1%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project2 LIKE '%$key_similar2%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar3%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_m_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
            
        }
        if(isset($genreproject) =='' & isset($categoryproject) =='' & isset($typeproject) !='' & isset($branch_project) =='' & isset($year_project) ==''){
            // echo('00100:');
            $detailsearch = DB::select("SELECT * FROM projectmdd,type_project,genre_project,branch_project,category_project,year_project
                WHERE projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y 
                AND projectmdd.type_id=$typeproject           
                AND projectmdd.project_name LIKE '%$keyword%' 
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y 
                AND projectmdd.type_id=$typeproject                 
                AND projectmdd.keyword_m_project1 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y 
                AND projectmdd.type_id=$typeproject                  
                AND projectmdd.keyword_m_project2 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y 
                AND projectmdd.type_id=$typeproject                
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y 
                AND projectmdd.type_id=$typeproject               
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_m_project1;
                $key_similar2 = $key_s->keyword_m_project2;
                $key_similar3 = $key_s->keyword_m_project4;
                $key_similar4 = $key_s->keyword_m_project4;
                $search_id = $key_s->project_m_id;
                
                $similar = DB::select("SELECT *,ABS(projectmdd.project_m_id = '$search_id') AS pID
                FROM projectmdd,type_project
                WHERE projectmdd.project_m_id != '$search_id' 
                AND projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project1 LIKE '%$key_similar1%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project2 LIKE '%$key_similar2%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar3%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_m_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
            
        }
        if(isset($genreproject) =='' & isset($categoryproject) =='' & isset($typeproject) !='' & isset($branch_project) =='' & isset($year_project) !=''){
            // echo('00101:');
            $detailsearch = DB::select("SELECT * FROM projectmdd,type_project,genre_project,branch_project,category_project,year_project
                WHERE projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project            
                AND projectmdd.type_id=$typeproject          
                AND projectmdd.project_name LIKE '%$keyword%' 
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project 
                AND projectmdd.type_id=$typeproject                
                AND projectmdd.keyword_m_project1 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project
                AND projectmdd.type_id=$typeproject                  
                AND projectmdd.keyword_m_project2 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project
                AND projectmdd.type_id=$typeproject                
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project  
                AND projectmdd.type_id=$typeproject               
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_m_project1;
                $key_similar2 = $key_s->keyword_m_project2;
                $key_similar3 = $key_s->keyword_m_project4;
                $key_similar4 = $key_s->keyword_m_project4;
                $search_id = $key_s->project_m_id;
                
                $similar = DB::select("SELECT *,ABS(projectmdd.project_m_id = '$search_id') AS pID
                FROM projectmdd,type_project
                WHERE projectmdd.project_m_id != '$search_id' 
                AND projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project1 LIKE '%$key_similar1%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project2 LIKE '%$key_similar2%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar3%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_m_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        if(isset($genreproject) =='' & isset($categoryproject) =='' & isset($typeproject) !='' & isset($branch_project) !='' & isset($year_project) ==''){
            // echo('00110:');
            $detailsearch = DB::select("SELECT * FROM projectmdd,type_project,genre_project,branch_project,category_project,year_project
                WHERE projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y 
                AND projectmdd.type_id=$typeproject AND projectmdd.branch_id=$branch_project           
                AND projectmdd.project_name LIKE '%$keyword%' 
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y 
                AND projectmdd.type_id=$typeproject AND projectmdd.branch_id=$branch_project                 
                AND projectmdd.keyword_m_project1 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y  
                AND projectmdd.type_id=$typeproject AND projectmdd.branch_id=$branch_project                  
                AND projectmdd.keyword_m_project2 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y 
                AND projectmdd.type_id=$typeproject AND projectmdd.branch_id=$branch_project                 
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y 
                AND projectmdd.type_id=$typeproject AND projectmdd.branch_id=$branch_project               
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_m_project1;
                $key_similar2 = $key_s->keyword_m_project2;
                $key_similar3 = $key_s->keyword_m_project4;
                $key_similar4 = $key_s->keyword_m_project4;
                $search_id = $key_s->project_m_id;
                
                $similar = DB::select("SELECT *,ABS(projectmdd.project_m_id = '$search_id') AS pID
                FROM projectmdd,type_project
                WHERE projectmdd.project_m_id != '$search_id' 
                AND projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project1 LIKE '%$key_similar1%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project2 LIKE '%$key_similar2%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar3%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_m_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        if(isset($genreproject) =='' & isset($categoryproject) =='' & isset($typeproject) !='' & isset($branch_project) !='' & isset($year_project) !=''){
            // echo('00111:');
            $detailsearch = DB::select("SELECT * FROM projectmdd,type_project,genre_project,branch_project,category_project,year_project
                WHERE projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project
                AND projectmdd.type_id=$typeproject AND projectmdd.branch_id=$branch_project           
                AND projectmdd.project_name LIKE '%$keyword%' 
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project 
                AND projectmdd.type_id=$typeproject AND projectmdd.branch_id=$branch_project                 
                AND projectmdd.keyword_m_project1 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project
                AND projectmdd.type_id=$typeproject AND projectmdd.branch_id=$branch_project                  
                AND projectmdd.keyword_m_project2 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project
                AND projectmdd.type_id=$typeproject AND projectmdd.branch_id=$branch_project                 
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project  
                AND projectmdd.type_id=$typeproject AND projectmdd.branch_id=$branch_project               
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_m_project1;
                $key_similar2 = $key_s->keyword_m_project2;
                $key_similar3 = $key_s->keyword_m_project4;
                $key_similar4 = $key_s->keyword_m_project4;
                $search_id = $key_s->project_m_id;
                
                $similar = DB::select("SELECT *,ABS(projectmdd.project_m_id = '$search_id') AS pID
                FROM projectmdd,type_project
                WHERE projectmdd.project_m_id != '$search_id' 
                AND projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project1 LIKE '%$key_similar1%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project2 LIKE '%$key_similar2%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar3%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_m_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        if(isset($genreproject) =='' & isset($categoryproject) !='' & isset($typeproject) =='' & isset($branch_project) =='' & isset($year_project) ==''){
            // echo('01000:');
            $detailsearch = DB::select("SELECT * FROM projectmdd,type_project,genre_project,branch_project,category_project,year_project
                WHERE projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.category_id=$categoryproject 
                AND projectmdd.project_name LIKE '%$keyword%' 
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.category_id=$categoryproject 
                AND projectmdd.keyword_m_project1 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.category_id=$categoryproject 
                AND projectmdd.keyword_m_project2 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.category_id=$categoryproject 
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.category_id=$categoryproject 
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_m_project1;
                $key_similar2 = $key_s->keyword_m_project2;
                $key_similar3 = $key_s->keyword_m_project4;
                $key_similar4 = $key_s->keyword_m_project4;
                $search_id = $key_s->project_m_id;
                
                $similar = DB::select("SELECT *,ABS(projectmdd.project_m_id = '$search_id') AS pID
                FROM projectmdd,type_project
                WHERE projectmdd.project_m_id != '$search_id' 
                AND projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project1 LIKE '%$key_similar1%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project2 LIKE '%$key_similar2%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar3%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_m_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        if(isset($genreproject) =='' & isset($categoryproject) !='' & isset($typeproject) =='' & isset($branch_project) =='' & isset($year_project) !=''){
            // echo('01001:');
            $detailsearch = DB::select("SELECT * FROM projectmdd,type_project,genre_project,branch_project,category_project,year_project
                WHERE projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project
                AND projectmdd.category_id=$categoryproject 
                AND projectmdd.project_name LIKE '%$keyword%' 
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project 
                AND projectmdd.category_id=$categoryproject 
                AND projectmdd.keyword_m_project1 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project
                AND projectmdd.category_id=$categoryproject 
                AND projectmdd.keyword_m_project2 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project
                AND projectmdd.category_id=$categoryproject 
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project  
                AND projectmdd.category_id=$categoryproject 
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_m_project1;
                $key_similar2 = $key_s->keyword_m_project2;
                $key_similar3 = $key_s->keyword_m_project4;
                $key_similar4 = $key_s->keyword_m_project4;
                $search_id = $key_s->project_m_id;
                
                $similar = DB::select("SELECT *,ABS(projectmdd.project_m_id = '$search_id') AS pID
                FROM projectmdd,type_project
                WHERE projectmdd.project_m_id != '$search_id' 
                AND projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project1 LIKE '%$key_similar1%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project2 LIKE '%$key_similar2%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar3%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_m_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        if(isset($genreproject) =='' & isset($categoryproject) !='' & isset($typeproject) =='' & isset($branch_project) !='' & isset($year_project) ==''){
            // echo('01010:');
            $detailsearch = DB::select("SELECT * FROM projectmdd,type_project,genre_project,branch_project,category_project,year_project
                WHERE projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.category_id=$categoryproject 
                AND projectmdd.branch_id=$branch_project           
                AND projectmdd.project_name LIKE '%$keyword%' 
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.category_id=$categoryproject 
                AND projectmdd.branch_id=$branch_project                 
                AND projectmdd.keyword_m_project1 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.category_id=$categoryproject 
                AND projectmdd.branch_id=$branch_project                  
                AND projectmdd.keyword_m_project2 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.category_id=$categoryproject 
                AND projectmdd.branch_id=$branch_project                 
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.category_id=$categoryproject 
                AND projectmdd.branch_id=$branch_project               
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_m_project1;
                $key_similar2 = $key_s->keyword_m_project2;
                $key_similar3 = $key_s->keyword_m_project4;
                $key_similar4 = $key_s->keyword_m_project4;
                $search_id = $key_s->project_m_id;
                
                $similar = DB::select("SELECT *,ABS(projectmdd.project_m_id = '$search_id') AS pID
                FROM projectmdd,type_project
                WHERE projectmdd.project_m_id != '$search_id' 
                AND projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project1 LIKE '%$key_similar1%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project2 LIKE '%$key_similar2%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar3%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_m_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        if(isset($genreproject) =='' & isset($categoryproject) !='' & isset($typeproject) =='' & isset($branch_project) !='' & isset($year_project) !=''){
            // echo('01011:');
            $detailsearch = DB::select("SELECT * FROM projectmdd,type_project,genre_project,branch_project,category_project,year_project
                WHERE projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project
                AND projectmdd.category_id=$categoryproject 
                AND projectmdd.branch_id=$branch_project           
                AND projectmdd.project_name LIKE '%$keyword%' 
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project 
                AND projectmdd.category_id=$categoryproject 
                AND projectmdd.branch_id=$branch_project                 
                AND projectmdd.keyword_m_project1 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project
                AND projectmdd.category_id=$categoryproject 
                AND projectmdd.branch_id=$branch_project                  
                AND projectmdd.keyword_m_project2 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project
                AND projectmdd.category_id=$categoryproject 
                AND projectmdd.branch_id=$branch_project                 
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project  
                AND projectmdd.category_id=$categoryproject 
                AND projectmdd.branch_id=$branch_project               
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_m_project1;
                $key_similar2 = $key_s->keyword_m_project2;
                $key_similar3 = $key_s->keyword_m_project4;
                $key_similar4 = $key_s->keyword_m_project4;
                $search_id = $key_s->project_m_id;
                
                $similar = DB::select("SELECT *,ABS(projectmdd.project_m_id = '$search_id') AS pID
                FROM projectmdd,type_project
                WHERE projectmdd.project_m_id != '$search_id' 
                AND projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project1 LIKE '%$key_similar1%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project2 LIKE '%$key_similar2%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar3%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_m_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        if(isset($genreproject) =='' & isset($categoryproject) !='' & isset($typeproject) !='' & isset($branch_project) =='' & isset($year_project) ==''){
            // echo('01100:');
            $detailsearch = DB::select("SELECT * FROM projectmdd,type_project,genre_project,branch_project,category_project,year_project
                WHERE projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.category_id=$categoryproject 
                AND projectmdd.type_id=$typeproject         
                AND projectmdd.project_name LIKE '%$keyword%' 
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.category_id=$categoryproject 
                AND projectmdd.type_id=$typeproject                 
                AND projectmdd.keyword_m_project1 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.category_id=$categoryproject 
                AND projectmdd.type_id=$typeproject                  
                AND projectmdd.keyword_m_project2 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.category_id=$categoryproject 
                AND projectmdd.type_id=$typeproject                 
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.category_id=$categoryproject 
                AND projectmdd.type_id=$typeproject               
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_m_project1;
                $key_similar2 = $key_s->keyword_m_project2;
                $key_similar3 = $key_s->keyword_m_project4;
                $key_similar4 = $key_s->keyword_m_project4;
                $search_id = $key_s->project_m_id;
                
                $similar = DB::select("SELECT *,ABS(projectmdd.project_m_id = '$search_id') AS pID
                FROM projectmdd,type_project
                WHERE projectmdd.project_m_id != '$search_id' 
                AND projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project1 LIKE '%$key_similar1%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project2 LIKE '%$key_similar2%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar3%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_m_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        if(isset($genreproject) =='' & isset($categoryproject) !='' & isset($typeproject) !='' & isset($branch_project) =='' & isset($year_project) !=''){
            // echo('01101:');
            $detailsearch = DB::select("SELECT * FROM projectmdd,type_project,genre_project,branch_project,category_project,year_project
                WHERE projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project
                AND projectmdd.category_id=$categoryproject 
                AND projectmdd.type_id=$typeproject           
                AND projectmdd.project_name LIKE '%$keyword%' 
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project 
                AND projectmdd.category_id=$categoryproject 
                AND projectmdd.type_id=$typeproject                 
                AND projectmdd.keyword_m_project1 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project
                AND projectmdd.category_id=$categoryproject 
                AND projectmdd.type_id=$typeproject                 
                AND projectmdd.keyword_m_project2 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project
                AND projectmdd.category_id=$categoryproject 
                AND projectmdd.type_id=$typeproject                 
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project  
                AND projectmdd.category_id=$categoryproject 
                AND projectmdd.type_id=$typeproject              
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_m_project1;
                $key_similar2 = $key_s->keyword_m_project2;
                $key_similar3 = $key_s->keyword_m_project4;
                $key_similar4 = $key_s->keyword_m_project4;
                $search_id = $key_s->project_m_id;
                
                $similar = DB::select("SELECT *,ABS(projectmdd.project_m_id = '$search_id') AS pID
                FROM projectmdd,type_project
                WHERE projectmdd.project_m_id != '$search_id' 
                AND projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project1 LIKE '%$key_similar1%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project2 LIKE '%$key_similar2%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar3%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_m_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        if(isset($genreproject) =='' & isset($categoryproject) !='' & isset($typeproject) !='' & isset($branch_project) !='' & isset($year_project) ==''){
            // echo('01110:');
            $detailsearch = DB::select("SELECT * FROM projectmdd,type_project,genre_project,branch_project,category_project,year_project
                WHERE projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.category_id=$categoryproject 
                AND projectmdd.type_id=$typeproject AND projectmdd.branch_id=$branch_project           
                AND projectmdd.project_name LIKE '%$keyword%' 
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.category_id=$categoryproject 
                AND projectmdd.type_id=$typeproject AND projectmdd.branch_id=$branch_project                 
                AND projectmdd.keyword_m_project1 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.category_id=$categoryproject 
                AND projectmdd.type_id=$typeproject AND projectmdd.branch_id=$branch_project                  
                AND projectmdd.keyword_m_project2 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.category_id=$categoryproject 
                AND projectmdd.type_id=$typeproject AND projectmdd.branch_id=$branch_project                 
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.category_id=$categoryproject 
                AND projectmdd.type_id=$typeproject AND projectmdd.branch_id=$branch_project               
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_m_project1;
                $key_similar2 = $key_s->keyword_m_project2;
                $key_similar3 = $key_s->keyword_m_project4;
                $key_similar4 = $key_s->keyword_m_project4;
                $search_id = $key_s->project_m_id;
                
                $similar = DB::select("SELECT *,ABS(projectmdd.project_m_id = '$search_id') AS pID
                FROM projectmdd,type_project
                WHERE projectmdd.project_m_id != '$search_id' 
                AND projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project1 LIKE '%$key_similar1%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project2 LIKE '%$key_similar2%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar3%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_m_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        if(isset($genreproject) =='' & isset($categoryproject) !='' & isset($typeproject) !='' & isset($branch_project) !='' & isset($year_project) !=''){
            // echo('01111:');
            $detailsearch = DB::select("SELECT * FROM projectmdd,type_project,genre_project,branch_project,category_project,year_project
                WHERE projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project
                AND projectmdd.category_id=$categoryproject 
                AND projectmdd.type_id=$typeproject AND projectmdd.branch_id=$branch_project           
                AND projectmdd.project_name LIKE '%$keyword%' 
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project 
                AND projectmdd.category_id=$categoryproject 
                AND projectmdd.type_id=$typeproject AND projectmdd.branch_id=$branch_project                 
                AND projectmdd.keyword_m_project1 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project
                AND projectmdd.category_id=$categoryproject 
                AND projectmdd.type_id=$typeproject AND projectmdd.branch_id=$branch_project                  
                AND projectmdd.keyword_m_project2 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project
                AND projectmdd.category_id=$categoryproject 
                AND projectmdd.type_id=$typeproject AND projectmdd.branch_id=$branch_project                 
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project  
                AND projectmdd.category_id=$categoryproject 
                AND projectmdd.type_id=$typeproject AND projectmdd.branch_id=$branch_project               
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_m_project1;
                $key_similar2 = $key_s->keyword_m_project2;
                $key_similar3 = $key_s->keyword_m_project4;
                $key_similar4 = $key_s->keyword_m_project4;
                $search_id = $key_s->project_m_id;
                
                $similar = DB::select("SELECT *,ABS(projectmdd.project_m_id = '$search_id') AS pID
                FROM projectmdd,type_project
                WHERE projectmdd.project_m_id != '$search_id' 
                AND projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project1 LIKE '%$key_similar1%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project2 LIKE '%$key_similar2%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar3%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_m_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        if(isset($genreproject) !='' & isset($categoryproject) =='' & isset($typeproject) =='' & isset($branch_project) =='' & isset($year_project) ==''){
            // echo('10000:');
            $detailsearch = DB::select("SELECT * FROM projectmdd,type_project,genre_project,branch_project,category_project,year_project
                WHERE projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y 
                AND projectmdd.genre_id=$genreproject           
                AND projectmdd.project_name LIKE '%$keyword%' 
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y 
                AND projectmdd.genre_id=$genreproject                
                AND projectmdd.keyword_m_project1 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y 
                AND projectmdd.genre_id=$genreproject                  
                AND projectmdd.keyword_m_project2 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y 
                AND projectmdd.genre_id=$genreproject                 
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y  
                AND projectmdd.genre_id=$genreproject               
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_m_project1;
                $key_similar2 = $key_s->keyword_m_project2;
                $key_similar3 = $key_s->keyword_m_project4;
                $key_similar4 = $key_s->keyword_m_project4;
                $search_id = $key_s->project_m_id;
                
                $similar = DB::select("SELECT *,ABS(projectmdd.project_m_id = '$search_id') AS pID
                FROM projectmdd,type_project
                WHERE projectmdd.project_m_id != '$search_id' 
                AND projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project1 LIKE '%$key_similar1%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project2 LIKE '%$key_similar2%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar3%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_m_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        if(isset($genreproject) !='' & isset($categoryproject) =='' & isset($typeproject) =='' & isset($branch_project) =='' & isset($year_project) !=''){
            // echo('10001:');
            $detailsearch = DB::select("SELECT * FROM projectmdd,type_project,genre_project,branch_project,category_project,year_project
                WHERE projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project
                AND projectmdd.genre_id=$genreproject          
                AND projectmdd.project_name LIKE '%$keyword%' 
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project 
                AND projectmdd.genre_id=$genreproject                 
                AND projectmdd.keyword_m_project1 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project
                AND projectmdd.genre_id=$genreproject                   
                AND projectmdd.keyword_m_project2 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project
                AND projectmdd.genre_id=$genreproject                 
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project  
                AND projectmdd.genre_id=$genreproject               
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_m_project1;
                $key_similar2 = $key_s->keyword_m_project2;
                $key_similar3 = $key_s->keyword_m_project4;
                $key_similar4 = $key_s->keyword_m_project4;
                $search_id = $key_s->project_m_id;
                
                $similar = DB::select("SELECT *,ABS(projectmdd.project_m_id = '$search_id') AS pID
                FROM projectmdd,type_project
                WHERE projectmdd.project_m_id != '$search_id' 
                AND projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project1 LIKE '%$key_similar1%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project2 LIKE '%$key_similar2%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar3%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_m_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        if(isset($genreproject) !='' & isset($categoryproject) =='' & isset($typeproject) =='' & isset($branch_project) !='' & isset($year_project) ==''){
            // echo('10010:');
            $detailsearch = DB::select("SELECT * FROM projectmdd,type_project,genre_project,branch_project,category_project,year_project
                WHERE projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y 
                AND projectmdd.genre_id=$genreproject AND projectmdd.branch_id=$branch_project           
                AND projectmdd.project_name LIKE '%$keyword%' 
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y  
                AND projectmdd.genre_id=$genreproject AND projectmdd.branch_id=$branch_project                 
                AND projectmdd.keyword_m_project1 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y 
                AND projectmdd.genre_id=$genreproject AND projectmdd.branch_id=$branch_project                  
                AND projectmdd.keyword_m_project2 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y 
                AND projectmdd.genre_id=$genreproject AND projectmdd.branch_id=$branch_project                 
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y   
                AND projectmdd.genre_id=$genreproject AND projectmdd.branch_id=$branch_project               
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_m_project1;
                $key_similar2 = $key_s->keyword_m_project2;
                $key_similar3 = $key_s->keyword_m_project4;
                $key_similar4 = $key_s->keyword_m_project4;
                $search_id = $key_s->project_m_id;
                
                $similar = DB::select("SELECT *,ABS(projectmdd.project_m_id = '$search_id') AS pID
                FROM projectmdd,type_project
                WHERE projectmdd.project_m_id != '$search_id' 
                AND projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project1 LIKE '%$key_similar1%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project2 LIKE '%$key_similar2%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar3%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_m_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        if(isset($genreproject) !='' & isset($categoryproject) =='' & isset($typeproject) =='' & isset($branch_project) !='' & isset($year_project) !=''){
            // echo('10011:');
            $detailsearch = DB::select("SELECT * FROM projectmdd,type_project,genre_project,branch_project,category_project,year_project
                WHERE projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project
                AND projectmdd.genre_id=$genreproject AND projectmdd.branch_id=$branch_project           
                AND projectmdd.project_name LIKE '%$keyword%' 
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project 
                AND projectmdd.genre_id=$genreproject AND projectmdd.branch_id=$branch_project                 
                AND projectmdd.keyword_m_project1 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project
                AND projectmdd.genre_id=$genreproject AND projectmdd.branch_id=$branch_project                  
                AND projectmdd.keyword_m_project2 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project
                AND projectmdd.genre_id=$genreproject AND projectmdd.branch_id=$branch_project                 
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project  
                AND projectmdd.genre_id=$genreproject AND projectmdd.branch_id=$branch_project               
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_m_project1;
                $key_similar2 = $key_s->keyword_m_project2;
                $key_similar3 = $key_s->keyword_m_project4;
                $key_similar4 = $key_s->keyword_m_project4;
                $search_id = $key_s->project_m_id;
                
                $similar = DB::select("SELECT *,ABS(projectmdd.project_m_id = '$search_id') AS pID
                FROM projectmdd,type_project
                WHERE projectmdd.project_m_id != '$search_id' 
                AND projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project1 LIKE '%$key_similar1%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project2 LIKE '%$key_similar2%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar3%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_m_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        if(isset($genreproject) !='' & isset($categoryproject) =='' & isset($typeproject) !='' & isset($branch_project) =='' & isset($year_project) ==''){
            // echo('10100:');
            $detailsearch = DB::select("SELECT * FROM projectmdd,type_project,genre_project,branch_project,category_project,year_project
                WHERE projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y 
                AND projectmdd.genre_id=$genreproject 
                AND projectmdd.type_id=$typeproject           
                AND projectmdd.project_name LIKE '%$keyword%' 
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y 
                AND projectmdd.genre_id=$genreproject 
                AND projectmdd.type_id=$typeproject                
                AND projectmdd.keyword_m_project1 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y 
                AND projectmdd.genre_id=$genreproject 
                AND projectmdd.type_id=$typeproject                 
                AND projectmdd.keyword_m_project2 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y 
                AND projectmdd.genre_id=$genreproject 
                AND projectmdd.type_id=$typeproject                
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y  
                AND projectmdd.genre_id=$genreproject 
                AND projectmdd.type_id=$typeproject               
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_m_project1;
                $key_similar2 = $key_s->keyword_m_project2;
                $key_similar3 = $key_s->keyword_m_project4;
                $key_similar4 = $key_s->keyword_m_project4;
                $search_id = $key_s->project_m_id;
                
                $similar = DB::select("SELECT *,ABS(projectmdd.project_m_id = '$search_id') AS pID
                FROM projectmdd,type_project
                WHERE projectmdd.project_m_id != '$search_id' 
                AND projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project1 LIKE '%$key_similar1%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project2 LIKE '%$key_similar2%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar3%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_m_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        if(isset($genreproject) !='' & isset($categoryproject) =='' & isset($typeproject) !='' & isset($branch_project) =='' & isset($year_project) !=''){
            // echo('10101:');
            $detailsearch = DB::select("SELECT * FROM projectmdd,type_project,genre_project,branch_project,category_project,year_project
                WHERE projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project
                AND projectmdd.genre_id=$genreproject 
                AND projectmdd.type_id=$typeproject           
                AND projectmdd.project_name LIKE '%$keyword%' 
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project 
                AND projectmdd.genre_id=$genreproject  
                AND projectmdd.type_id=$typeproject                 
                AND projectmdd.keyword_m_project1 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project
                AND projectmdd.genre_id=$genreproject 
                AND projectmdd.type_id=$typeproject                  
                AND projectmdd.keyword_m_project2 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project
                AND projectmdd.genre_id=$genreproject 
                AND projectmdd.type_id=$typeproject                  
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project  
                AND projectmdd.genre_id=$genreproject 
                AND projectmdd.type_id=$typeproject               
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_m_project1;
                $key_similar2 = $key_s->keyword_m_project2;
                $key_similar3 = $key_s->keyword_m_project4;
                $key_similar4 = $key_s->keyword_m_project4;
                $search_id = $key_s->project_m_id;
                
                $similar = DB::select("SELECT *,ABS(projectmdd.project_m_id = '$search_id') AS pID
                FROM projectmdd,type_project
                WHERE projectmdd.project_m_id != '$search_id' 
                AND projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project1 LIKE '%$key_similar1%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project2 LIKE '%$key_similar2%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar3%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_m_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        if(isset($genreproject) !='' & isset($categoryproject) =='' & isset($typeproject) !='' & isset($branch_project) !='' & isset($year_project) ==''){
            // echo('10110:');
            $detailsearch = DB::select("SELECT * FROM projectmdd,type_project,genre_project,branch_project,category_project,year_project
                WHERE projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project
                AND projectmdd.genre_id=$genreproject AND projectmdd.category_id=$categoryproject 
                AND projectmdd.type_id=$typeproject AND projectmdd.branch_id=$branch_project           
                AND projectmdd.project_name LIKE '%$keyword%' 
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project 
                AND projectmdd.genre_id=$genreproject AND projectmdd.category_id=$categoryproject 
                AND projectmdd.type_id=$typeproject AND projectmdd.branch_id=$branch_project                 
                AND projectmdd.keyword_m_project1 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project
                AND projectmdd.genre_id=$genreproject AND projectmdd.category_id=$categoryproject 
                AND projectmdd.type_id=$typeproject AND projectmdd.branch_id=$branch_project                  
                AND projectmdd.keyword_m_project2 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project
                AND projectmdd.genre_id=$genreproject AND projectmdd.category_id=$categoryproject 
                AND projectmdd.type_id=$typeproject AND projectmdd.branch_id=$branch_project                 
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project  
                AND projectmdd.genre_id=$genreproject AND projectmdd.category_id=$categoryproject 
                AND projectmdd.type_id=$typeproject AND projectmdd.branch_id=$branch_project               
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_m_project1;
                $key_similar2 = $key_s->keyword_m_project2;
                $key_similar3 = $key_s->keyword_m_project4;
                $key_similar4 = $key_s->keyword_m_project4;
                $search_id = $key_s->project_m_id;
                
                $similar = DB::select("SELECT *,ABS(projectmdd.project_m_id = '$search_id') AS pID
                FROM projectmdd,type_project
                WHERE projectmdd.project_m_id != '$search_id' 
                AND projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project1 LIKE '%$key_similar1%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project2 LIKE '%$key_similar2%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar3%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_m_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        if(isset($genreproject) !='' & isset($categoryproject) =='' & isset($typeproject) !='' & isset($branch_project) !='' & isset($year_project) !=''){
            // echo('10111:');
            $detailsearch = DB::select("SELECT * FROM projectmdd,type_project,genre_project,branch_project,category_project,year_project
                WHERE projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project
                AND projectmdd.genre_id=$genreproject 
                AND projectmdd.type_id=$typeproject AND projectmdd.branch_id=$branch_project           
                AND projectmdd.project_name LIKE '%$keyword%' 
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project 
                AND projectmdd.genre_id=$genreproject 
                AND projectmdd.type_id=$typeproject AND projectmdd.branch_id=$branch_project                 
                AND projectmdd.keyword_m_project1 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project
                AND projectmdd.genre_id=$genreproject 
                AND projectmdd.type_id=$typeproject AND projectmdd.branch_id=$branch_project                  
                AND projectmdd.keyword_m_project2 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project
                AND projectmdd.genre_id=$genreproject  
                AND projectmdd.type_id=$typeproject AND projectmdd.branch_id=$branch_project                 
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project  
                AND projectmdd.genre_id=$genreproject  
                AND projectmdd.type_id=$typeproject AND projectmdd.branch_id=$branch_project               
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_m_project1;
                $key_similar2 = $key_s->keyword_m_project2;
                $key_similar3 = $key_s->keyword_m_project4;
                $key_similar4 = $key_s->keyword_m_project4;
                $search_id = $key_s->project_m_id;
                
                $similar = DB::select("SELECT *,ABS(projectmdd.project_m_id = '$search_id') AS pID
                FROM projectmdd,type_project
                WHERE projectmdd.project_m_id != '$search_id' 
                AND projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project1 LIKE '%$key_similar1%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project2 LIKE '%$key_similar2%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar3%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_m_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        if(isset($genreproject) !='' & isset($categoryproject) !='' & isset($typeproject) =='' & isset($branch_project) =='' & isset($year_project) ==''){
            // echo('11000:');
            $detailsearch = DB::select("SELECT * FROM projectmdd,type_project,genre_project,branch_project,category_project,year_project
                WHERE projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y 
                AND projectmdd.genre_id=$genreproject AND projectmdd.category_id=$categoryproject 
                AND projectmdd.project_name LIKE '%$keyword%' 
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y 
                AND projectmdd.genre_id=$genreproject AND projectmdd.category_id=$categoryproject 
                AND projectmdd.keyword_m_project1 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y 
                AND projectmdd.genre_id=$genreproject AND projectmdd.category_id=$categoryproject 
                AND projectmdd.keyword_m_project2 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y 
                AND projectmdd.genre_id=$genreproject AND projectmdd.category_id=$categoryproject 
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y  
                AND projectmdd.genre_id=$genreproject AND projectmdd.category_id=$categoryproject 
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_m_project1;
                $key_similar2 = $key_s->keyword_m_project2;
                $key_similar3 = $key_s->keyword_m_project4;
                $key_similar4 = $key_s->keyword_m_project4;
                $search_id = $key_s->project_m_id;
                
                $similar = DB::select("SELECT *,ABS(projectmdd.project_m_id = '$search_id') AS pID
                FROM projectmdd,type_project
                WHERE projectmdd.project_m_id != '$search_id' 
                AND projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project1 LIKE '%$key_similar1%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project2 LIKE '%$key_similar2%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar3%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_m_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        if(isset($genreproject) !='' & isset($categoryproject) !='' & isset($typeproject) =='' & isset($branch_project) =='' & isset($year_project) !=''){
            // echo('11001:');
            $detailsearch = DB::select("SELECT * FROM projectmdd,type_project,genre_project,branch_project,category_project,year_project
                WHERE projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project
                AND projectmdd.genre_id=$genreproject AND projectmdd.category_id=$categoryproject 
                AND projectmdd.project_name LIKE '%$keyword%' 
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project 
                AND projectmdd.genre_id=$genreproject AND projectmdd.category_id=$categoryproject 
                AND projectmdd.keyword_m_project1 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project
                AND projectmdd.genre_id=$genreproject AND projectmdd.category_id=$categoryproject 
                AND projectmdd.keyword_m_project2 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project
                AND projectmdd.genre_id=$genreproject AND projectmdd.category_id=$categoryproject 
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project  
                AND projectmdd.genre_id=$genreproject AND projectmdd.category_id=$categoryproject 
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_m_project1;
                $key_similar2 = $key_s->keyword_m_project2;
                $key_similar3 = $key_s->keyword_m_project4;
                $key_similar4 = $key_s->keyword_m_project4;
                $search_id = $key_s->project_m_id;
                
                $similar = DB::select("SELECT *,ABS(projectmdd.project_m_id = '$search_id') AS pID
                FROM projectmdd,type_project
                WHERE projectmdd.project_m_id != '$search_id' 
                AND projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project1 LIKE '%$key_similar1%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project2 LIKE '%$key_similar2%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar3%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_m_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        if(isset($genreproject) !='' & isset($categoryproject) !='' & isset($typeproject) =='' & isset($branch_project) !='' & isset($year_project) ==''){
            // echo('11010:');
            $detailsearch = DB::select("SELECT * FROM projectmdd,type_project,genre_project,branch_project,category_project,year_project
                WHERE projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y 
                AND projectmdd.genre_id=$genreproject AND projectmdd.category_id=$categoryproject 
                AND projectmdd.branch_id=$branch_project           
                AND projectmdd.project_name LIKE '%$keyword%' 
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y  
                AND projectmdd.genre_id=$genreproject AND projectmdd.category_id=$categoryproject 
                AND projectmdd.branch_id=$branch_project                 
                AND projectmdd.keyword_m_project1 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y 
                AND projectmdd.genre_id=$genreproject AND projectmdd.category_id=$categoryproject 
                AND projectmdd.branch_id=$branch_project                  
                AND projectmdd.keyword_m_project2 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y 
                AND projectmdd.genre_id=$genreproject AND projectmdd.category_id=$categoryproject 
                AND projectmdd.branch_id=$branch_project                 
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y 
                AND projectmdd.genre_id=$genreproject AND projectmdd.category_id=$categoryproject 
                AND projectmdd.branch_id=$branch_project               
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_m_project1;
                $key_similar2 = $key_s->keyword_m_project2;
                $key_similar3 = $key_s->keyword_m_project4;
                $key_similar4 = $key_s->keyword_m_project4;
                $search_id = $key_s->project_m_id;
                
                $similar = DB::select("SELECT *,ABS(projectmdd.project_m_id = '$search_id') AS pID
                FROM projectmdd,type_project
                WHERE projectmdd.project_m_id != '$search_id' 
                AND projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project1 LIKE '%$key_similar1%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project2 LIKE '%$key_similar2%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar3%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_m_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        if(isset($genreproject) !='' & isset($categoryproject) !='' & isset($typeproject) =='' & isset($branch_project) !='' & isset($year_project) !=''){
            // echo('11011:');
            $detailsearch = DB::select("SELECT * FROM projectmdd,type_project,genre_project,branch_project,category_project,year_project
                WHERE projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project
                AND projectmdd.genre_id=$genreproject AND projectmdd.category_id=$categoryproject 
                AND projectmdd.branch_id=$branch_project           
                AND projectmdd.project_name LIKE '%$keyword%' 
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project 
                AND projectmdd.genre_id=$genreproject AND projectmdd.category_id=$categoryproject 
                AND projectmdd.branch_id=$branch_project                 
                AND projectmdd.keyword_m_project1 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project
                AND projectmdd.genre_id=$genreproject AND projectmdd.category_id=$categoryproject 
                AND projectmdd.branch_id=$branch_project                  
                AND projectmdd.keyword_m_project2 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project
                AND projectmdd.genre_id=$genreproject AND projectmdd.category_id=$categoryproject 
                AND projectmdd.branch_id=$branch_project                 
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project  
                AND projectmdd.genre_id=$genreproject AND projectmdd.category_id=$categoryproject 
                AND projectmdd.branch_id=$branch_project               
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_m_project1;
                $key_similar2 = $key_s->keyword_m_project2;
                $key_similar3 = $key_s->keyword_m_project4;
                $key_similar4 = $key_s->keyword_m_project4;
                $search_id = $key_s->project_m_id;
                
                $similar = DB::select("SELECT *,ABS(projectmdd.project_m_id = '$search_id') AS pID
                FROM projectmdd,type_project
                WHERE projectmdd.project_m_id != '$search_id' 
                AND projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project1 LIKE '%$key_similar1%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project2 LIKE '%$key_similar2%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar3%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_m_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        if(isset($genreproject) !='' & isset($categoryproject) !='' & isset($typeproject) !='' & isset($branch_project) =='' & isset($year_project) ==''){
            // echo('11100:');
            $detailsearch = DB::select("SELECT * FROM projectmdd,type_project,genre_project,branch_project,category_project,year_project
                WHERE projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y 
                AND projectmdd.genre_id=$genreproject AND projectmdd.category_id=$categoryproject 
                AND projectmdd.type_id=$typeproject          
                AND projectmdd.project_name LIKE '%$keyword%' 
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y 
                AND projectmdd.genre_id=$genreproject AND projectmdd.category_id=$categoryproject 
                AND projectmdd.type_id=$typeproject                 
                AND projectmdd.keyword_m_project1 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y 
                AND projectmdd.genre_id=$genreproject AND projectmdd.category_id=$categoryproject 
                AND projectmdd.type_id=$typeproject                  
                AND projectmdd.keyword_m_project2 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y 
                AND projectmdd.genre_id=$genreproject AND projectmdd.category_id=$categoryproject 
                AND projectmdd.type_id=$typeproject                 
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y 
                AND projectmdd.genre_id=$genreproject AND projectmdd.category_id=$categoryproject 
                AND projectmdd.type_id=$typeproject               
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_m_project1;
                $key_similar2 = $key_s->keyword_m_project2;
                $key_similar3 = $key_s->keyword_m_project4;
                $key_similar4 = $key_s->keyword_m_project4;
                $search_id = $key_s->project_m_id;
                
                $similar = DB::select("SELECT *,ABS(projectmdd.project_m_id = '$search_id') AS pID
                FROM projectmdd,type_project
                WHERE projectmdd.project_m_id != '$search_id' 
                AND projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project1 LIKE '%$key_similar1%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project2 LIKE '%$key_similar2%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar3%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_m_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        if(isset($genreproject) !='' & isset($categoryproject) !='' & isset($typeproject) !='' & isset($branch_project) =='' & isset($year_project) !=''){
            // echo('11101:');
            $detailsearch = DB::select("SELECT * FROM projectmdd,type_project,genre_project,branch_project,category_project,year_project
                WHERE projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project
                AND projectmdd.genre_id=$genreproject AND projectmdd.category_id=$categoryproject 
                AND projectmdd.type_id=$typeproject           
                AND projectmdd.project_name LIKE '%$keyword%' 
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project 
                AND projectmdd.genre_id=$genreproject AND projectmdd.category_id=$categoryproject 
                AND projectmdd.type_id=$typeproject                  
                AND projectmdd.keyword_m_project1 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project
                AND projectmdd.genre_id=$genreproject AND projectmdd.category_id=$categoryproject 
                AND projectmdd.type_id=$typeproject                  
                AND projectmdd.keyword_m_project2 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project
                AND projectmdd.genre_id=$genreproject AND projectmdd.category_id=$categoryproject 
                AND projectmdd.type_id=$typeproject                
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project  
                AND projectmdd.genre_id=$genreproject AND projectmdd.category_id=$categoryproject 
                AND projectmdd.type_id=$typeproject               
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_m_project1;
                $key_similar2 = $key_s->keyword_m_project2;
                $key_similar3 = $key_s->keyword_m_project4;
                $key_similar4 = $key_s->keyword_m_project4;
                $search_id = $key_s->project_m_id;
                
                $similar = DB::select("SELECT *,ABS(projectmdd.project_m_id = '$search_id') AS pID,AVG(rate_index) AS AvgRate
                FROM projectmdd,type_project,rating_p
                WHERE projectmdd.project_m_id != '$search_id' 
                AND projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project1 LIKE '%$key_similar1%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project2 LIKE '%$key_similar2%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar3%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar4%' 
                GROUP BY rating_p.project_m_id
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_m_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        if(isset($genreproject) !='' & isset($categoryproject) !='' & isset($typeproject) !='' & isset($branch_project) !='' & isset($year_project) ==''){
            // echo('11110:');
            $detailsearch = DB::select("SELECT * FROM projectmdd,type_project,genre_project,branch_project,category_project,year_project
                WHERE projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project
                AND projectmdd.genre_id=$genreproject AND projectmdd.category_id=$categoryproject 
                AND projectmdd.type_id=$typeproject AND projectmdd.branch_id=$branch_project           
                AND projectmdd.project_name LIKE '%$keyword%' 
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y 
                AND projectmdd.genre_id=$genreproject AND projectmdd.category_id=$categoryproject 
                AND projectmdd.type_id=$typeproject AND projectmdd.branch_id=$branch_project                 
                AND projectmdd.keyword_m_project1 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y 
                AND projectmdd.genre_id=$genreproject AND projectmdd.category_id=$categoryproject 
                AND projectmdd.type_id=$typeproject AND projectmdd.branch_id=$branch_project                  
                AND projectmdd.keyword_m_project2 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y 
                AND projectmdd.genre_id=$genreproject AND projectmdd.category_id=$categoryproject 
                AND projectmdd.type_id=$typeproject AND projectmdd.branch_id=$branch_project                 
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y  
                AND projectmdd.genre_id=$genreproject AND projectmdd.category_id=$categoryproject 
                AND projectmdd.type_id=$typeproject AND projectmdd.branch_id=$branch_project               
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_m_project1;
                $key_similar2 = $key_s->keyword_m_project2;
                $key_similar3 = $key_s->keyword_m_project4;
                $key_similar4 = $key_s->keyword_m_project4;
                $search_id = $key_s->project_m_id;
                
                $similar = DB::select("SELECT *,ABS(projectmdd.project_m_id = '$search_id') AS pID
                FROM projectmdd,type_project
                WHERE projectmdd.project_m_id != '$search_id' 
                AND projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project1 LIKE '%$key_similar1%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project2 LIKE '%$key_similar2%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar3%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_m_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        if(isset($genreproject) !='' & isset($categoryproject) !='' & isset($typeproject) !='' & isset($branch_project) !='' & isset($year_project) !=''){
            // echo('11111');
            $detailsearch = DB::select("SELECT * FROM projectmdd,type_project,genre_project,branch_project,category_project,year_project
                WHERE projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project
                AND projectmdd.genre_id=$genreproject AND projectmdd.category_id=$categoryproject 
                AND projectmdd.type_id=$typeproject AND projectmdd.branch_id=$branch_project           
                AND projectmdd.project_name LIKE '%$keyword%' 
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project 
                AND projectmdd.genre_id=$genreproject AND projectmdd.category_id=$categoryproject 
                AND projectmdd.type_id=$typeproject AND projectmdd.branch_id=$branch_project                 
                AND projectmdd.keyword_m_project1 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id 
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project
                AND projectmdd.genre_id=$genreproject AND projectmdd.category_id=$categoryproject 
                AND projectmdd.type_id=$typeproject AND projectmdd.branch_id=$branch_project                  
                AND projectmdd.keyword_m_project2 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project
                AND projectmdd.genre_id=$genreproject AND projectmdd.category_id=$categoryproject 
                AND projectmdd.type_id=$typeproject AND projectmdd.branch_id=$branch_project                 
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'
                
                OR  projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id
                AND projectmdd.branch_id=branch_project.branch_id AND projectmdd.category_id=category_project.category_id  
                AND projectmdd.project_m_year=year_project.NO_Y AND projectmdd.project_m_year=$year_project  
                AND projectmdd.genre_id=$genreproject AND projectmdd.category_id=$categoryproject 
                AND projectmdd.type_id=$typeproject AND projectmdd.branch_id=$branch_project               
                AND projectmdd.keyword_m_project4 LIKE '%$keyword%'");
            
            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_m_project1;
                $key_similar2 = $key_s->keyword_m_project2;
                $key_similar3 = $key_s->keyword_m_project4;
                $key_similar4 = $key_s->keyword_m_project4;
                $search_id = $key_s->project_m_id;
                
                $similar = DB::select("SELECT *,ABS(projectmdd.project_m_id = '$search_id') AS pID
                FROM projectmdd,type_project
                WHERE projectmdd.project_m_id != '$search_id' 
                AND projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project1 LIKE '%$key_similar1%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project2 LIKE '%$key_similar2%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar3%' 
                OR projectmdd.type_id=type_project.type_id AND projectmdd.keyword_m_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_m_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                session_start();
                $_SESSION['beforsearch']='1';
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        
        
        //print_r($detailsearch);
        return view('beforesearchAVmdd', compact('detailsearch','similar','imgaccount','adminaccount'));
    }

    function detailview(Request $request)
    {
        session_start();
        $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
        $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
        $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
        $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        $chk_type = DB::select("SELECT * FROM type_project");
        $chk_genre = DB::select("SELECT * FROM genre_project");
        $chk_category = DB::select("SELECT * FROM category_project");
        $chk_branch = DB::select("SELECT * FROM branch_project");
        $chk_year = DB::select("SELECT * FROM year_project");
        //print_r($chk_type);
        return view('searchAVmdd', compact('chk_type','chk_genre','chk_category','chk_branch','chk_year','imgaccount','adminaccount'));
    }
}
