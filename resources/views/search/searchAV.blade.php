@extends('layouts.mainhomeBD')

@section('content')
<br><br>
<div class="containersearch ">
    <h1 class="text-heder-search">ค้นหาเเบบละเอียด</h1>
        <form action="/action_page.php" class="text-sum">
            <label for="search" class="search-text text-left-search" >ต้องการสือบค้น:</label>
            <center><input class=" form-control"  type="text" aria-label="Search" placeholder="ค้นหา"></center>
           
            <div class="checkbox check-top">
                <input type="checkbox" value=""><label class="checkbox-left">ขึ้นต้น</label>
                <input type="checkbox" value=""><label class="checkbox-left">คำสำคัญ</label>
                
            </div>
            
            <!-- <label>ประเภท</label> -->
            <select id="inputState" class="form-control input-group-size">
                <option selected>ประเภท</option>
                <option>...</option>
            </select>
            <!-- <label>หมวดหมู่</label> -->
            <select id="inputState" class="form-control input-group-size input-group-top">
                <option selected>หมวดหมู่</option>
                <option>...</option>
            </select>
            <!-- <label>ชนิดเอกสาร</label> -->
            <select id="inputState" class="form-control input-group-size input-group-topp">
                <option selected>ชนิดเอกสาร</option>
                <option>...</option>
            </select>
            <!-- <label>ปีที่จัดทำเอกสาร</label> -->
            <select id="inputState" class="form-control input-group-sizee input-group-toppp">
                <option selected>สาขา</option>
                <option>...</option>
            </select>
            <!-- <label>สาขา</label> -->
            <select id="inputState" class="form-control input-group-size input-group-topppp">
                <option selected>ปีที่จัดทำเอกสาร</option>
                <option>...</option>
            </select>
            <div class="input-group-sizeee input-group-sizeee-left">
                
                <input type="text" class="form-control form-control--sizeee-left" placeholder="ผู้จัดทำ">
                
                <input type="text" class="form-control form-control--sizeee-left" placeholder="ที่ปรึกษา">
            </div>
            <center><button class="btn btn-primary btn-layout-s" type="submit">ค้นหา</button></center>
        
        </form>
</div>



@endsection