@extends('layouts.mainhomeMDD')
@section('content')
<!-- app.css -->
        <div class="rowcolumn">
            <div class="col-md-12">
                <div class="tile">
                    @if(isset($item_m0)?$item_m0:'')
                        <div class="texthe"><i class="fas fa-tags"></i> <b>เกษตร</b></div>
                        <a href="pursue" class="btnsum"><button type="button" class="btn btn-default" style="color: #D9A32F;background-color: white;margin-top:-20px;" >
                                ดูทั้งหมด (<?php if($sum_follow){echo $sum_follow;}?>)</button></a>
                            <div class="tile-body">
                                @foreach($item_m0 as $items)
                                <div class="column-mdd">
                                <?php $status_m0 = $items->status_m ?>
                                    @if(isset($item_m0))
                                        <div class="layoutMDD"><span class="layout-mdd-i-text"><span class="countviewmdd"><?php formattter($viewcount0) ?></span><i class="fas fa-user" style="color: #A9A9A9;" title="ยอดผู้ชม"></i></span>
                                            <a href="itemdetaliMDD/{{$items->project_m_id}}"><div class="textMDD-h" ><b><?php echo $items->project_m_name;?></b></div></a>
                                            <div class="textMDD" ><b>คำอธิบาย :</b> 
                                                <?php 
                                                    $str = $items->des_m_project;
                                                    $count = utf8_strlen("$str");
                                                    create_str($count,$str,$items);
                                                ?></div>
                                            <div class="textMDD" ><b>ผู้สร้างผลงาน :</b> <?php echo $items->name?></div>
                                            <div class="textMDD" ><b>คำสำคัญ :</b> <?php echo $items->keyword_m_project1?> <?php echo $items->keyword_m_project2?> <?php echo $items->keyword_m_project3?> <?php echo $items->keyword_m_project4?></div>
                                            <div class="textMDD" ><b>ประเภท :</b> <?php echo $items->type_name?></div>
                                            <div class="rating">
                                                <?php 
                                                    $rate = $items->AvgRate;
                                                    rating_star($rate); 
                                                ?>
                                            </div>
                                        </div>
                                        
                                    @endif
                                </div>
                                @endforeach
                                <br>
                                @if(isset($itemA0)?$itemA0:'')
                                @foreach($itemA0 as $items)
                                    <div class="column-mdd">
                                        <div class="layoutMDD"><span class="layout-mdd-i-text"><span class="countviewmdd"><?php formattter($viewcountA0) ?></span><i class="fas fa-user" style="color: #A9A9A9;" title="ยอดผู้ชม"></i></span>
                                            <a href="itemdetaliMDD/{{$items->project_m_id}}"><div class="textMDD-h" ><b><?php echo $items->project_m_name;?></b></div></a>
                                            <div class="textMDD" ><b>คำอธิบาย :</b>
                                            <?php 
                                                $str = $items->des_m_project;
                                                $count = utf8_strlen("$str");
                                                create_str($count,$str,$items);
                                            ?></div>
                                            <div class="textMDD" ><b>ผู้สร้างผลงาน :</b> <?php echo $items->owner_m_name?></div>
                                            <div class="textMDD" ><b>คำสำคัญ :</b> <?php echo $items->keyword_m_project1?> <?php echo $items->keyword_m_project2?> <?php echo $items->keyword_m_project3?> <?php echo $items->keyword_m_project4?> </div>
                                            <div class="textMDD" ><b>ประเภท :</b> <?php echo $items->type_name?></div>
                                            <div class="rating">
                                                <?php 
                                                    $rate = $items->AvgRate;
                                                    rating_star($rate); 
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                @else
                            @endif
                              
                            </div><hr>
                            @else
                        @endif
                        @if(isset($item_l0)?$item_l0:'')
                            <div class="texthe"><i class="fas fa-tags"></i> <b>การศึกษา</b></div>
                            <a href="pursue" class="btnsum"><button type="button" class="btn btn-default" style="color: #D9A32F;background-color: white;margin-top:-20px;" >
                            ดูทั้งหมด (<?php if($sum_follow){echo $sum_follow;}?>)</button></a>
                                <div class="tile-body">
                                    @foreach($item_l0 as $items)
                                    <div class="column-mdd">
                                    <?php $status_m0 = $items->status_m ?>
                                        @if(isset($item_l0))
                                            <div class="layoutMDD"><span class="layout-mdd-i-text"><span class="countviewmdd"><?php formattter($viewcount_l0) ?></span><i class="fas fa-user" style="color: #A9A9A9;" title="ยอดผู้ชม"></i></span>
                                                <a href="itemdetaliMDD/{{$items->project_m_id}}"><div class="textMDD-h" ><b><?php echo $items->project_m_name;?></b></div></a>
                                                <div class="textMDD" ><b>คำอธิบาย :</b> 
                                                    <?php 
                                                        $str = $items->des_m_project;
                                                        $count = utf8_strlen("$str");
                                                        create_str($count,$str,$items);
                                                    ?></div>
                                                <div class="textMDD" ><b>ผู้สร้างผลงาน :</b> <?php echo $items->name?></div>
                                                <div class="textMDD" ><b>คำสำคัญ :</b> <?php echo $items->keyword_m_project1?> <?php echo $items->keyword_m_project2?> <?php echo $items->keyword_m_project3?> <?php echo $items->keyword_m_project4?></div>
                                                <div class="textMDD" ><b>ประเภท :</b> <?php echo $items->type_name?></div>
                                                <div class="rating">
                                                    <?php 
                                                        $rate = $items->AvgRate;
                                                        rating_star($rate); 
                                                    ?>
                                                </div>
                                            </div>
                                            
                                        @endif
                                    </div>
                                    @endforeach
                                    <br>
                                @if(isset($itemA_l0)?$itemA_l0:'')
                                    @foreach($itemA_l0 as $items)
                                        <div class="column-mdd">
                                            <div class="layoutMDD"><span class="layout-mdd-i-text"><span class="countviewmdd"><?php formattter($viewcountA_l0) ?></span><i class="fas fa-user" style="color: #A9A9A9;" title="ยอดผู้ชม"></i></span>
                                                <a href="itemdetaliMDD/{{$items->project_m_id}}"><div class="textMDD-h" ><b><?php echo $items->project_m_name;?></b></div></a>
                                                <div class="textMDD" ><b>คำอธิบาย :</b>
                                                <?php 
                                                    $str = $items->des_m_project;
                                                    $count = utf8_strlen("$str");
                                                    create_str($count,$str,$items);
                                                ?></div>
                                                <div class="textMDD" ><b>ผู้สร้างผลงาน :</b> <?php echo $items->owner_m_name?></div>
                                                <div class="textMDD" ><b>คำสำคัญ :</b> <?php echo $items->keyword_m_project1?> <?php echo $items->keyword_m_project2?> <?php echo $items->keyword_m_project3?> <?php echo $items->keyword_m_project4?> </div>
                                                <div class="textMDD" ><b>ประเภท :</b> <?php echo $items->type_name?></div>
                                                <div class="rating">
                                                    <?php 
                                                        $rate = $items->AvgRate;
                                                        rating_star($rate); 
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    @else  
                            @endif
                              </div><hr>
                                 @else  
                            @endif

                            @if(isset($item_h0)?$item_h0:'')
                            <div class="texthe"><i class="fas fa-tags"></i> <b>ดูเเลสุขภาพ</b></div>
                            <a href="pursue" class="btnsum"><button type="button" class="btn btn-default" style="color: #D9A32F;background-color: white;margin-top:-20px;" >
                                ดูทั้งหมด (<?php if($sum_follow){echo $sum_follow;}?>)</button></a>
                                    <div class="tile-body">
                                        @foreach($item_h0 as $items)
                                        <div class="column-mdd">
                                        <?php $status_m0 = $items->status_m ?>
                                            @if(isset($item_h0))
                                                <div class="layoutMDD"><span class="layout-mdd-i-text"><span class="countviewmdd"><?php formattter($viewcount_h0) ?></span><i class="fas fa-user" style="color: #A9A9A9;" title="ยอดผู้ชม"></i></span>
                                                    <a href="itemdetaliMDD/{{$items->project_m_id}}"><div class="textMDD-h" ><b><?php echo $items->project_m_name;?></b></div></a>
                                                    <div class="textMDD" ><b>คำอธิบาย :</b> 
                                                        <?php 
                                                            $str = $items->des_m_project;
                                                            $count = utf8_strlen("$str");
                                                            create_str($count,$str,$items);
                                                        ?></div>
                                                    <div class="textMDD" ><b>ผู้สร้างผลงาน :</b> <?php echo $items->name?></div>
                                                    <div class="textMDD" ><b>คำสำคัญ :</b> <?php echo $items->keyword_m_project1?> <?php echo $items->keyword_m_project2?> <?php echo $items->keyword_m_project3?> <?php echo $items->keyword_m_project4?></div>
                                                    <div class="textMDD" ><b>ประเภท :</b> <?php echo $items->type_name?></div>
                                                    <div class="rating">
                                                        <?php 
                                                            $rate = $items->AvgRate;
                                                            rating_star($rate); 
                                                        ?>
                                                    </div>
                                                </div>
                                                
                                            @endif
                                        </div>
                                        @endforeach
                                        <br>
                                        @elseif(isset($itemA_h0)?$itemA_h0:'')
                                        @foreach($itemA_h0 as $items)
                                            <div class="column-mdd">
                                                <div class="layoutMDD"><span class="layout-mdd-i-text"><span class="countviewmdd"><?php formattter($viewcountA_h0) ?></span><i class="fas fa-user" style="color: #A9A9A9;" title="ยอดผู้ชม"></i></span>
                                                    <a href="itemdetaliMDD/{{$items->project_m_id}}"><div class="textMDD-h" ><b><?php echo $items->project_m_name;?></b></div></a>
                                                    <div class="textMDD" ><b>คำอธิบาย :</b>
                                                    <?php 
                                                        $str = $items->des_m_project;
                                                        $count = utf8_strlen("$str");
                                                        create_str($count,$str,$items);
                                                    ?></div>
                                                    <div class="textMDD" ><b>ผู้สร้างผลงาน :</b> <?php echo $items->owner_m_name?></div>
                                                    <div class="textMDD" ><b>คำสำคัญ :</b> <?php echo $items->keyword_m_project1?> <?php echo $items->keyword_m_project2?> <?php echo $items->keyword_m_project3?> <?php echo $items->keyword_m_project4?> </div>
                                                    <div class="textMDD" ><b>ประเภท :</b> <?php echo $items->type_name?></div>
                                                    <div class="rating">
                                                        <?php 
                                                            $rate = $items->AvgRate;
                                                            rating_star($rate); 
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        </div><hr>
                                    @else
                                @endif
                                @if(isset($item_s0)?$item_s0:'')
                                <div class="texthe"><i class="fas fa-tags"></i> <b>ดูเเลสุขภาพ</b></div>
                                <a href="pursue" class="btnsum"><button type="button" class="btn btn-default" style="color: #D9A32F;background-color: white;margin-top:-20px;" >
                                ดูทั้งหมด (<?php if($sum_follow){echo $sum_follow;}?>)</button></a>
                                    <div class="tile-body">
                                        @foreach($item_s0 as $items)
                                        <div class="column-mdd">
                                        <?php $status_m0 = $items->status_m ?>
                                            @if(isset($item_s0))
                                                <div class="layoutMDD"><span class="layout-mdd-i-text"><span class="countviewmdd"><?php formattter($viewcount_s0) ?></span><i class="fas fa-user" style="color: #A9A9A9;" title="ยอดผู้ชม"></i></span>
                                                    <a href="itemdetaliMDD/{{$items->project_m_id}}"><div class="textMDD-h" ><b><?php echo $items->project_m_name;?></b></div></a>
                                                    <div class="textMDD" ><b>คำอธิบาย :</b> 
                                                        <?php 
                                                            $str = $items->des_m_project;
                                                            $count = utf8_strlen("$str");
                                                            create_str($count,$str,$items);
                                                        ?></div>
                                                    <div class="textMDD" ><b>ผู้สร้างผลงาน :</b> <?php echo $items->name?></div>
                                                    <div class="textMDD" ><b>คำสำคัญ :</b> <?php echo $items->keyword_m_project1?> <?php echo $items->keyword_m_project2?> <?php echo $items->keyword_m_project3?> <?php echo $items->keyword_m_project4?></div>
                                                    <div class="textMDD" ><b>ประเภท :</b> <?php echo $items->type_name?></div>
                                                    <div class="rating">
                                                        <?php 
                                                            $rate = $items->AvgRate;
                                                            rating_star($rate); 
                                                        ?>
                                                    </div>
                                                </div>
                                                
                                            @endif
                                        </div>
                                        @endforeach
                                        <br>
                                        @elseif(isset($itemA_s0)?$itemA_s0:'')
                                        @foreach($itemA_s0 as $items)
                                            <div class="column-mdd">
                                                <div class="layoutMDD"><span class="layout-mdd-i-text"><span class="countviewmdd"><?php formattter($viewcountA_s0) ?></span><i class="fas fa-user" style="color: #A9A9A9;" ></i></span>
                                                    <a href="itemdetaliMDD/{{$items->project_m_id}}"><div class="textMDD-h" ><b><?php echo $items->project_m_name;?></b></div></a>
                                                    <div class="textMDD" ><b>คำอธิบาย :</b>
                                                    <?php 
                                                        $str = $items->des_m_project;
                                                        $count = utf8_strlen("$str");
                                                        create_str($count,$str,$items);
                                                    ?></div>
                                                    <div class="textMDD" ><b>ผู้สร้างผลงาน :</b> <?php echo $items->owner_m_name?></div>
                                                    <div class="textMDD" ><b>คำสำคัญ :</b> <?php echo $items->keyword_m_project1?> <?php echo $items->keyword_m_project2?> <?php echo $items->keyword_m_project3?> <?php echo $items->keyword_m_project4?> </div>
                                                    <div class="textMDD" ><b>ประเภท :</b> <?php echo $items->type_name?></div>
                                                    <div class="rating">
                                                        <?php 
                                                            $rate = $items->AvgRate;
                                                            rating_star($rate); 
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        </div><hr>
                                    @else
                                @endif

                            @if(isset($item_g0)?$item_g0:'')
                            <div class="texthe"><i class="fas fa-tags"></i> <b>สังคมเเละสื่อสาร</b></div>
                            <a href="pursue" class="btnsum"><button type="button" class="btn btn-default" style="color: #D9A32F;background-color: white;margin-top:-20px;" >
                                ดูทั้งหมด (<?php if($sum_follow){echo $sum_follow;}?>)</button></a>
                                    <div class="tile-body">
                                        @foreach($item_g0 as $items)
                                        <div class="column-mdd">
                                        <?php $status_m0 = $items->status_m ?>
                                            @if(isset($item_g0))
                                                <div class="layoutMDD"><span class="layout-mdd-i-text"><span class="countviewmdd"><?php formattter($viewcount_g0) ?></span><i class="fas fa-user" style="color: #A9A9A9;" title="ยอดผู้ชม"></i></span>
                                                    <a href="itemdetaliMDD/{{$items->project_m_id}}"><div class="textMDD-h" ><b><?php echo $items->project_m_name;?></b></div></a>
                                                    <div class="textMDD" ><b>คำอธิบาย :</b> 
                                                        <?php 
                                                            $str = $items->des_m_project;
                                                            $count = utf8_strlen("$str");
                                                            create_str($count,$str,$items);
                                                        ?></div>
                                                    <div class="textMDD" ><b>ผู้สร้างผลงาน :</b> <?php echo $items->name?></div>
                                                    <div class="textMDD" ><b>คำสำคัญ :</b> <?php echo $items->keyword_m_project1?> <?php echo $items->keyword_m_project2?> <?php echo $items->keyword_m_project3?> <?php echo $items->keyword_m_project4?></div>
                                                    <div class="textMDD" ><b>ประเภท :</b> <?php echo $items->type_name?></div>
                                                    <div class="rating">
                                                        <?php 
                                                            $rate = $items->AvgRate;
                                                            rating_star($rate); 
                                                        ?>
                                                    </div>
                                                </div>
                                                
                                            @endif
                                        </div>
                                        @endforeach
                                        <br>
                                        @elseif(isset($itemA_g0)?$itemA_g0:'')
                                        @foreach($itemA_g0 as $items)
                                            <div class="column-mdd">
                                                <div class="layoutMDD"><span class="layout-mdd-i-text"><span class="countviewmdd"><?php formattter($viewcountA_g0) ?></span><i class="fas fa-user" style="color: #A9A9A9;" title="ยอดผู้ชม"></i></span>
                                                    <a href="itemdetaliMDD/{{$items->project_m_id}}"><div class="textMDD-h" ><b><?php echo $items->project_m_name;?></b></div></a>
                                                    <div class="textMDD" ><b>คำอธิบาย :</b>
                                                    <?php 
                                                        $str = $items->des_m_project;
                                                        $count = utf8_strlen("$str");
                                                        create_str($count,$str,$items);
                                                    ?></div>
                                                    <div class="textMDD" ><b>ผู้สร้างผลงาน :</b> <?php echo $items->owner_m_name?></div>
                                                    <div class="textMDD" ><b>คำสำคัญ :</b> <?php echo $items->keyword_m_project1?> <?php echo $items->keyword_m_project2?> <?php echo $items->keyword_m_project3?> <?php echo $items->keyword_m_project4?> </div>
                                                    <div class="textMDD" ><b>ประเภท :</b> <?php echo $items->type_name?></div>
                                                    <div class="rating">
                                                        <?php 
                                                            $rate = $items->AvgRate;
                                                            rating_star($rate); 
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        </div><hr>
                                    @else
                                @endif
                                </div>
                            </div>
                        <hr>
                    </div>
                </div>
            </div
        ></div>
        <footer class="footer footer-color footer-mdd">
        <div class="containermdd footer-conlayoutmdd">
            <div class="row " >
                <div class="col">
                    <label for="text" style="margin-top: 10%;" id="about">เกี่ยวกับ</label>
                    <!-- <p><i class="fas fa-home mr-3"></i> New York, NY 10012, US</p> -->
                    <p>
                        ระบบจัดเก็บโครงงานวิจัย และวิทยานิพนธ์ของนิสิต คณะเทคโนโลยีสารสนเทศและการสื่อสาร มหาวิทยาลัยพะเยา 
                        ได้พัฒนาระบบนี้ขึ้นเพื่อการเก็บรักษาเอกสารโครงงาน วิจัยและวิทยานิพนธ์ของนิสิต ให้ยังคงอยู่เป็นแนวทางในการศึกษาการทำโครงงาน วิจัยและวิทยานิพนธ์ 
                        ให้แก่รุ่นต่อๆไปได้นำมาประยุกต์ใช้กับผลงานของนิสิตหรือนำมาพัฒนาต่อยอดแก่ผู้ที่สนใจ อีกทั้งยังช่วยลดปัญหาการสุญหายของเอกสาร และลดการใช้ทรัพยากรกระดาษอีกด้วย 
                    </p>  
                </div>
                <div class="col" style="margin-top: 3.1%;">
                    <label for="text" id="contact">ติดต่อ</label>
                    <!-- <p><i class="fas fa-home mr-3"></i> New York, NY 10012, US</p> -->
                    <p><i class="fas fa-envelope mr-3"></i> ohmsbn@gmail.com</p>
                    <p><i class="fas fa-phone mr-3"></i>099-247-927-1</p>
                </div>
                <div class="col" style="margin-top: 3%;">
                    <label for="text">เเผนผังเว็บไซต์</label>
                    <a href=""><p>คู่มือเว็บไซต์</p></a>
                    <a href=""><p>คู่มือเว็บไซร์</p></a>
                    <a href=""><p>คู่มือเว็บไซร์</p></a>
                    <a href=""><p>คู่มือเว็บไซร์</p></a>
                 
                </div>
                </div>
                <div class="w-100"></div>
                <div class="col"></div>
                <div class="col">
                    <p>© 2020 ลิขสิทธิ์:</p>
                </div>
                <div class="col"></div>
            </div>
        </div>
        <p id="back-top">
            <a href="#top">
                <span style="color: white;" ><i class="fas fa-arrow-circle-up fa-2x" style="height: 60px;"></i></span>
                Back to Top
            </a>
        </p>
        
    </footer>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            // hide #back-top first
            $("#back-top").hide();
            // fade in #back-top
            $(function () {
                $(window).scroll(function () {
                    if ($(this).scrollTop() > 160) {
                        $('#back-top').fadeIn();
                    } else {
                        $('#back-top').fadeOut();
                    }
                });
                // scroll body to 0px on click
                $('#back-top a').click(function () {
                    $('body,html').animate({
                        scrollTop: 0
                    }, 1000);
                    return false;
                });
            });
        });
    </script>
