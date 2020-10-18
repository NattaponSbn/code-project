@extends('layouts.mainhomeadmin')
        

        <main class="app-content">
            <div class="app-title">
                <div>
                    <h1><i class="fa fa-th-list"></i>รายละเอียดผลงาน</h1>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item active"><a href="#">รายละเอียดผลงาน</a></li>
                </ul>
            </div>
            

                <!-- เเสดงเเจ้งเตือนว่าข้อมูลถูกลบเรียบร้อยเเล้ว -->
                @if(\Session::has('success')) 
                    <div class="alert alert-success"> 
                    <p>{{ \Session::get('success') }}</p> 
                    </div> 
                @endif 

            <div class="row">
                <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                    <div class="table-responsive">
                    
                        <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>ลำดับที่</th>
                                <th>ชื่อผลงาน</th>
                                <th>คำสำคัญ</th>
                                <th>บทคัดย่อ</th>
                                <th>ประเภทเอกสาร</th>
                                <th>สถานะ</th>
                                
                                <th>วันเดือนปี</th>
                                
                                <th>จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dataproject as $dataprojectuser)
                            <tr>
                                <td>{{$dataprojectuser->project_id}}</td>
                                <td>{{$dataprojectuser->project_name}}</td>
                                <td>{{$dataprojectuser->keyword_project}}</td>
                                <td>{{$dataprojectuser->des_project}}</td>
                                <td>{{$dataprojectuser->type_project}}</td>
                                <td>1</td>
                                
                                <td>1</td>
                                
                                <td>
                                    <a onClick="return confirm('การเเก้ไขข้อมูลจะต้องเช็คความถูกต้องทุกครั้งก่อนที่จะทำการบันทึก')" href=""><button type="submit"><img src="img/edit.png" alt="" class="imgdata"></button></a>
                                    
                                    <a onClick="return confirm('คุณต้องการลบข้อมูลใช่หรือไม่?')" href="delete/{{ $dataprojectuser->project_id }}"><button type="submit"><img  src="img/trash.png" alt="" class="imgdata"></button></a>

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

