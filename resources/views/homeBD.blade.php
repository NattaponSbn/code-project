
@extends('layouts.mainhomeBD')

@section('content')

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
        <!-- app.css -->
        <div class="rowcolumn">
            <div class="col-md-12">
                <div class="tile1">
                    <div class="tile-body">
                        <div class="texthe1 font-Athiti">มาใหม่</div>
                            <a href="Newarrival"><button type="button" class="btnsum btn btn-default" style="color: #D9A327;background-color: #F8F8FF;" >
                            ดูทั้งหมด (<?php if($sum_project){echo $sum_project;}?>)</button></a>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="table-responsive">
                                            @foreach($itemlp0 as $items)
                                                <?php $status_p0 = $items->status_p;?>
                                                @foreach($itemlp1 as $items)
                                                    <?php $status_p1 = $items->status_p;?>
                                                    @foreach($itemlp2 as $items)
                                                        <?php $status_p2 = $items->status_p;?>
                                                        @foreach($itemlp3 as $items)
                                                            <?php $status_p3 = $items->status_p;?>
                                                                <!-- เงื่อนไข เช็คว่า project ถูกต้อง -->
                                                                @if($status_p0=='0' & $status_p1=='0' & $status_p2=='0' & $status_p3=='0')
                                                                    @foreach($itemlp4 as $items)
                                                                        <?php $status_p4 = $items->status_p;?>
                                                                            @foreach($itemlp4 as $items)
                                                                                <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                    <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                    <?php 
                                                                                        $str = $items->project_name;
                                                                                        $count = utf8_strlen("$str");
                                                                                        create_str($count,$str,$items)  
                                                                                    ?></div></a></center>
                                                                                    <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                    <center>
                                                                                        @if(isset($viewcount4)?$viewcount4:'')
                                                                                            <?php $viewcount = $viewcount4; ?>
                                                                                        @endif
                                                                                        <?php create_star($svgrate4,$viewcount); ?>
                                                                                    </center>
                                                                                </div>
                                                                            @endforeach
                                                                    @endforeach
                                                                    @foreach($itemlp5 as $items)
                                                                        <?php $status_p5 = $items->status_p;?>
                                                                            @foreach($itemlp5 as $items)
                                                                                <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                    <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                    <?php 
                                                                                        $str = $items->project_name;
                                                                                        $count = utf8_strlen("$str");
                                                                                        create_str($count,$str,$items)  
                                                                                    ?></div></a></center>
                                                                                    <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                    <center>
                                                                                        @if(isset($viewcount5)?$viewcount5:'')
                                                                                            <?php $viewcount = $viewcount5; ?>
                                                                                        @endif
                                                                                        <?php create_star($svgrate5,$viewcount); ?>
                                                                                    </center>
                                                                                </div>
                                                                            @endforeach
                                                                    @endforeach
                                                                    @foreach($itemlp6 as $items)
                                                                        <?php $status_p6 = $items->status_p;?>
                                                                            @foreach($itemlp6 as $items)
                                                                                <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                    <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                    <?php 
                                                                                        $str = $items->project_name;
                                                                                        $count = utf8_strlen("$str");
                                                                                        create_str($count,$str,$items)  
                                                                                    ?></div></a></center>
                                                                                    <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                    <center>
                                                                                        @if(isset($viewcount6)?$viewcount6:'')
                                                                                            <?php $viewcount = $viewcount6; ?>
                                                                                        @endif
                                                                                        <?php create_star($svgrate6,$viewcount); ?>
                                                                                    </center>
                                                                                </div>
                                                                            @endforeach
                                                                    @endforeach
                                                                    @foreach($itemlp7 as $items)
                                                                        <?php $status_p7 = $items->status_p;?>
                                                                            @foreach($itemlp7 as $items)
                                                                                <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                    <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                    <?php 
                                                                                        $str = $items->project_name;
                                                                                        $count = utf8_strlen("$str");
                                                                                        create_str($count,$str,$items)  
                                                                                    ?></div></a></center>
                                                                                    <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                    <center>
                                                                                        @if(isset($viewcount7)?$viewcount7:'')
                                                                                            <?php $viewcount = $viewcount7; ?>
                                                                                        @endif
                                                                                        <?php create_star($svgrate7,$viewcount); ?>
                                                                                    </center>
                                                                                </div>
                                                                            @endforeach
                                                                    @endforeach

                                                                        @elseif($status_p0=='0' & $status_p1=='0' & $status_p2=='0' & $status_p3=='1')
                                                                            @foreach($itemlp3 as $items)
                                                                                <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                    <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                    <?php 
                                                                                        $str = $items->project_name;
                                                                                        $count = utf8_strlen($str);
                                                                                        // echo $count;
                                                                                        create_str($count,$str,$items)  
                                                                                    ?></div></a></center>
                                                                                    <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                    <center>
                                                                                        @if(isset($viewcount3)?$viewcount3:'')
                                                                                            <?php $viewcount = $viewcount3; ?>
                                                                                        @endif
                                                                                        <?php create_star($svgrate3,$viewcount); ?>
                                                                                    </center>
                                                                                </div>
                                                                            @endforeach
                                                                            @foreach($itemlp4 as $items)
                                                                                <?php $status_p4 = $items->status_p;?>
                                                                                    @foreach($itemlp4 as $items)
                                                                                        <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                            <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                            <?php 
                                                                                                $str = $items->project_name;
                                                                                                $count = utf8_strlen($str);
                                                                                                create_str($count,$str,$items);  
                                                                                            ?></div></a></center>
                                                                                            <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                            <center>
                                                                                                @if(isset($viewcount4)?$viewcount4:'')
                                                                                                    <?php $viewcount = $viewcount4; ?>
                                                                                                @endif
                                                                                                <?php create_star($svgrate4,$viewcount); ?>
                                                                                            </center>
                                                                                        </div>
                                                                                    @endforeach
                                                                            @endforeach
                                                                            @foreach($itemlp5 as $items)
                                                                                <?php $status_p5 = $items->status_p;?>
                                                                                    @foreach($itemlp5 as $items)
                                                                                        <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                            <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                            <?php 
                                                                                                $str = $items->project_name;
                                                                                                $count = utf8_strlen("$str");
                                                                                                create_str($count,$str,$items);  
                                                                                            ?></div></a></center>
                                                                                            <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                            <center>
                                                                                                @if(isset($viewcount5)?$viewcount5:'')
                                                                                                    <?php $viewcount = $viewcount5; ?>
                                                                                                @endif
                                                                                                <?php create_star($svgrate5,$viewcount); ?>
                                                                                            </center>
                                                                                        </div>
                                                                                    @endforeach
                                                                            @endforeach
                                                                            @foreach($itemlp6 as $items)
                                                                                <?php $status_p6 = $items->status_p;?>
                                                                                    @foreach($itemlp6 as $items)
                                                                                        <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                            <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                            <?php 
                                                                                                $str = $items->project_name;
                                                                                                $count = utf8_strlen("$str");
                                                                                                create_str($count,$str,$items);  
                                                                                            ?></div></a></center>
                                                                                            <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                            <center>
                                                                                                @if(isset($viewcount6)?$viewcount6:'')
                                                                                                    <?php $viewcount = $viewcount6; ?>
                                                                                                @endif
                                                                                                <?php create_star($svgrate6,$viewcount); ?>
                                                                                            </center>
                                                                                        </div>
                                                                                    @endforeach
                                                                            @endforeach
                                                                        @elseif($status_p0=='0' & $status_p1=='0' & $status_p2=='1' & $status_p3=='1')
                                                                            @foreach($itemlp2 as $items)
                                                                                <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                    <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                    <?php 
                                                                                        $str = $items->project_name;
                                                                                        $count = utf8_strlen("$str");
                                                                                        create_str($count,$str,$items)  
                                                                                    ?></div></a></center>
                                                                                    <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                    <center>
                                                                                        @if(isset($viewcount2)?$viewcount2:'')
                                                                                            <?php $viewcount = $viewcount2; ?>
                                                                                        @endif
                                                                                        <?php create_star($svgrate2,$viewcount); ?>
                                                                                    </center>
                                                                                </div>
                                                                            @endforeach
                                                                            @foreach($itemlp3 as $items)
                                                                                <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                    <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                    <?php 
                                                                                        $str = $items->project_name;
                                                                                        $count = utf8_strlen("$str");
                                                                                        create_str($count,$str,$items)  
                                                                                    ?></div></a></center>
                                                                                    <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                    <center>
                                                                                        @if(isset($viewcount3)?$viewcount3:'')
                                                                                            <?php $viewcount = $viewcount3; ?>
                                                                                        @endif
                                                                                        <?php create_star($svgrate3,$viewcount); ?>
                                                                                    </center>
                                                                                </div>
                                                                            @endforeach
                                                                            @foreach($itemlp4 as $items)
                                                                                <?php $status_p4 = $items->status_p;?>
                                                                                    @foreach($itemlp4 as $items)
                                                                                        <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                            <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                            <?php 
                                                                                                $str = $items->project_name;
                                                                                                $count = utf8_strlen("$str");
                                                                                                create_str($count,$str,$items);  
                                                                                            ?></div></a></center>
                                                                                            <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                            <center>
                                                                                                @if(isset($viewcount4)?$viewcount4:'')
                                                                                                    <?php $viewcount = $viewcount4; ?>
                                                                                                @endif
                                                                                                <?php create_star($svgrate4,$viewcount); ?>
                                                                                            </center>
                                                                                        </div>
                                                                                    @endforeach
                                                                            @endforeach
                                                                            @foreach($itemlp5 as $items)
                                                                                <?php $status_p5 = $items->status_p;?>
                                                                                    @foreach($itemlp5 as $items)
                                                                                        <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                            <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                            <?php 
                                                                                                $str = $items->project_name;
                                                                                                $count = utf8_strlen("$str");
                                                                                                create_str($count,$str,$items);  
                                                                                            ?></div></a></center>
                                                                                            <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                            <center>
                                                                                                @if(isset($viewcount5)?$viewcount5:'')
                                                                                                    <?php $viewcount = $viewcount5; ?>
                                                                                                @endif
                                                                                                <?php create_star($svgrate5,$viewcount); ?>
                                                                                            </center>
                                                                                        </div>
                                                                                    @endforeach
                                                                            @endforeach

                                                                        @elseif($status_p0=='0' & $status_p1=='1' & $status_p2=='1' & $status_p3=='1')
                                                                            @foreach($itemlp1 as $items)
                                                                                <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                    <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                    <?php 
                                                                                        $str = $items->project_name;
                                                                                        $count = utf8_strlen("$str");
                                                                                        create_str($count,$str,$items)  
                                                                                    ?></div></a></center>
                                                                                    <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                    <center>
                                                                                        @if(isset($viewcount1)?$viewcount1:'')
                                                                                            <?php $viewcount = $viewcount1; ?>
                                                                                        @endif
                                                                                        <?php create_star($svgrate1,$viewcount); ?>
                                                                                    </center>
                                                                                </div>
                                                                            @endforeach
                                                                            @foreach($itemlp2 as $items)
                                                                                <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                    <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                    <?php 
                                                                                        $str = $items->project_name;
                                                                                        $count = utf8_strlen("$str");
                                                                                        create_str($count,$str,$items)
                                                                                    ?></div></a></center>
                                                                                    <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                    <center>
                                                                                        @if(isset($viewcount2)?$viewcount2:'')
                                                                                            <?php $viewcount = $viewcount2; ?>
                                                                                        @endif
                                                                                        <?php create_star($svgrate2,$viewcount); ?>
                                                                                    </center>
                                                                                </div>
                                                                            @endforeach
                                                                            @foreach($itemlp3 as $items)
                                                                                <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                    <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                    <?php 
                                                                                        $str = $items->project_name;
                                                                                        $count = utf8_strlen("$str");
                                                                                        create_str($count,$str,$items)
                                                                                    ?></div></a></center>
                                                                                    <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                    <center>
                                                                                        @if(isset($viewcount3)?$viewcount3:'')
                                                                                            <?php $viewcount = $viewcount3; ?>
                                                                                        @endif
                                                                                        <?php create_star($svgrate3,$viewcount); ?>
                                                                                    </center>
                                                                                </div>
                                                                            @endforeach
                                                                            @foreach($itemlp4 as $items)
                                                                                <?php $status_p4 = $items->status_p;?>
                                                                                    @foreach($itemlp4 as $items)
                                                                                        <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                            <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                            <?php 
                                                                                                $str = $items->project_name;
                                                                                                $count = utf8_strlen("$str");
                                                                                                create_str($count,$str,$items);  
                                                                                            ?></div></a></center>
                                                                                            <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                            <center>
                                                                                                @if(isset($viewcount4)?$viewcount4:'')
                                                                                                    <?php $viewcount = $viewcount4; ?>
                                                                                                @endif
                                                                                                <?php create_star($svgrate4,$viewcount); ?>
                                                                                            </center>
                                                                                        </div>
                                                                                    @endforeach
                                                                            @endforeach

                                                                        @elseif($status_p0=='1' & $status_p1=='1' & $status_p2=='1' & $status_p3=='1')
                                                                            @foreach($itemlp0 as $items)
                                                                                <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                    <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                    <?php 
                                                                                        $str = $items->project_name;
                                                                                        $count = utf8_strlen($str);
                                                                                        create_str($count,$str,$items)
                                                                                    ?></div></a></center>
                                                                                    <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                    <center>
                                                                                        @if(isset($viewcount0)?$viewcount0:'')
                                                                                            <?php $viewcount = $viewcount0; ?>
                                                                                        @endif
                                                                                        <?php create_star($svgrate0,$viewcount); ?>
                                                                                    </center>
                                                                                </div>
                                                                            @endforeach
                                                                            @foreach($itemlp1 as $items)
                                                                                <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                    <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                    <?php 
                                                                                        $str = $items->project_name;
                                                                                        $count = utf8_strlen($str);
                                                                                        create_str($count,$str,$items)
                                                                                    ?></div></a></center>
                                                                                    <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                    <center>
                                                                                        @if(isset($viewcount1)?$viewcount1:'')
                                                                                            <?php $viewcount = $viewcount1; ?>
                                                                                        @endif
                                                                                        <?php create_star($svgrate1,$viewcount); ?>
                                                                                    </center>
                                                                                </div>
                                                                            @endforeach
                                                                            @foreach($itemlp2 as $items)
                                                                                <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                    <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                    <?php 
                                                                                        $str = $items->project_name;
                                                                                        $count = utf8_strlen($str);
                                                                                        create_str($count,$str,$items)
                                                                                    ?></div></a></center>
                                                                                    <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                    <center>
                                                                                        @if(isset($viewcount2)?$viewcount2:'')
                                                                                            <?php $viewcount = $viewcount2; ?>
                                                                                        @endif
                                                                                        <?php create_star($svgrate2,$viewcount); ?>
                                                                                    </center>
                                                                                </div>
                                                                            @endforeach
                                                                            @foreach($itemlp3 as $items)
                                                                                <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                    <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                    <?php 
                                                                                        $str = $items->project_name;
                                                                                        $count = utf8_strlen($str);
                                                                                        create_str($count,$str,$items)
                                                                                    ?></div></a></center>
                                                                                    <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                    <center>
                                                                                        @if(isset($viewcount3)?$viewcount3:'')
                                                                                            <?php $viewcount = $viewcount3; ?>
                                                                                        @endif
                                                                                        <?php create_star($svgrate3,$viewcount); ?>
                                                                                    </center>
                                                                                </div>
                                                                            @endforeach
                                                                        @elseif($status_p0=='1' & $status_p1=='0' & $status_p2=='0' & $status_p3=='1')
                                                                            @foreach($itemlp0 as $items)
                                                                                <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                    <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                    <?php 
                                                                                        $str = $items->project_name;
                                                                                        $count = utf8_strlen($str);
                                                                                        create_str($count,$str,$items)
                                                                                    ?></div></a></center>
                                                                                    <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                    <center>
                                                                                        @if(isset($viewcount0)?$viewcount0:'')
                                                                                            <?php $viewcount = $viewcount0; ?>
                                                                                        @endif
                                                                                        <?php create_star($svgrate0,$viewcount); ?>
                                                                                    </center>
                                                                                </div>
                                                                            @endforeach
                                                                            @foreach($itemlp3 as $items)
                                                                                <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                    <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                    <?php 
                                                                                        $str = $items->project_name;
                                                                                        $count = utf8_strlen($str);
                                                                                        create_str($count,$str,$items)
                                                                                    ?></div></a></center>
                                                                                    <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                    <center>
                                                                                        @if(isset($viewcount3)?$viewcount3:'')
                                                                                            <?php $viewcount = $viewcount3; ?>
                                                                                        @endif
                                                                                        <?php create_star($svgrate3,$viewcount); ?>
                                                                                    </center>
                                                                                </div>
                                                                            @endforeach
                                                                            @foreach($itemlp4 as $items)
                                                                                <?php $status_p4 = $items->status_p;?>
                                                                                    @foreach($itemlp4 as $items)
                                                                                        <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                            <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                            <?php 
                                                                                                $str = $items->project_name;
                                                                                                $count = utf8_strlen($str);
                                                                                                create_str($count,$str,$items);  
                                                                                            ?></div></a></center>
                                                                                            <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                            <center>
                                                                                                @if(isset($viewcount4)?$viewcount4:'')
                                                                                                    <?php $viewcount = $viewcount4; ?>
                                                                                                @endif
                                                                                                <?php create_star($svgrate4,$viewcount); ?>
                                                                                            </center>
                                                                                        </div>
                                                                                    @endforeach
                                                                            @endforeach
                                                                            @foreach($itemlp5 as $items)
                                                                                <?php $status_p5 = $items->status_p;?>
                                                                                    @foreach($itemlp5 as $items)
                                                                                    <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                        <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                        <?php 
                                                                                            $str = $items->project_name;
                                                                                            $count = utf8_strlen($str);
                                                                                            create_str($count,$str,$items);  
                                                                                        ?></div></a></center>
                                                                                        <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                        <center>
                                                                                            @if(isset($viewcount5)?$viewcount5:'')
                                                                                                <?php $viewcount = $viewcount5; ?>
                                                                                            @endif
                                                                                            <?php create_star($svgrate5,$viewcount); ?>
                                                                                        </center>
                                                                                    </div>
                                                                                    @endforeach
                                                                            @endforeach

                                                                        @elseif($status_p0=='1' & $status_p1=='0' & $status_p2=='1' & $status_p3=='1')
                                                                            @foreach($itemlp0 as $items)
                                                                                <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                    <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                    <?php 
                                                                                        $str = $items->project_name;
                                                                                        $count = utf8_strlen($str);
                                                                                        create_str($count,$str,$items)
                                                                                    ?></div></a></center>
                                                                                    <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                    <center>
                                                                                        @if(isset($viewcount0)?$viewcount0:'')
                                                                                            <?php $viewcount = $viewcount0; ?>
                                                                                        @endif
                                                                                        <?php create_star($svgrate0,$viewcount); ?>
                                                                                    </center>
                                                                                </div>
                                                                            @endforeach
                                                                            @foreach($itemlp1 as $items)
                                                                                <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                    <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                    <?php 
                                                                                        $str = $items->project_name;
                                                                                        $count = utf8_strlen($str);
                                                                                        create_str($count,$str,$items)
                                                                                    ?></div></a></center>
                                                                                    <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                    <center>
                                                                                        @if(isset($viewcount1)?$viewcount1:'')
                                                                                            <?php $viewcount = $viewcount1; ?>
                                                                                        @endif
                                                                                        <?php create_star($svgrate1,$viewcount); ?>
                                                                                    </center>
                                                                                </div>
                                                                            @endforeach
                                                                            @foreach($itemlp3 as $items)
                                                                                <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                    <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                    <?php 
                                                                                        $str = $items->project_name;
                                                                                        $count = utf8_strlen($str);
                                                                                        create_str($count,$str,$items)
                                                                                    ?></div></a></center>
                                                                                    <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                    <center>
                                                                                        @if(isset($viewcount3)?$viewcount3:'')
                                                                                            <?php $viewcount = $viewcount3; ?>
                                                                                        @endif
                                                                                        <?php create_star($svgrate3,$viewcount); ?>
                                                                                    </center>
                                                                                </div>
                                                                            @endforeach
                                                                            @foreach($itemlp4 as $items)
                                                                                <?php $status_p4 = $items->status_p;?>
                                                                                    @foreach($itemlp4 as $items)
                                                                                    <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                        <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                        <?php 
                                                                                            $str = $items->project_name;
                                                                                            $count = utf8_strlen($str);
                                                                                            create_str($count,$str,$items);  
                                                                                        ?></div></a></center>
                                                                                        <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                        <center>
                                                                                            @if(isset($viewcount4)?$viewcount4:'')
                                                                                                <?php $viewcount = $viewcount4; ?>
                                                                                            @endif
                                                                                            <?php create_star($svgrate4,$viewcount); ?>
                                                                                        </center>
                                                                                    </div>
                                                                                    @endforeach
                                                                            @endforeach

                                                                        @elseif($status_p0=='1' & $status_p1=='1' & $status_p2=='0' & $status_p3=='1')
                                                                            @foreach($itemlp0 as $items)
                                                                                <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                    <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                    <?php 
                                                                                        $str = $items->project_name;
                                                                                        $count = utf8_strlen($str);
                                                                                        create_str($count,$str,$items)
                                                                                    ?></div></a></center>
                                                                                    <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                    <center>
                                                                                        @if(isset($viewcount0)?$viewcount0:'')
                                                                                            <?php $viewcount = $viewcount0; ?>
                                                                                        @endif
                                                                                        <?php create_star($svgrate0,$viewcount); ?>
                                                                                    </center>
                                                                                </div>
                                                                            @endforeach
                                                                            @foreach($itemlp1 as $items)
                                                                                <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                    <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                    <?php 
                                                                                        $str = $items->project_name;
                                                                                        $count = utf8_strlen($str);
                                                                                        create_str($count,$str,$items)  
                                                                                    ?></div></a></center>
                                                                                    <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                    <center>
                                                                                        @if(isset($viewcount1)?$viewcount1:'')
                                                                                            <?php $viewcount = $viewcount1; ?>
                                                                                        @endif
                                                                                        <?php create_star($svgrate1,$viewcount); ?>
                                                                                    </center>
                                                                                </div>
                                                                            @endforeach
                                                                            @foreach($itemlp2 as $items)
                                                                                <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                    <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                    <?php 
                                                                                        $str = $items->project_name;
                                                                                        $count = utf8_strlen($str);
                                                                                        create_str($count,$str,$items)  
                                                                                    ?></div></a></center>
                                                                                    <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                    <center>
                                                                                        @if(isset($viewcount2)?$viewcount2:'')
                                                                                            <?php $viewcount = $viewcount2; ?>
                                                                                        @endif
                                                                                        <?php create_star($svgrate2,$viewcount); ?>
                                                                                    </center>
                                                                                </div>
                                                                            @endforeach
                                                                            @foreach($itemlp4 as $items)
                                                                                <?php $status_p4 = $items->status_p;?>
                                                                                    @foreach($itemlp4 as $items)
                                                                                        <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                            <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                            <?php 
                                                                                                $str = $items->project_name;
                                                                                                $count = utf8_strlen($str);
                                                                                                create_str($count,$str,$items);  
                                                                                            ?></div></a></center>
                                                                                            <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                            <center>
                                                                                                @if(isset($viewcount4)?$viewcount4:'')
                                                                                                    <?php $viewcount = $viewcount4; ?>
                                                                                                @endif
                                                                                                <?php create_star($svgrate4,$viewcount); ?>
                                                                                            </center>
                                                                                        </div>
                                                                                    @endforeach
                                                                            @endforeach

                                                                        @elseif($status_p0=='1' & $status_p1=='0' & $status_p2=='0' & $status_p3=='0')
                                                                            @foreach($itemlp0 as $items)
                                                                                <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                    <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                    <?php 
                                                                                        $str = $items->project_name;
                                                                                        $count = utf8_strlen($str);
                                                                                        create_str($count,$str,$items)  
                                                                                    ?></div></a></center>
                                                                                    <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                    <center>
                                                                                        @if(isset($viewcount0)?$viewcount0:'')
                                                                                            <?php $viewcount = $viewcount0; ?>
                                                                                        @endif
                                                                                        <?php create_star($svgrate0,$viewcount); ?>
                                                                                    </center>
                                                                                </div>
                                                                            @endforeach
                                                                            @foreach($itemlp4 as $items)
                                                                                <?php $status_p4 = $items->status_p;?>
                                                                                    @foreach($itemlp4 as $items)
                                                                                        <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                            <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                            <?php 
                                                                                                $str = $items->project_name;
                                                                                                $count = utf8_strlen($str);
                                                                                                create_str($count,$str,$items);  
                                                                                            ?></div></a></center>
                                                                                            <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                            <center>
                                                                                                @if(isset($viewcount4)?$viewcount4:'')
                                                                                                    <?php $viewcount = $viewcount4; ?>
                                                                                                @endif
                                                                                                <?php create_star($svgrate4,$viewcount); ?>
                                                                                            </center>
                                                                                        </div>
                                                                                    @endforeach
                                                                            @endforeach
                                                                            @foreach($itemlp5 as $items)
                                                                                <?php $status_p5 = $items->status_p;?>
                                                                                    @foreach($itemlp6 as $items)
                                                                                        <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                            <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                            <?php 
                                                                                                $str = $items->project_name;
                                                                                                $count = utf8_strlen($str);
                                                                                                create_str($count,$str,$items);  
                                                                                            ?></div></a></center>
                                                                                            <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                            <center>
                                                                                                @if(isset($viewcount5)?$viewcount5:'')
                                                                                                    <?php $viewcount = $viewcount5; ?>
                                                                                                @endif
                                                                                                <?php create_star($svgrate5,$viewcount); ?>
                                                                                            </center>
                                                                                        </div>
                                                                                    @endforeach
                                                                            @endforeach
                                                                            @foreach($itemlp6 as $items)
                                                                                <?php $status_p6 = $items->status_p;?>
                                                                                    @foreach($itemlp6 as $items)
                                                                                        <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                            <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                            <?php 
                                                                                                $str = $items->project_name;
                                                                                                $count = utf8_strlen($str);
                                                                                                create_str($count,$str,$items);  
                                                                                            ?></div></a></center>
                                                                                            <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                            <center>
                                                                                                @if(isset($viewcount6)?$viewcount6:'')
                                                                                                    <?php $viewcount = $viewcount6; ?>
                                                                                                @endif
                                                                                                <?php create_star($svgrate6,$viewcount); ?>
                                                                                            </center>
                                                                                        </div>
                                                                                    @endforeach
                                                                            @endforeach
                                                                        @endif
                                                                @endforeach
                                                            @endforeach
                                                        @endforeach
                                                    @endforeach

                                                </div>
                                            </div>
                                        </div>   
                                    </div>
                                </div>
                            </div>
                        </div>
                        
    

        <div class="rowcolumn">
            <div class="col-md-12">
                <div class="tile2">
                    <div class="tile-body">
                    <div class="texthe1 font-Athiti">ยอดนิยม</div>    
                    <a href="Popular" ><button type="button" class="btnsum btn btn-default" style="color: #D9A327;background-color: #F8F8FF;">ดูทั้งหมด(<?php if($sum_pop_p){echo $sum_pop_p;}?>)</button></a>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="table-responsive">
                                    @foreach($itemlp0 as $items)
                                        <?php $status_p0 = $items->status_p;?>
                                        @foreach($itemlp1 as $items)
                                            <?php $status_p1 = $items->status_p;?>
                                            @foreach($itemlp2 as $items)
                                                <?php $status_p2 = $items->status_p;?>
                                                @foreach($itemlp3 as $items)
                                                    <?php $status_p3 = $items->status_p;?>
                                                    @foreach($itempop0 as $items)
                                                        <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                            <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                            <?php 
                                                                $str = $items->project_name;
                                                                $count = utf8_strlen($str);
                                                                create_str($count,$str,$items)  
                                                            ?></div></a></center>
                                                            <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                            <center>
                                                                @if(isset($viewcountp0)?$viewcountp0:'')
                                                                    <?php $viewcount = $viewcountp0; ?>
                                                                @endif
                                                                <?php create_star($avgpop0,$viewcount); ?>
                                                            </center>
                                                        </div>
                                                    @endforeach
                                                    @foreach($itempop1 as $items)
                                                        <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                            <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                            <?php 
                                                                $str = $items->project_name;
                                                                $count = utf8_strlen($str);
                                                                create_str($count,$str,$items)  
                                                            ?></div></a></center>
                                                            <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                            <center>
                                                                @if(isset($viewcountp1)?$viewcountp1:'')
                                                                    <?php $viewcount = $viewcountp1; ?>
                                                                @endif
                                                                <?php create_star($avgpop1,$viewcount); ?>
                                                            </center>
                                                        </div>
                                                    @endforeach
                                                    @foreach($itempop2 as $items)
                                                        <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                            <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                            <?php 
                                                                $str = $items->project_name;
                                                                $count = utf8_strlen($str);
                                                                create_str($count,$str,$items)  
                                                            ?></div></a></center>
                                                            <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                            <center>
                                                                @if(isset($viewcountp2)?$viewcountp2:'')
                                                                    <?php $viewcount = $viewcountp2; ?>
                                                                @endif
                                                                <?php create_star($avgpop2,$viewcount); ?>
                                                            </center>
                                                        </div>
                                                    @endforeach
                                                    @foreach($itempop3 as $items)
                                                        <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                            <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                            <?php 
                                                                $str = $items->project_name;
                                                                $count = utf8_strlen($str);
                                                                create_str($count,$str,$items)  
                                                            ?></div></a></center>
                                                            <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                            <center>
                                                                @if(isset($viewcountp3)?$viewcountp3:'')
                                                                    <?php $viewcount = $viewcountp3; ?>
                                                                @endif
                                                                <?php create_star($avgpop3,$viewcount); ?>
                                                            </center>
                                                        </div>
                                                    @endforeach
                                                @endforeach
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        
        <div class="rowcolumn">
            <div class="col-md-12">
                <div class="tile3">
                    <div class="tile-body">
                        <div class="texthe1 font-Athiti">IOT</div>
                            <a href="pageIot" class="btnsum"><button type="button" class="btn btn-default" style="color: #D9A32F;background-color: white;" >
                            ดูทั้งหมด (<?php if($sum_type_p){echo $sum_type_p;}?>)</button></a>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="table-responsive">
                                    
                                        @foreach($itemlg0 as $genre)
                                            <?php $status_g0=$genre->status_p;?>
                                            @foreach($itemlg1 as $genre)
                                                <?php $status_g1=$genre->status_p;?>
                                                    @foreach($itemlg2 as $genre)
                                                        <?php $status_g2=$genre->status_p;?>
                                                            @foreach($itemlg3 as $genre)
                                                                <?php $status_g3=$genre->status_p;?>
                                                                    @if($status_g0=='0' & $status_g1=='0' & $status_g2=='0' & $status_g3=='0')
                                                                            @if(isset($itemlg4)?$itemlg4:'')
                                                                                @foreach($itemlg4 as $items)
                                                                                    <?php $status_g4 = $items->status_p;?>
                                                                                        @foreach($itemlg4 as $items)
                                                                                            <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                                <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                                <?php 
                                                                                                    $str = $items->project_name;
                                                                                                    $count = utf8_strlen($str);
                                                                                                    create_str($count,$str,$items);
                                                                                                ?></div></a></center>
                                                                                                <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                            </div>
                                                                                        @endforeach
                                                                                @endforeach
                                                                                @else
                                                                                    <a href="#"><div class="column" ><div class="columnimg"><img src="img/fromimg.png"alt="" class="fromimg"></div></a>
                                                                                        <center><a href="#"><div class="textimg">ไม่มีข้อมูล</div></a></center>
                                                                                        <center><a href="#"><div class="textimg2">ไม่มีข้อมูล</div></a></center>
                                                                                    </div>
                                                                            @endif
                                                                            @if(isset($itemlg5)?$itemlg5:'')
                                                                                @foreach($itemlg5 as $items)
                                                                                    <?php $status_g5 = $items->status_p;?>
                                                                                        @foreach($itemlg5 as $items)
                                                                                            <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                                <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                                <?php 
                                                                                                    $str = $items->project_name;
                                                                                                    $count = utf8_strlen($str);
                                                                                                    create_str($count,$str,$items);
                                                                                                ?></div></a></center>
                                                                                                <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                            </div>
                                                                                        @endforeach
                                                                                @endforeach
                                                                                @else
                                                                                    <a href="#"><div class="column" ><div class="columnimg"><img src="img/fromimg.png"alt="" class="fromimg"></div></a>
                                                                                        <center><a href="#"><div class="textimg">ไม่มีข้อมูล</div></a></center>
                                                                                        <center><a href="#"><div class="textimg2">ไม่มีข้อมูล</div></a></center>
                                                                                    </div>
                                                                            @endif
                                                                            @if(isset($itemlg6)?$itemlg6:'')
                                                                                @foreach($itemlg6 as $items)
                                                                                    <?php $status_g6 = $items->status_p;?>
                                                                                        @foreach($itemlg6 as $items)
                                                                                            <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                                <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                                <?php 
                                                                                                    $str = $items->project_name;
                                                                                                    $count = utf8_strlen($str);
                                                                                                    create_str($count,$str,$items);
                                                                                                ?></div></a></center>
                                                                                                <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                            </div>
                                                                                        @endforeach
                                                                                @endforeach
                                                                                @else
                                                                                    <a href="#"><div class="column" ><div class="columnimg"><img src="img/fromimg.png"alt="" class="fromimg"></div></a>
                                                                                        <center><a href="#"><div class="textimg">ไม่มีข้อมูล</div></a></center>
                                                                                        <center><a href="#"><div class="textimg2">ไม่มีข้อมูล</div></a></center>
                                                                                    </div>
                                                                            @endif
                                                                            @if(isset($itemlg7)?$itemlg7:'')
                                                                                @foreach($itemlg7 as $items)
                                                                                    <?php $status_g7 = $items->status_p;?>
                                                                                        @foreach($itemlg7 as $items)
                                                                                            <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                                <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                                <?php 
                                                                                                    $str = $items->project_name;
                                                                                                    $count = utf8_strlen($str);
                                                                                                    create_str($count,$str,$items);
                                                                                                ?></div></a></center>
                                                                                                <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                            </div>
                                                                                        @endforeach
                                                                                @endforeach
                                                                                @else
                                                                                    <a href="#"><div class="column" ><div class="columnimg"><img src="img/fromimg.png"alt="" class="fromimg"></div></a>
                                                                                        <center><a href="#"><div class="textimg">ไม่มีข้อมูล</div></a></center>
                                                                                        <center><a href="#"><div class="textimg2">ไม่มีข้อมูล</div></a></center>
                                                                                    </div>
                                                                            @endif

                                                                        @elseif($status_g0=='0' & $status_g1=='0' & $status_g2=='0' & $status_g3=='1')
                                                                            @if(isset($itemlg3)?$itemlg3:'')
                                                                                @foreach($itemlg3 as $items)
                                                                                    <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                        <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                        <?php 
                                                                                            $str = $items->project_name;
                                                                                            $count = utf8_strlen($str);
                                                                                            create_str($count,$str,$items);  
                                                                                        ?></div></a></center>
                                                                                        <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                    </div>
                                                                                @endforeach
                                                                                @else
                                                                                    <a href="#"><div class="column" ><div class="columnimg"><img src="img/fromimg.png"alt="" class="fromimg"></div></a>
                                                                                        <center><a href="#"><div class="textimg">ไม่มีข้อมูล</div></a></center>
                                                                                        <center><a href="#"><div class="textimg2">ไม่มีข้อมูล</div></a></center>
                                                                                    </div>
                                                                            @endif
                                                                            @if(isset($itemlg4)?$itemlg4:'')
                                                                                @foreach($itemlg4 as $items)
                                                                                    <?php $status_g4 = $items->status_p;?>
                                                                                        @foreach($itemlg4 as $items)
                                                                                            <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                                <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                                <?php 
                                                                                                    $str = $items->project_name;
                                                                                                    $count = utf8_strlen($str);
                                                                                                    create_str($count,$str,$items);  
                                                                                                ?></div></a></center>
                                                                                                <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                            </div>
                                                                                        @endforeach
                                                                                @endforeach
                                                                                @else
                                                                                    <a href="#"><div class="column" ><div class="columnimg"><img src="img/fromimg.png"alt="" class="fromimg"></div></a>
                                                                                        <center><a href="#"><div class="textimg">ไม่มีข้อมูล</div></a></center>
                                                                                        <center><a href="#"><div class="textimg2">ไม่มีข้อมูล</div></a></center>
                                                                                    </div>
                                                                            @endif
                                                                            @if(isset($itemlg5)?$itemlg5:'')
                                                                                @foreach($itemlg5 as $items)
                                                                                    <?php $status_g5 = $items->status_p;?>
                                                                                        @foreach($itemlg5 as $items)
                                                                                            <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                                <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                                <?php 
                                                                                                    $str = $items->project_name;
                                                                                                    $count = utf8_strlen($str);
                                                                                                    create_str($count,$str,$items);  
                                                                                                ?></div></a></center>
                                                                                                <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                            </div>
                                                                                        @endforeach
                                                                                @endforeach
                                                                                @else
                                                                                    <a href="#"><div class="column" ><div class="columnimg"><img src="img/fromimg.png"alt="" class="fromimg"></div></a>
                                                                                        <center><a href="#"><div class="textimg">ไม่มีข้อมูล</div></a></center>
                                                                                        <center><a href="#"><div class="textimg2">ไม่มีข้อมูล</div></a></center>
                                                                                    </div>
                                                                            @endif
                                                                            @if(isset($itemlg6)?$itemlg6:'')
                                                                                @foreach($itemlg6 as $items)
                                                                                    <?php $status_g6 = $items->status_p;?>
                                                                                        @foreach($itemlg6 as $items)
                                                                                        <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                            <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                            <?php 
                                                                                                $str = $items->project_name;
                                                                                                $count = utf8_strlen($str);
                                                                                                create_str($count,$str,$items);  
                                                                                            ?></div></a></center>
                                                                                            <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                        </div>
                                                                                        @endforeach
                                                                                @endforeach
                                                                                @else
                                                                                    <a href="#"><div class="column" ><div class="columnimg"><img src="img/fromimg.png"alt="" class="fromimg"></div></a>
                                                                                        <center><a href="#"><div class="textimg">ไม่มีข้อมูล</div></a></center>
                                                                                        <center><a href="#"><div class="textimg2">ไม่มีข้อมูล</div></a></center>
                                                                                    </div>
                                                                            @endif
                                                                        @elseif($status_g0=='0' & $status_g1=='0' & $status_g2=='1' & $status_g3=='1')
                                                                            @if(isset($itemlg2)?$itemlg2:'')
                                                                                @foreach($itemlg2 as $items)
                                                                                    <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                        <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                        <?php 
                                                                                            $str = $items->project_name;
                                                                                            $count = utf8_strlen($str);
                                                                                            create_str($count,$str,$items);  
                                                                                        ?></div></a></center>
                                                                                        <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                    </div>
                                                                                @endforeach
                                                                                @else
                                                                                    <a href="#"><div class="column" ><div class="columnimg"><img src="img/fromimg.png"alt="" class="fromimg"></div></a>
                                                                                        <center><a href="#"><div class="textimg">ไม่มีข้อมูล</div></a></center>
                                                                                        <center><a href="#"><div class="textimg2">ไม่มีข้อมูล</div></a></center>
                                                                                    </div>
                                                                            @endif
                                                                            @if(isset($itemlg3)?$itemlg3:'')
                                                                                @foreach($itemlg3 as $items)
                                                                                    <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                        <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                        <?php 
                                                                                            $str = $items->project_name;
                                                                                            $count = utf8_strlen($str);
                                                                                            create_str($count,$str,$items);  
                                                                                        ?></div></a></center>
                                                                                        <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                    </div>
                                                                                @endforeach
                                                                                @else
                                                                                    <a href="#"><div class="column" ><div class="columnimg"><img src="img/fromimg.png"alt="" class="fromimg"></div></a>
                                                                                        <center><a href="#"><div class="textimg">ไม่มีข้อมูล</div></a></center>
                                                                                        <center><a href="#"><div class="textimg2">ไม่มีข้อมูล</div></a></center>
                                                                                    </div>
                                                                            @endif
                                                                            @if(isset($itemlg4)?$itemlg4:'')
                                                                                @foreach($itemlg4 as $items)
                                                                                    <?php $status_g4 = $items->status_p;?>
                                                                                        @foreach($itemlg4 as $items)
                                                                                            <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                                <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                                <?php 
                                                                                                    $str = $items->project_name;
                                                                                                    $count = utf8_strlen($str);
                                                                                                    create_str($count,$str,$items);  
                                                                                                ?></div></a></center>
                                                                                                <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                            </div>
                                                                                        @endforeach
                                                                                @endforeach
                                                                                @else
                                                                                    <a href="#"><div class="column" ><div class="columnimg"><img src="img/fromimg.png"alt="" class="fromimg"></div></a>
                                                                                        <center><a href="#"><div class="textimg">ไม่มีข้อมูล</div></a></center>
                                                                                        <center><a href="#"><div class="textimg2">ไม่มีข้อมูล</div></a></center>
                                                                                    </div>
                                                                            @endif
                                                                            @if(isset($itemlg5)?$itemlg5:'')
                                                                                @foreach($itemlg5 as $items)
                                                                                    <?php $status_g5 = $items->status_p;?>
                                                                                        @foreach($itemlg5 as $items)
                                                                                            <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                                <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                                <?php 
                                                                                                    $str = $items->project_name;
                                                                                                    $count = utf8_strlen($str);
                                                                                                    create_str($count,$str,$items);  
                                                                                                ?></div></a></center>
                                                                                                <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                            </div>
                                                                                        @endforeach
                                                                                @endforeach
                                                                                @else
                                                                                    <a href="#"><div class="column" ><div class="columnimg"><img src="img/fromimg.png"alt="" class="fromimg"></div></a>
                                                                                        <center><a href="#"><div class="textimg">ไม่มีข้อมูล</div></a></center>
                                                                                        <center><a href="#"><div class="textimg2">ไม่มีข้อมูล</div></a></center>
                                                                                    </div>
                                                                            @endif
                                                                        @elseif($status_g0=='1' & $status_g1=='1' & $status_g2=='1' & $status_g3=='0')
                                                                            @if(isset($itemlg0)?$itemlg0:'')
                                                                                @foreach($itemlg0 as $items)
                                                                                    <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                        <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                        <?php 
                                                                                            $str = $items->project_name;
                                                                                            $count = utf8_strlen($str);
                                                                                            create_str($count,$str,$items);  
                                                                                        ?></div></a></center>
                                                                                        <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                    </div>
                                                                                @endforeach
                                                                                @else
                                                                                    <a href="#"><div class="column" ><div class="columnimg"><img src="img/fromimg.png"alt="" class="fromimg"></div></a>
                                                                                        <center><a href="#"><div class="textimg">ไม่มีข้อมูล</div></a></center>
                                                                                        <center><a href="#"><div class="textimg2">ไม่มีข้อมูล</div></a></center>
                                                                                    </div>
                                                                            @endif
                                                                            @if(isset($itemlg1)?$itemlg1:'')
                                                                                @foreach($itemlg1 as $items)
                                                                                    <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                        <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                        <?php 
                                                                                            $str = $items->project_name;
                                                                                            $count = utf8_strlen($str);
                                                                                            create_str($count,$str,$items);  
                                                                                        ?></div></a></center>
                                                                                        <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                    </div>
                                                                                @endforeach
                                                                                @else
                                                                                    <a href="#"><div class="column" ><div class="columnimg"><img src="img/fromimg.png"alt="" class="fromimg"></div></a>
                                                                                        <center><a href="#"><div class="textimg">ไม่มีข้อมูล</div></a></center>
                                                                                        <center><a href="#"><div class="textimg2">ไม่มีข้อมูล</div></a></center>
                                                                                    </div>
                                                                            @endif
                                                                            @if(isset($itemlg2)?$itemlg2:'')
                                                                                @foreach($itemlg2 as $items)
                                                                                <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                        <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                        <?php 
                                                                                            $str = $items->project_name;
                                                                                            $count = utf8_strlen("$str");
                                                                                            create_str($count,$str,$items);  
                                                                                        ?></div></a></center>
                                                                                        <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                    </div>
                                                                                @endforeach
                                                                                @else
                                                                                    <a href="#"><div class="column" ><div class="columnimg"><img src="img/fromimg.png"alt="" class="fromimg"></div></a>
                                                                                        <center><a href="#"><div class="textimg">ไม่มีข้อมูล</div></a></center>
                                                                                        <center><a href="#"><div class="textimg2">ไม่มีข้อมูล</div></a></center>
                                                                                    </div>
                                                                            @endif
                                                                            @if(isset($itemlg5)?$itemlg5:'')
                                                                                @foreach($itemlg5 as $items)
                                                                                    <?php $status_g5 = $items->status_p;?>
                                                                                        @foreach($itemlg5 as $items)
                                                                                        <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                        <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                        <?php 
                                                                                            $str = $items->project_name;
                                                                                            $count = utf8_strlen("$str");
                                                                                            create_str($count,$str,$items);  
                                                                                        ?></div></a></center>
                                                                                        <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                    </div>
                                                                                        @endforeach
                                                                                @endforeach
                                                                                @else
                                                                                    <a href="#"><div class="column" ><div class="columnimg"><img src="img/fromimg.png"alt="" class="fromimg"></div></a>
                                                                                        <center><a href="#"><div class="textimg">ไม่มีข้อมูล</div></a></center>
                                                                                        <center><a href="#"><div class="textimg2">ไม่มีข้อมูล</div></a></center>
                                                                                    </div>
                                                                            @endif

                                                                        @elseif($status_g0=='1' & $status_g1=='1' & $status_g2=='1' & $status_g3=='1')
                                                                            @if(isset($itemlg0)?$itemlg0:'')
                                                                                @foreach($itemlg0 as $items)
                                                                                    <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                        <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                        <?php 
                                                                                            $str = $items->project_name;
                                                                                            $count = utf8_strlen($str);
                                                                                            create_str($count,$str,$items);
                                                                                            
                                                                                        ?></div></a></center>
                                                                                        <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                        <center>
                                                                                            @if(isset($viewcountg0)?$viewcountg0:'')
                                                                                                <?php $viewcount = $viewcountg0; ?>
                                                                                            @endif
                                                                                            <?php create_star($svgrateg0,$viewcount); ?>
                                                                                        </center>
                                                                                    </div>
                                                                                @endforeach
                                                                                @else
                                                                                    <a href="#"><div class="column" ><div class="columnimg"><img src="img/fromimg.png"alt="" class="fromimg"></div></a>
                                                                                        <center><a href="#"><div class="textimg">ไม่มีข้อมูล</div></a></center>
                                                                                        <center><a href="#"><div class="textimg2">ไม่มีข้อมูล</div></a></center>
                                                                                    </div>
                                                                            @endif
                                                                            @if(isset($itemlg1)?$itemlg1:'')
                                                                                @foreach($itemlg1 as $items)
                                                                                    <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                        <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                        <?php 
                                                                                            $str = $items->project_name;
                                                                                            $count = utf8_strlen($str);
                                                                                            create_str($count,$str,$items);
                                                                                            
                                                                                        ?></div></a></center>
                                                                                        <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                        <center>
                                                                                            @if(isset($viewcountg1)?$viewcountg1:'')
                                                                                                <?php $viewcount = $viewcountg1; ?>
                                                                                            @endif
                                                                                            <?php create_star($svgrateg1,$viewcount); ?>
                                                                                        </center>
                                                                                        
                                                                                    </div>
                                                                                @endforeach
                                                                                @else
                                                                                    <a href="#"><div class="column" ><div class="columnimg"><img src="img/fromimg.png"alt="" class="fromimg"></div></a>
                                                                                        <center><a href="#"><div class="textimg">ไม่มีข้อมูล</div></a></center>
                                                                                        <center><a href="#"><div class="textimg2">ไม่มีข้อมูล</div></a></center>
                                                                                    </div>
                                                                            @endif
                                                                            @if(isset($itemlg2)?$itemlg2:'')
                                                                                @foreach($itemlg2 as $items)
                                                                                    <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                        <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                        <?php 
                                                                                            $str = $items->project_name;
                                                                                            $count = utf8_strlen($str);
                                                                                            create_str($count,$str,$items);
                                                                                            
                                                                                        ?></div></a></center>
                                                                                        <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                        <center>
                                                                                            @if(isset($viewcountg2)?$viewcountg2:'')
                                                                                                <?php $viewcount = $viewcountg2; ?>
                                                                                            @endif
                                                                                            <?php create_star($svgrateg2,$viewcount); ?>
                                                                                        </center>
                                                                                    </div>
                                                                                @endforeach
                                                                                @else
                                                                                    <a href="#"><div class="column" ><div class="columnimg"><img src="img/fromimg.png"alt="" class="fromimg"></div></a>
                                                                                        <center><a href="#"><div class="textimg">ไม่มีข้อมูล</div></a></center>
                                                                                        <center><a href="#"><div class="textimg2">ไม่มีข้อมูล</div></a></center>
                                                                                    </div>
                                                                            @endif
                                                                            @if(isset($itemlg3)?$itemlg3:'')
                                                                                @foreach($itemlg3 as $items)
                                                                                    <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                        <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                        <?php 
                                                                                            $str = $items->project_name;
                                                                                            $count = utf8_strlen($str);
                                                                                            create_str($count,$str,$items);  
                                                                                        ?></div></a></center>
                                                                                        <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                        <center>
                                                                                            @if(isset($viewcountg3)?$viewcountg3:'')
                                                                                                <?php $viewcount = $viewcountg3; ?>
                                                                                            @endif
                                                                                            <?php create_star($svgrateg3,$viewcount); ?>
                                                                                        </center>
                                                                                    </div>
                                                                                @endforeach
                                                                                @else
                                                                                    <a href="#"><div class="column" ><div class="columnimg"><img src="img/fromimg.png"alt="" class="fromimg"></div></a>
                                                                                        <center><a href="#"><div class="textimg">ไม่มีข้อมูล</div></a></center>
                                                                                        <center><a href="#"><div class="textimg2">ไม่มีข้อมูล</div></a></center>
                                                                                    </div>
                                                                            @endif

                                                                        @elseif($status_g0=='1' & $status_g1=='0' & $status_g2=='0' & $status_g3=='1')
                                                                            @if(isset($itemlg0)?$itemlg0:'')
                                                                                @foreach($itemlg0 as $items)
                                                                                    <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                        <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                        <?php 
                                                                                            $str = $items->project_name;
                                                                                            $count = utf8_strlen($str);
                                                                                            create_str($count,$str,$items);  
                                                                                        ?></div></a></center>
                                                                                        <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                        <center>
                                                                                            @if(isset($viewcountg0)?$viewcountg0:'')
                                                                                                <?php $viewcount = $viewcountg0; ?>
                                                                                            @endif
                                                                                            <?php create_star($svgrateg0,$viewcount); ?>
                                                                                        </center>
                                                                                    </div>
                                                                                @endforeach
                                                                                @else
                                                                                    <a href="#"><div class="column" ><div class="columnimg"><img src="img/fromimg.png"alt="" class="fromimg"></div></a>
                                                                                        <center><a href="#"><div class="textimg">ไม่มีข้อมูล</div></a></center>
                                                                                        <center><a href="#"><div class="textimg2">ไม่มีข้อมูล</div></a></center>
                                                                                    </div>
                                                                            @endif
                                                                            @if(isset($itemlg3)?$itemlg3:'')
                                                                                @foreach($itemlg3 as $items)
                                                                                    <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                        <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                        <?php 
                                                                                            $str = $items->project_name;
                                                                                            $count = utf8_strlen($str);
                                                                                            create_str($count,$str,$items);  
                                                                                        ?></div></a></center>
                                                                                        <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                        <center>
                                                                                            @if(isset($viewcountg3)?$viewcountg3:'')
                                                                                                <?php $viewcount = $viewcountg3; ?>
                                                                                            @endif
                                                                                            <?php create_star($svgrateg3,$viewcount); ?>
                                                                                        </center>
                                                                                    </div>
                                                                                @endforeach
                                                                                @else
                                                                                    <a href="#"><div class="column" ><div class="columnimg"><img src="img/fromimg.png"alt="" class="fromimg"></div></a>
                                                                                        <center><a href="#"><div class="textimg">ไม่มีข้อมูล</div></a></center>
                                                                                        <center><a href="#"><div class="textimg2">ไม่มีข้อมูล</div></a></center>
                                                                                    </div>
                                                                            @endif
                                                                            @if(isset($itemlg4)?$itemlg4:'')
                                                                                @foreach($itemlg4 as $items)
                                                                                    <?php $status_g4 = $items->status_p;?>
                                                                                        @foreach($itemlg4 as $items)
                                                                                            <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                                <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                                <?php 
                                                                                                    $str = $items->project_name;
                                                                                                    $count = utf8_strlen($str);
                                                                                                    create_str($count,$str,$items);  
                                                                                                ?></div></a></center>
                                                                                                <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                                <center>
                                                                                                    @if(isset($viewcountg4)?$viewcountg4:'')
                                                                                                        <?php $viewcount = $viewcountg4; ?>
                                                                                                    @endif
                                                                                                    <?php create_star($svgrateg4,$viewcount); ?>
                                                                                                </center>
                                                                                            </div>
                                                                                        @endforeach
                                                                                @endforeach
                                                                                @else
                                                                                    <a href="#"><div class="column" ><div class="columnimg"><img src="img/fromimg.png"alt="" class="fromimg"></div></a>
                                                                                        <center><a href="#"><div class="textimg">ไม่มีข้อมูล</div></a></center>
                                                                                        <center><a href="#"><div class="textimg2">ไม่มีข้อมูล</div></a></center>
                                                                                    </div>
                                                                            @endif
                                                                            @if(isset($itemlg5)?$itemlg5:'')
                                                                                @foreach($itemlg5 as $items)
                                                                                    <?php $status_g5 = $items->status_p;?>
                                                                                        @foreach($itemlg5 as $items)
                                                                                        <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                                <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                                <?php 
                                                                                                    $str = $items->project_name;
                                                                                                    $count = utf8_strlen($str);
                                                                                                    create_str($count,$str,$items);  
                                                                                                ?></div></a></center>
                                                                                                <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                                <center>
                                                                                                    @if(isset($viewcountg5)?$viewcountg5:'')
                                                                                                        <?php $viewcount = $viewcountg5; ?>
                                                                                                    @endif
                                                                                                    <?php create_star($svgrateg5,$viewcount); ?>
                                                                                                </center>
                                                                                            </div>
                                                                                        @endforeach
                                                                                @endforeach
                                                                                @else
                                                                                    <a href="#"><div class="column" ><div class="columnimg"><img src="img/fromimg.png"alt="" class="fromimg"></div></a>
                                                                                        <center><a href="#"><div class="textimg">ไม่มีข้อมูล</div></a></center>
                                                                                        <center><a href="#"><div class="textimg2">ไม่มีข้อมูล</div></a></center>
                                                                                    </div>
                                                                            @endif

                                                                        @elseif($status_g0=='1' & $status_g1=='0' & $status_g2=='1' & $status_g3=='1')
                                                                            @if(isset($itemlg0)?$itemlg0:'')
                                    
                                                                                @foreach($itemlg0 as $items)
                                                                                    <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                        <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                        <?php 
                                                                                            $str = $items->project_name;
                                                                                            $count = utf8_strlen("$str");
                                                                                            create_str($count,$str,$items);  
                                                                                        ?></div></a></center>
                                                                                        <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                        <center>
                                                                                            @if(isset($viewcountg0)?$viewcountg0:'')
                                                                                                <?php $viewcount = $viewcountg0; ?>
                                                                                            @endif
                                                                                            <?php create_star($svgrateg0,$viewcount); ?>
                                                                                        </center>
                                                                                    </div>
                                                                                @endforeach
                                                                                @else
                                                                                    <a href="#"><div class="column" ><div class="columnimg"><img src="img/fromimg.png"alt="" class="fromimg"></div></a>
                                                                                        <center><a href="#"><div class="textimg">ไม่มีข้อมูล</div></a></center>
                                                                                        <center><a href="#"><div class="textimg2">ไม่มีข้อมูล</div></a></center>
                                                                                    </div>
                                                                            @endif
                                                                            @if(isset($itemlg1)?$itemlg1:'')
                                                                                @foreach($itemlg1 as $items)
                                                                                    <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                        <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                        <?php 
                                                                                            $str = $items->project_name;
                                                                                            $count = utf8_strlen("$str");
                                                                                            create_str($count,$str,$items);  
                                                                                        ?></div></a></center>
                                                                                        <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                        <center>
                                                                                            @if(isset($viewcountg1)?$viewcountg1:'')
                                                                                                <?php $viewcount = $viewcountg1; ?>
                                                                                            @endif
                                                                                            <?php create_star($svgrateg1,$viewcount); ?>
                                                                                        </center>
                                                                                    </div>
                                                                                @endforeach
                                                                                @else
                                                                                    <a href="#"><div class="column" ><div class="columnimg"><img src="img/fromimg.png"alt="" class="fromimg"></div></a>
                                                                                        <center><a href="#"><div class="textimg">ไม่มีข้อมูล</div></a></center>
                                                                                        <center><a href="#"><div class="textimg2">ไม่มีข้อมูล</div></a></center>
                                                                                    </div>
                                                                            @endif
                                                                            @if(isset($itemlg3)?$itemlg3:'')
                                                                                @foreach($itemlg3 as $items)
                                                                                    <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                        <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                        <?php 
                                                                                            $str = $items->project_name;
                                                                                            $count = utf8_strlen("$str");
                                                                                            create_str($count,$str,$items);  
                                                                                        ?></div></a></center>
                                                                                        <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                        <center>
                                                                                            @if(isset($viewcountg3)?$viewcountg3:'')
                                                                                                <?php $viewcount = $viewcountg3; ?>
                                                                                            @endif
                                                                                            <?php create_star($svgrateg3,$viewcount); ?>
                                                                                        </center>
                                                                                    </div>
                                                                                @endforeach
                                                                                @else
                                                                                    <a href="#"><div class="column" ><div class="columnimg"><img src="img/fromimg.png"alt="" class="fromimg"></div></a>
                                                                                        <center><a href="#"><div class="textimg">ไม่มีข้อมูล</div></a></center>
                                                                                        <center><a href="#"><div class="textimg2">ไม่มีข้อมูล</div></a></center>
                                                                                    </div>
                                                                            @endif
                                                                            @if(isset($itemlg4)?$itemlg4:'')
                                                                                @foreach($itemlg4 as $items)
                                                                                    <?php $status_g4 = $items->status_p;?>
                                                                                        @foreach($itemlg4 as $items)
                                                                                            <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                                <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                                <?php 
                                                                                                    $str = $items->project_name;
                                                                                                    $count = utf8_strlen("$str");
                                                                                                    create_str($count,$str,$items);  
                                                                                                ?></div></a></center>
                                                                                                <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                                <center>
                                                                                                    @if(isset($viewcountg4)?$viewcountg4:'')
                                                                                                        <?php $viewcount = $viewcountg4; ?>
                                                                                                    @endif
                                                                                                    <?php create_star($svgrateg4,$viewcount); ?>
                                                                                                </center>
                                                                                            </div>
                                                                                        @endforeach
                                                                                @endforeach
                                                                                @else
                                                                                    <a href="#"><div class="column" ><div class="columnimg"><img src="img/fromimg.png"alt="" class="fromimg"></div></a>
                                                                                        <center><a href="#"><div class="textimg">ไม่มีข้อมูล</div></a></center>
                                                                                        <center><a href="#"><div class="textimg2">ไม่มีข้อมูล</div></a></center>
                                                                                    </div>
                                                                            @endif

                                                                        @elseif($status_g0=='1' & $status_g1=='1' & $status_g2=='0' & $status_g3=='1')
                                                                            @if(isset($itemlg0)?$itemlg0:'')
                                                                                @foreach($itemlg0 as $items)
                                                                                    <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                        <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                        <?php 
                                                                                            $str = $items->project_name;
                                                                                            $count = utf8_strlen("$str");
                                                                                            create_str($count,$str,$items);  
                                                                                        ?></div></a></center>
                                                                                        <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                        <center>
                                                                                            @if(isset($viewcountg0)?$viewcountg0:'')
                                                                                                <?php $viewcount = $viewcountg0; ?>
                                                                                            @endif
                                                                                            <?php create_star($svgrateg0,$viewcount); ?>
                                                                                        </center>
                                                                                    </div>
                                                                                @endforeach
                                                                                @else
                                                                                    <a href="#"><div class="column" ><div class="columnimg"><img src="img/fromimg.png"alt="" class="fromimg"></div></a>
                                                                                        <center><a href="#"><div class="textimg">ไม่มีข้อมูล</div></a></center>
                                                                                        <center><a href="#"><div class="textimg2">ไม่มีข้อมูล</div></a></center>
                                                                                    </div>
                                                                            @endif
                                                                            @if(isset($itemlg1)?$itemlg1:'')
                                                                                @foreach($itemlg1 as $items)
                                                                                    <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                        <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                        <?php 
                                                                                            $str = $items->project_name;
                                                                                            $count = utf8_strlen("$str");
                                                                                            create_str($count,$str,$items);  
                                                                                        ?></div></a></center>
                                                                                        <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                        <center>
                                                                                            @if(isset($viewcountg1)?$viewcountg1:'')
                                                                                                <?php $viewcount = $viewcountg1; ?>
                                                                                            @endif
                                                                                            <?php create_star($svgrateg1,$viewcount); ?>
                                                                                        </center>
                                                                                    </div>
                                                                                @endforeach
                                                                                @else
                                                                                    <a href="#"><div class="column" ><div class="columnimg"><img src="img/fromimg.png"alt="" class="fromimg"></div></a>
                                                                                        <center><a href="#"><div class="textimg">ไม่มีข้อมูล</div></a></center>
                                                                                        <center><a href="#"><div class="textimg2">ไม่มีข้อมูล</div></a></center>
                                                                                    </div>
                                                                            @endif
                                                                            @if(isset($itemlg2)?$itemlg2:'')
                                                                                @foreach($itemlg2 as $items)
                                                                                    <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                        <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                        <?php 
                                                                                            $str = $items->project_name;
                                                                                            $count = utf8_strlen("$str");
                                                                                            create_str($count,$str,$items);  
                                                                                        ?></div></a></center>
                                                                                        <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                        <center>
                                                                                            @if(isset($viewcountg2)?$viewcountg2:'')
                                                                                                <?php $viewcount = $viewcountg2; ?>
                                                                                            @endif
                                                                                            <?php create_star($svgrateg2,$viewcount); ?>
                                                                                        </center>
                                                                                    </div>
                                                                                @endforeach
                                                                                @else
                                                                                    <a href="#"><div class="column" ><div class="columnimg"><img src="img/fromimg.png"alt="" class="fromimg"></div></a>
                                                                                        <center><a href="#"><div class="textimg">ไม่มีข้อมูล</div></a></center>
                                                                                        <center><a href="#"><div class="textimg2">ไม่มีข้อมูล</div></a></center>
                                                                                    </div>
                                                                            @endif
                                                                            @if(isset($itemlg4)?$itemlg4:'')
                                                                                @foreach($itemlg4 as $items)
                                                                                    <?php $status_g4 = $items->status_p;?>
                                                                                        @foreach($itemlg4 as $items)
                                                                                            <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                                <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                                <?php 
                                                                                                    $str = $items->project_name;
                                                                                                    $count = utf8_strlen("$str");
                                                                                                    create_str($count,$str,$items);  
                                                                                                ?></div></a></center>
                                                                                                <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                                <center>
                                                                                                    @if(isset($viewcountg4)?$viewcountg4:'')
                                                                                                        <?php $viewcount = $viewcountg4; ?>
                                                                                                    @endif
                                                                                                    <?php create_star($svgrateg4,$viewcount); ?>
                                                                                                </center>
                                                                                            </div>
                                                                                        @endforeach
                                                                                @endforeach
                                                                                @else
                                                                                    <a href="#"><div class="column" ><div class="columnimg"><img src="img/fromimg.png"alt="" class="fromimg"></div></a>
                                                                                        <center><a href="#"><div class="textimg">ไม่มีข้อมูล</div></a></center>
                                                                                        <center><a href="#"><div class="textimg2">ไม่มีข้อมูล</div></a></center>
                                                                                    </div>
                                                                            @endif

                                                                        @elseif($status_g0=='1' & $status_g1=='0' & $status_g2=='0' & $status_g3=='0')
                                                                            @if(isset($itemlg0)?$itemlg0:'')
                                                                                @foreach($itemlg0 as $items)
                                                                                    <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                        <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                        <?php 
                                                                                            $str = $items->project_name;
                                                                                            $count = utf8_strlen("$str");
                                                                                            create_str($count,$str,$items);  
                                                                                        ?></div></a></center>
                                                                                        <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                        <center>
                                                                                            @if(isset($viewcountg0)?$viewcountg0:'')
                                                                                                <?php $viewcount = $viewcountg0; ?>
                                                                                            @endif
                                                                                            <?php create_star($svgrateg0,$viewcount); ?>
                                                                                        </center>
                                                                                    </div>
                                                                                @endforeach
                                                                                @else
                                                                                    <a href="#"><div class="column" ><div class="columnimg"><img src="img/fromimg.png"alt="" class="fromimg"></div></a>
                                                                                        <center><a href="#"><div class="textimg">ไม่มีข้อมูล</div></a></center>
                                                                                        <center><a href="#"><div class="textimg2">ไม่มีข้อมูล</div></a></center>
                                                                                    </div>
                                                                            @endif
                                                                            @if(isset($itemlg4)?$itemlg4:'')
                                                                                @foreach($itemlg4 as $items)
                                                                                    <?php $status_g4 = $items->status_p;?>
                                                                                        @foreach($itemlg4 as $items)
                                                                                            <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                                <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                                <?php 
                                                                                                    $str = $items->project_name;
                                                                                                    $count = utf8_strlen("$str");
                                                                                                    create_str($count,$str,$items);  
                                                                                                ?></div></a></center>
                                                                                                <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                                <center>
                                                                                                    @if(isset($viewcountg4)?$viewcountg4:'')
                                                                                                        <?php $viewcount = $viewcountg4; ?>
                                                                                                    @endif
                                                                                                    <?php create_star($svgrateg4,$viewcount); ?>
                                                                                                </center>
                                                                                            </div>
                                                                                        @endforeach
                                                                                @endforeach
                                                                                @else
                                                                                    <a href="#"><div class="column" ><div class="columnimg"><img src="img/fromimg.png"alt="" class="fromimg"></div></a>
                                                                                        <center><a href="#"><div class="textimg">ไม่มีข้อมูล</div></a></center>
                                                                                        <center><a href="#"><div class="textimg2">ไม่มีข้อมูล</div></a></center>
                                                                                    </div>
                                                                            @endif
                                                                            @if(isset($itemlg5)?$itemlg5:'')
                                                                                @foreach($itemlg5 as $items)
                                                                                    <?php $status_g5 = $items->status_p;?>
                                                                                        @foreach($itemlg6 as $items)
                                                                                        <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                            <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                            <?php 
                                                                                                $str = $items->project_name;
                                                                                                $count = utf8_strlen("$str");
                                                                                                create_str($count,$str,$items);  
                                                                                            ?></div></a></center>
                                                                                            <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                            <center>
                                                                                                @if(isset($viewcountg5)?$viewcountg5:'')
                                                                                                    <?php $viewcount = $viewcountg5; ?>
                                                                                                @endif
                                                                                                <?php create_star($svgrateg5,$viewcount); ?>
                                                                                            </center>
                                                                                        </div>
                                                                                        @endforeach
                                                                                @endforeach
                                                                                @else
                                                                                    <a href="#"><div class="column" ><div class="columnimg"><img src="img/fromimg.png"alt="" class="fromimg"></div></a>
                                                                                        <center><a href="#"><div class="textimg">ไม่มีข้อมูล</div></a></center>
                                                                                        <center><a href="#"><div class="textimg2">ไม่มีข้อมูล</div></a></center>
                                                                                    </div>
                                                                            @endif
                                                                            @if(isset($itemlg6)?$itemlg6:'')
                                                                                @foreach($itemlg6 as $items)
                                                                                    <?php $status_g6 = $items->status_p;?>
                                                                                        @foreach($itemlg6 as $items)
                                                                                            <a href="itemdetaliBD/{{$items->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $items->logo;?>" alt="" class="fromimg"></div></a>
                                                                                                <center><a href="itemdetaliBD/{{$items->project_id}}"><div class="textimg">
                                                                                                <?php 
                                                                                                    $str = $items->project_name;
                                                                                                    $count = utf8_strlen("$str");
                                                                                                    create_str($count,$str,$items);
                                                                                                     
                                                                                                ?></div></a></center>
                                                                                                <center><a href="itemtypeBD/{{$items->type_id}}"><div class="textimg2"><?php echo $items->type_name;?></div></a></center>
                                                                                                <center>
                                                                                                    @if(isset($viewcountg6)?$viewcountg6:'')
                                                                                                        <?php $viewcount = $viewcountg6; ?>
                                                                                                    @endif
                                                                                                    <?php create_star($svgrateg6,$viewcount); ?>
                                                                                                </center>
                                                                                            </div>
                                                                                        @endforeach
                                                                                @endforeach
                                                                                @else
                                                                                    <a href="#"><div class="column" ><div class="columnimg"><img src="img/fromimg.png"alt="" class="fromimg"></div></a>
                                                                                        <center><a href="#"><div class="textimg">ไม่มีข้อมูล</div></a></center>
                                                                                        <center><a href="#"><div class="textimg2">ไม่มีข้อมูล</div></a></center>
                                                                                    </div>
                                                                            @endif
                                                                @endif
                                                            @endforeach
                                                    @endforeach
                                            @endforeach
                                        @endforeach
                                    </div>
                                </div> 
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
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
            elseif($count>80 & $count <150){
                $strcount = substr($str,0,-65);
                $strcount1 = substr($strcount,0,-50);
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

        function create_star($svgrate,$viewcount){
            if(isset($svgrate)?$svgrate:''){
                if($svgrate < 2 & $svgrate> 0){
                    echo'<div class="rating">';
                        check_rating($svgrate);
                        if(isset($svgrate)?$svgrate:''){
                            echo'<span class=""> ('.(round($svgrate, $precision = 1)).')</span><span class="countview">'.$viewcount.'</span><i class="fas fa-user i-view" style="color: #A9A9A9;"></i>';
                        }
                    echo'</div>';
                }
                
                elseif($svgrate >= 2 & $svgrate < 3) {
                    echo'<div class="rating">';
                        check_rating($svgrate);
                        if(isset($svgrate)?$svgrate:''){
                            echo'<span class=""> ('.(round($svgrate, $precision = 1)).')</span><span class="countview">'.$viewcount.'</span><i class="fas fa-user i-view" style="color: #A9A9A9;"></i>';
                        }
                    echo '</div>';
                }
                
                elseif($svgrate >= 3 & $svgrate < 4) {
                    echo'<div class="rating">';
                        check_rating($svgrate);
                        if(isset($svgrate)?$svgrate:''){
                            echo'<span class=""> ('.(round($svgrate, $precision = 1)).')</span><span class="countview">'.$viewcount.'</span><i class="fas fa-user i-view" style="color: #A9A9A9;"></i>';
                        }
                    echo '</div>';
                }
                
                elseif($svgrate >= 4 & $svgrate < 5){
                    echo'<div class="rating">';
                        check_rating($svgrate);
                        if(isset($svgrate)?$svgrate:''){
                            echo'<span class=""> ('.(round($svgrate, $precision = 1)).')</span><span class="countview">'.$viewcount.'</span><i class="fas fa-user i-view" style="color: #A9A9A9;"></i>';
                        } 
                    echo'</div>';}
                
                elseif($svgrate >= 5){
                    echo'<div class="rating">';
                        check_rating($svgrate);
                        if(isset($svgrate)?$svgrate:''){
                            echo'<span class=""> ('.(round($svgrate, $precision = 1)).')</span><span class="countview">'.$viewcount.'</span><i class="fas fa-user i-view" style="color: #A9A9A9;"></i>';
                        }
                    echo'</div>';
                    }
                else{
                    echo'<div class="rating">';
                        check_rating($svgrate);
                        if(isset($svgrate)?$svgrate:''){
                            echo'<span class=""> ('.(round($svgrate, $precision = 1)).')</span>
                            <div>
                                <span class="countview">'.$viewcount.'</span><i class="fas fa-user i-view" style="color: #A9A9A9;"></i>
                            </div>';
                        }
                    echo '</div>';}
            
                }
            else{
                echo'<div class="rating">';
                    check_rating(0);  echo'<span class="">(0)</span><span class="countview">'.$viewcount.'</span><i class="fas fa-user i-view" style="color: #A9A9A9;"></i>';
                echo'</div>';
            }    
        }
      
    ?>

        