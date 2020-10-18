@extends('layouts.mainhomeadmin')
        

        <main class="app-content">
            <div class="app-title" style="width: 100%;margin-left:1px;">
                <div>
                    <h1><i class="fa fa-th-list"></i> รายละเอียดดูเเลระบบ</h1>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                    <li class="breadcrumb-item">ตาราง</li>
                    <li class="breadcrumb-item active"><a href="#">รายละเอียดผู้ดูเเลระบบ</a></li>
                </ul>
            </div>
            
            

                <!-- เเสดงเเจ้งเตือนว่าข้อมูลถูกลบเรียบร้อยเเล้ว -->
                @if(\Session::has('success')) 
                    <div class="alert alert-success"> 
                    <p>{{ \Session::get('success') }}</p> 
                    </div> 
                @endif 

            <div align="right" style="margin:0 0 5px 0;"><a href="adduser" class="btn btn-success">เพิ่มข้อมูล</a></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-body">
                            <div class="table-responsive-a">
                                <table id="example" class="table table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ลำดับที่</th>
                                            <th>ชื่อนามสุกล</th>
                                            <th>เพศ</th>
                                            <th>จังหวัด</th>
                                            <th>อีเมล</th>
                                            <th>ชื่อผู้ใช้</th>
                                            <th>สถานะ</th>
                                            
                                            <!-- <th>วันเดือนปี</th> -->
                                            <th>โปรไฟล์</th>
                                            <th>จัดการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($dataadmin as $dataadmin)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$dataadmin->admin_name}}</td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>{{$dataadmin->admin_email}}</td>
                                                <td>{{$dataadmin->admin_user}}</td>
                                                <td>{{$dataadmin->status}}</td>
                                                <td><img src="img_admin/{{$dataadmin->pathimg}}" alt="" width="100" height="100"></td>
                                                
                                                <td>
                                                    <a onClick="return confirm('การเเก้ไขข้อมูลจะต้องเช็คความถูกต้องทุกครั้งก่อนที่จะทำการบันทึก')" href="edituseradmin/{{$dataadmin->admin_id}}"><button type="submit"><img src="img/edit.png" alt="" class="imgdata"></button></a>
                                                    
                                                    <a onClick="return confirm('คุณต้องการลบข้อมูลใช่หรือไม่?')" href=""><button type="submit"><img  src="img/trash.png" alt="" class="imgdata"></button></a>

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