@stop
     
<?php
    function utf8_strlen($str){ 
        $c = strlen($str);
        $l = 0;
        for ($i = 0; $i < $c; ++$i)
        {
            if ((ord($str[$i]) & 0xC0) != 0x80)
            {
                ++$l;
            }
        }
        return $l;
    } 

    function formattter($viewcount) {
        if ($viewcount >= 1000000) {
            echo round($viewcount/ 1000000, 1).'หมื่น';
        }
        else if ($viewcount >= 1000) {
            echo round($viewcount/ 1000, 1). 'พัน';
        }else{
            echo $viewcount;
        }
        
    }

    function create_str($count,$str,$items) {
        if($count>20) {
            $strcount = substr($str,0,-10);
            $strcount1 = substr($strcount,0,-8);
            $strcut = $strcount1."...";
            echo $strcut;
        }elseif($count>30){
            $strcount = substr($str,0,-10);
            $strcount1 = substr($strcount,0,-8);
            $strcount2 = substr($strcount1,0,-10);
            $strcount3 = substr($strcount2,0,-8);
            $strcut = $strcount3."...";
            echo $strcut;
        }else {
            echo $items->project_m_name;
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

    function rating_star($svgid){
        if(isset($svgid)?$svgid:''){
            if($svgid < 2 & $svgid> 0){
                echo'<div class="rating">';
                    check_rating($svgid);
                    if(isset($svgid)?$svgid:''){
                        echo'<span class=""> ('.(round($svgid, $precision = 1)).')</span>';
                    }
                echo'</div>';
            }
            
            elseif($svgid >= 2 & $svgid < 3) {
                echo'<div class="rating">';
                    check_rating($svgid);
                    if(isset($svgid)?$svgid:''){
                        echo'<span class=""> ('.(round($svgid, $precision = 1)).')</span>';
                    }
                echo '</div>';
            }
            
            elseif($svgid >= 3 & $svgid < 4) {
                echo'<div class="rating">';
                    check_rating($svgid);
                    if(isset($svgid)?$svgid:''){
                        echo'<span class=""> ('.(round($svgid, $precision = 1)).')</span>';
                    }
                echo '</div>';
            }
            
            elseif($svgid >= 4 & $svgid < 5){
                echo'<div class="rating">';
                    check_rating($svgid);
                    if(isset($svgid)?$svgid:''){
                        echo'<span class=""> ('.(round($svgid, $precision = 1)).')</span>';
                    } 
                echo'</div>';}
            
            elseif($svgid >= 5){
                echo'<div class="rating">';
                    check_rating($svgid);
                    if(isset($svgid)?$svgid:''){
                        echo'<span class=""> ('.(round($svgid, $precision = 1)).')</span>';
                    }
                echo'</div>';
                }
            else{
                echo'<div class="rating">';
                    check_rating($svgid);
                    if(isset($svgid)?$svgid:''){
                        echo'<span class=""> ('.(round($svgid, $precision = 1)).')</span>';
                    }
                echo '</div>';}
        
            }
        else{
            echo'<div class="rating">';
                check_rating(0);  echo'<span class="">(0)</span>';
            echo'</div>';
        }    
    }
?>