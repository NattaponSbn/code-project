@extends('layouts.mainhomeadmin')
@section('content')

 <!-- เเสดงเเจ้งเตือนว่าข้อมูลถูกลบเรียบร้อยเเล้ว -->
 @if(\Session::has('success')) 
                    <div class="alert alert-success"> 
                    <p>{{ \Session::get('success') }}</p> 
                    </div> 
                @endif 

                
        @if ($message = Session::get('successappproject'))
            <script>
            swal({
                title: "เรียบร้อย",
                text: "ข้อมูลได้บันทึกเรียบร้อยเเล้ว",
                icon: "success",
                button: "ตกลง",
            });
            </script>
        @endif

        @if ($message = Session::get('delete_project'))
            <script>
            swal({
                title: "ลบข้อมูลเรียบร้อย",
                icon: "success",
                button: "ตกลง",
            });
            </script>
        @endif
        
        <main class="app-content">
            <div class="app-title" style="width: 100%;margin-left:1px;">
                <div>
                    <h1><i class="fa fa-th-list"></i> รายละเอียดผลงาน</h1>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                    <li class="breadcrumb-item">ตาราง</li>
                    <li class="breadcrumb-item active"><a href="#">รายละเอียดผลงาน</a></li>
                </ul>
            </div>
        
            <div class="row">
            
                <div class="col-md-12">
                    <div class="tile">
                    <h2>ผลงงานปริญญาตรี</h2>
                        <div class="tile-body">
                            <div class="table-responsive-a">
                                <table id="example" class="table table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ลำดับที่</th>
                                            <th>ชื่อผลงาน</th>
                                            <th>คำสำคัญ</th>
                                            <th>บทคัดย่อ</th>
                                            <th>ประเภทเอกสาร</th>
                                            <th>เจ้าของ</th>
                                            <th>ผู้สร้าง</th>
                                            <th>โลโก้</th>
                                            <th>ปีที่จัดทำเอกสาร</th>
                                            <th>จัดการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                        @foreach($project as $data)
                                        
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$data->project_name}}</td>
                                                <td>{{$data->keyword_project1}} {{$data->keyword_project2}} {{$data->keyword_project3}} {{$data->keyword_project4}}</td>
                                                <td>{{$data->des_project}}</td>
                                                <td>{{$data->type_name}}</td>
                                                <td>{{$data->name}}</td>
                                                <td>{{$data->status}}</td>
                                                <td><img src="project/img_logo/{{$data->logo}}" alt="" width="100" height="100"></td>
                                                <td>{{$data->year}}</td>
                                                
                                                
                                                <td>
                                                    <a onClick="return confirm('การเเก้ไขข้อมูลจะต้องเช็คความถูกต้องทุกครั้งก่อนที่จะทำการบันทึก')" href="projectviewbd/{{$data->project_id}}"><button type="submit"><img src="img/edit.png" alt="" class="imgdata"></button></a>
                                                    <br>
                                                    <a onClick="return confirm('คุณต้องการลบข้อมูลใช่หรือไม่?')" href="delete_p_bd/{{$data->project_id}}"><button type="submit"><img  src="img/trash.png" alt="" class="imgdata"></button></a>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div align="right" style="margin:0 0 5px 0;"><a href="addBD" class="btn btn-success">เพิ่มข้อมูล</a></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                    <h2>ผลงงานปริญญาตรี(ผู้ดูเเลระบบ)</h2>
                        <div class="tile-body">
                            <div class="table-responsive-a">
                                <table id="example2" class="table table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ลำดับที่</th>
                                            <th>ชื่อผลงาน</th>
                                            <th>คำสำคัญ</th>
                                            <th>บทคัดย่อ</th>
                                            <th>ประเภทเอกสาร</th>
                                            <th>เจ้าของ</th>
                                            <th>ผู้สร้าง</th>
                                            <th>โลโก้</th>
                                            <th>ปีที่จัดทำเอกสาร</th>
                                            <th>จัดการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                        @foreach($projectA as $data)
                                        
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$data->project_name}}</td>
                                                <td>{{$data->keyword_project1}} {{$data->keyword_project2}} {{$data->keyword_project3}} {{$data->keyword_project4}}</td>
                                                <td>{{$data->des_project}}</td>
                                                <td>{{$data->type_name}}</td>
                                                <td>{{$data->owner_name}}</td>
                                                <td>{{$data->status}}</td>
                                                <td><img src="project/img_logo/{{$data->logo}}" alt="" width="100" height="100"></td>
                                                <td>{{$data->year}}</td>
                                                
                                                
                                                <td>
                                                    <a onClick="return confirm('การเเก้ไขข้อมูลจะต้องเช็คความถูกต้องทุกครั้งก่อนที่จะทำการบันทึก')" href="projectviewbd_A/{{$data->project_id}}"><button type="submit"><img src="img/edit.png" alt="" class="imgdata"></button></a>
                                                    <br>
                                                    <a onClick="return confirm('คุณต้องการลบข้อมูลใช่หรือไม่?')" href="delete_p_bd/{{$data->project_id}}"><button type="submit"><img  src="img/trash.png" alt="" class="imgdata"></button></a>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

       
        </main>
@endsection
