@extends('layouts.mainhomeBD')

@section('content')
<!-- app.css -->
<div class="rowcolumn">
    <div class="col-md-12">
        <div class="tile1">
            <div class="tile-body">
                <div class="texthe1">มาใหม่</div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            
                                @foreach($datas0 as $data_p)
                                    @if(isset($data_p->status_p)=='0')
                                        <a href="itemdetaliBD/{{$data_p->project_id}}">
                                            <div class="column">
                                                <div class="columnimg"><img src="project\img_logo\<?php echo $data_p->logo; ?>" alt="" class="fromimg"></div></a>
                                                    <center><a href="itemdetaliBD/{{$data_p->project_id}}">
                                                            <div class="textimg">
                                                                <?php
                                                                $str = $data_p->project_name;
                                                                $count = utf8_strlen("$str");
                                                                create_str($count,$str,$data_p)
                                                                ?></div>
                                                        </a>
                                                    </center>
                                                    <center><a href="itemtypeBD/{{$data_p->type_id}}">
                                                            <div class="textimg2"><?php echo $data_p->type_name; ?></div>
                                                        </a>
                                                    </center>
                                                    
                                            </div>
                                    @endif              
                                @endforeach

                                @foreach($datas1 as $data_p) 
                                    @if(isset($data_p->status_p)=='1')
                                        <a href="itemdetaliBD/{{$data_p->project_id}}">
                                            <div class="column">
                                                <div class="columnimg"><img src="project\img_logo\<?php echo $data_p->logo; ?>" alt="" class="fromimg"></div></a>
                                                    <center><a href="itemdetaliBD/{{$data_p->project_id}}">
                                                            <div class="textimg">
                                                                <?php
                                                                $str = $data_p->project_name;
                                                                $count = utf8_strlen("$str");
                                                                create_str($count,$str,$data_p)
                                                                ?></div>
                                                        </a>
                                                    </center>
                                                    <center><a href="itemtypeBD/{{$data_p->type_id}}">
                                                            <div class="textimg2"><?php echo $data_p->type_name; ?></div>
                                                        </a>
                                                    </center>
                                                    <center>
                                                    <div class="rating">
                                                        <?php 
                                                            $rate = $data_p->AvgRate;
                                                            rating_star($rate); 
                                                        ?>
                                                    </div>
                                                    </center>
                                                    
                                            </div>
                                    @endif
                                @endforeach
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

