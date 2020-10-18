@extends('layouts.mainhomeBD')

@section('content')

<div class="containersearch" >
            <div class="container" >
                <h1 class="text-heder-search"><div style="margin-top: 5%;">ค้นหาเเบบละเอียด<i style="margin-left: 10px;color: #D9A327;background-color:582B9E;" class="fas fa-book-open"></i></h1>
                <form action="/AVsearch" class="text-sum" method="GET">
                    <div class="container">
                        <label for="search" class="" style="font-size: 17px;">ต้องการสืบค้น:<span style="color: red;font-size: 20;">* <span class="danger_d">ป้อนชื่อเรื่องหรือคำสัญที่ต้องการค้นหา</span></span></label>
                        <div class="form-group">
                            <input class="form-control" name="detailsearch" id="detailsearch" style="font-size: 17px;" type="text" aria-label="Search" placeholder="ค้นหา"></>
                        </div>
                        <div class="row">
                            <!-- <label>ประเภท</label> -->
                            <div class="col">
                                <label for="search" class="" style="font-size: 17px;">ประเภท:</label>
                                <div class="form-group">
                                    <select name="genre_project" id="genre_project" class="form-control col-md-12" style="font-size: 17px;">
                                    <option value="" disabled selected>เลือกประเภท</option>
                                    @foreach($chk_genre as $genre)
                                        <option value="{{$genre->genre_id}}">{{$genre->genre_name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- <label>หมวดหมู่</label> -->
                            <div class="col">
                                <label for="search" class="" style="font-size: 17px;">หมวดหมู่:</label>
                                <div class="form-group">
                                    <select name="category_project" id="category_project" class="form-control col-md-12 " style="font-size: 17px;">
                                    <option value="" disabled selected>เลือกหมวดหมู่</option>
                                    @foreach($chk_category as $category)
                                        <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- <label>ชนิดเอกสาร</label> -->
                            <div class="col">
                                <label for="search" class="" style="font-size: 17px;">ชนิดเอกสาร:</label>
                                <div class="form-group">
                                    <select name="type_project" id="type_project" class="form-control col-md-12 " style="font-size: 17px;">
                                    <option value="" disabled selected>เลือกชนิดเอกสาร</option>
                                    @foreach($chk_type as $type)
                                        <option value="{{$type->type_id}}">{{$type->type_name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- <label>ปีที่จัดทำเอกสาร</label> -->
                            <div class="col">
                                <label for="search" class="" style="font-size: 17px;">สาขาวิชา:</label>
                                <div class="form-group">
                                    <select name="branch_project" id="branch_project" class="form-control col-md-12" style="font-size: 17px;">
                                    <option value="" disabled selected>เลือกสาขา</option>
                                    @foreach($chk_branch as $branch)
                                        <option value="{{$branch->branch_id}}">{{$branch->branch_name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- <label>สาขา</label> -->
                            <div class="col">
                                <label for="search" class="" style="font-size: 17px;">ปีที่จัดทำเอกสาร:</label>
                                <div class="form-group">
                                    <select name="year_project" id="year_project" class="form-control col-md-12" style="font-size: 17px;">
                                    <option value="" disabled selected>เลือกปี</option>
                                    @foreach($chk_year as $year)
                                        <option value="{{$year->NO_Y}}">{{$year->year}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="center" style="margin-top: 15px;">
                            <div class="form-group">
                                <center><label for="text" class="" style="font-size: 17px;">ผู้จัดทำ</label></center>
                                <center><input type="text" style="font-size: 17px;" class="form-control  col-md-9" placeholder="ผู้จัดทำ"></center>
                            </div>
                            <div class="form-group">
                                <center><label for="text" class="" style="font-size: 17px;">ที่ปรึกษา</label></center>
                                <center><input type="text" style="font-size: 17px;" class="form-control  col-md-9" placeholder="ที่ปรึกษา"></center>
                            </div>
                        </div>

                    </div>
                    <center><span style="color: red;font-size: 20;">*<span class="danger_d">(ก่อนค้นหากรุณาเช็คอักขระให้เรียบร้อย)</span></span></center>
                    <center><button class="btn btn-primary btn-layout-s" type="submit"  style="font-size: 18px;background-color: #582B9E;">ค้นหาละเอียด<i style="margin-left: 10px;" class="fas fa-search fa-1x"></i></button></center>
                </form>
            </div>

        </div>

            
            <script class="text/javascript">
            $('#type_project').change(function(){
                if($(this).val()!=""){
                    var type_project=$(this).val();
                    var _token=$('input[name="_token"]').val();
                    $.ajax({
                        url:"{{route('AVsearch')}}",
                        method:'GET',
                        data:{type_project:type_project,_token:_token}
                    })
                }
            });
            $('#genre_project').change(function(){
                if($(this).val()!=""){
                    var genre_project=$(this).val();
                    var _token=$('input[name="_token"]').val();
                    $.ajax({
                        url:"{{route('AVsearch')}}",
                        method:'GET',
                        data:{genre_project:genre_project,_token:_token}
                    })
                }
            });
            $('#category_project').change(function(){
                if($(this).val()!=""){
                    var category_project=$(this).val();
                    var _token=$('input[name="_token"]').val();
                    $.ajax({
                        url:"{{route('AVsearch')}}",
                        method:'GET',
                        data:{category_project:category_project,_token:_token}
                    })
                }
            });
            $('#branch_project').change(function(){
                if($(this).val()!=""){
                    var branch_project=$(this).val();
                    var _token=$('input[name="_token"]').val();
                    $.ajax({
                        url:"{{route('AVsearch')}}",
                        method:'GET',
                        data:{branch_project:branch_project,_token:_token}
                    })
                }
            });
            $('#year_project').change(function(){
                if($(this).val()!=""){
                    var branch_project=$(this).val();
                    var _token=$('input[name="_token"]').val();
                    $.ajax({
                        url:"{{route('AVsearch')}}",
                        method:'GET',
                        data:{branch_project:year_project,_token:_token}
                    })
                }
            });
            </script>
        </form>

</div>



@endsection