<?php
    function utf8_strlen($str){
        $c = strlen($str);
        $l = 0;
        for ($i = 0; $i < $c; ++$i) {
            if ((ord($str[$i]) & 0xC0) != 0x80) {
                ++$l;
            }
        }
        return $l;
    }
    function create_str($count,$str,$items) {
        // echo $count;
        if($count>20 & $count<25) {
            $strcount = substr($str,0,-10);
            $strcount1 = substr($strcount,0,-8);
            $strcut = $strcount1."...";
            echo $strcut;
        }elseif($count>25 & $count<30){
            $strcount = substr($str,0,-10);
            $strcount1 = substr($strcount,0,-20);
            $strcut = $strcount1."...";
            echo $strcut;
        }elseif($count>30 & $count <40){
            $strcount = substr($str,0,-10);
            $strcount1 = substr($strcount,0,-8);
            $strcount2 = substr($strcount1,0,-10);
            $strcount3 = substr($strcount2,0,-8);
            $strcut = $strcount3."...";
            echo $strcut;
        }elseif($count>40 & $count <50){
            $strcount = substr($str,0,-50);
            $strcount1 = substr($strcount,0,-50);
            $strcount2 = substr($strcount1,0,-5);
            $strcut = $strcount2."...";
            echo $strcut;
        }elseif($count>50 & $count <80){
            $strcount = substr($str,0,-65);
            $strcount1 = substr($strcount,0,-50);
            $strcount2 = substr($strcount1,0,-5);
            $strcut = $strcount2."...";
            echo $strcut;
        }
        elseif($count>80 & $count <100){
            $strcount = substr($str,0,-65);
            $strcount1 = substr($strcount,0,-65);
            $strcount2 = substr($strcount1,0,-85);
            $strcount3 = substr($strcount2,0,-5);
            $strcut = $strcount3."...";
            echo $strcut;
        }
        elseif($count>100 & $count <150){
            $strcount = substr($str,0,-65);
            $strcount1 = substr($strcount,0,-85);
            $strcount2 = substr($strcount1,0,-85);
            $strcount3 = substr($strcount2,0,-5);
            $strcut = $strcount3."...";
            echo $strcut;
        }else{
            echo $items->project_name;
        }  
    }

    function check_rating($rating) {
        for($i=0;$i<floor($rating);$i++){
            echo '<i class="fas fa-star" style="color: #ffb712;"></i>';
        }
        for($i=0;$i < 5-floor($rating);$i++) {
            echo '<i class="far fa-star" style="color: #ffb712;"></i>';
        }
    }

    function formattter($viewcount) {
        if ($viewcount >= 1000000) {
            echo '<span class="countview">'.round($viewcount/ 1000000, 1).'หมื่น'.'</span><i class="fas fa-user i-view" style="color: #A9A9A9;"></i>';
        }
        else if ($viewcount >= 1000) {
            echo '<span class="countview">'.round($viewcount/ 1000, 1). 'พัน'.'</span><i class="fas fa-user i-view" style="color: #A9A9A9;"></i>';
        }else{
            // echo $viewcount;
            echo '<span class="countview">'.$viewcount.'</span><i class="fas fa-user i-view" style="color: #A9A9A9;"></i>';
        }
        
    }

    function rating_star($svgrate){
        if(isset($svgrate)?$svgrate:''){
            if($svgrate < 2 & $svgrate> 0){
                echo'<div class="rating">';
                    check_rating($svgrate);
                    if(isset($svgrate)?$svgrate:''){
                        echo'<span class=""> ('.(round($svgrate, $precision = 1)).')</span><br>';
                    }
                    // echo '<span class="countview">'.formattter($viewcount).'</span><i class="fas fa-user i-view" style="color: #A9A9A9;"></i>';
                echo'</div>';
            }
            
            elseif($svgrate >= 2 & $svgrate < 3) {
                echo'<div class="rating">';
                    check_rating($svgrate);
                    if(isset($svgrate)?$svgrate:''){
                        echo'<span class=""> ('.(round($svgrate, $precision = 1)).')</span><br>';
                    }
                    // echo '<span class="countview">'.formattter($viewcount).'</span><i class="fas fa-user i-view" style="color: #A9A9A9;"></i>';
                echo '</div>';
            }
            
            elseif($svgrate >= 3 & $svgrate < 4) {
                echo'<div class="rating">';
                    check_rating($svgrate);
                    if(isset($svgrate)?$svgrate:''){
                        echo'<span class=""> ('.(round($svgrate, $precision = 1)).')</span><br>';
                    }
                    // echo '<span class="countview">'.formattter($viewcount).'</span><i class="fas fa-user i-view" style="color: #A9A9A9;"></i>';
                echo '</div>';
            }
            
            elseif($svgrate >= 4 & $svgrate < 5){
                echo'<div class="rating">';
                    check_rating($svgrate);
                    if(isset($svgrate)?$svgrate:''){
                        echo'<span class=""> ('.(round($svgrate, $precision = 1)).')</span><br>';
                    } 
                    // echo '<span class="countview">'.formattter($viewcount).'</span><i class="fas fa-user i-view" style="color: #A9A9A9;"></i>';
                echo'</div>';}
            
            elseif($svgrate >= 5){
                echo'<div class="rating">';
                    check_rating($svgrate);
                    if(isset($svgrate)?$svgrate:''){
                        echo'<span class=""> ('.(round($svgrate, $precision = 1)).')</span><br>';
                    }
                    // echo '<span class="countview">'.formattter($viewcount).'</span><i class="fas fa-user i-view" style="color: #A9A9A9;"></i>';
                echo'</div>';
                }
            else{
                echo'<div class="rating">';
                    check_rating($svgrate);
                    if(isset($svgrate)?$svgrate:''){
                        echo'<span class=""> ('.(round($svgrate, $precision = 1)).')</span><br>';
                    }
                    // echo '<span class="countview">'.formattter($viewcount).'</span><i class="fas fa-user i-view" style="color: #A9A9A9;"></i>';
                echo '</div>';}
        
            }
        else{
            echo'<div class="rating">';
                check_rating(0);  echo'<span class=""> (0)</span><br>';
                // echo '<span class="countview">'.formattter($viewcount).'</span><i class="fas fa-user i-view" style="color: #A9A9A9;"></i>';
            echo'</div>';
        }    
    }
?>