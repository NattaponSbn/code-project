<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('homeBD', 'ProjectController@itemproject');

Route::view('index', 'homeBD');




Route::get('intest', function () {
    return view('test1');
});

Route::post('keyword_project', 'ProjectController@keyword')->name('keyword_project');
Route::post('des_project', 'ProjectController@des_project')->name('des_project');
    
    //ส่งค่าให้ไปตัดคีย์
    Route::get('adddes_project', 'ProjectController@getdes_project')->name('adddes_project');
    //เรียกค่ากลับมาโชว์
    Route::get('list_keyword', 'ProjectController@list_keyword')->name('list_keyword');

Route::get('input_rate', 'ProjectController@test');
// Route::get('test_input', function () {
//     return view('api.page');
// });


    //search engine
    //Route::get('/search1', 'AutocompleteController@index');
    Route::get('/search', 'AutocompleteController@easysearch')->name('search');
    Route::get('/AVsearch', 'AutocompleteController@detailsearch')->name('AVsearch');
    Route::get('/autocomplete/fetch', 'AutocompleteController@dropdownsearch')->name('autocomplete.dropdownsearch');
    Route::get('SearchAdvance', 'AutocompleteController@detailview')->name('SearchAdvance');
    Route::get('dropdownsearch', 'AutocompleteController@dropdown')->name('dropdownsearch');
    // Route::get('search', function () {
    //     return view('beforesearchBD');
    // });



Route::get('test', function () {
    return view('testapi');
});


// Route::get('homeMDD', 'ProfileMDDController@show');
Route::get('homeMDD', 'Project_MDDController@itemproject');
// Route::get('homeMDD', 'ProfileMDDController@show');

Route::get('addprojectmdd', 'Project_MDDController@viewadd');
Route::post('insertprojectmdd', 'Project_MDDController@insertproject')->name('insertproject');
Route::post('editprojectmdd', 'Project_MDDController@editproject');
Route::get('showdataprojectmdd', 'Project_MDDController@showproject');
Route::get('projectviewmdd', 'Project_MDDController@project');

// Route::get('db', 'ListdataController@addproject');

// page BD
    
    Route::get('Newarrival', 'ListdataController@Newarrivaldata');
    Route::get('Popular', 'ListdataController@popular');
    Route::get('itemtypeBD/{type_id}', 'ProjectController@typeitem');
    Route::get('pageIot', 'ListdataController@dataIot');

// page MDD
    Route::get('pursue', 'ListdataController@pursue');
    Route::post('download_m', 'Project_MDDController@downloadfile');

// เลือกต่างๆ
    //ชนิดเอกสาร
    Route::get('typeproject/{type_id}', 'ListdataController@type');

    //หมวดหมู่
    Route::get('category/{category_id}', 'ListdataController@category');
    
    //ประเภท
    Route::get('genre/{genre_id}', 'ListdataController@genre');
    

// Route::get('Popular', function () {
//     return view('pagewedsum.pagePopular');
// });

Route::get('wed', function () {
    return view('wedType.wed');
});


Route::get('copyapi', function () {
    return view('api.page');
});

Route::get('testapi', function () {
    return view('api.copy');
});

Route::get('copylek', function () {
    return view('api.example_asynchronous');
});

Route::get('prepostseos', function () {
    return view('api.prepostseo');
});

Route::get('wedapp', function () {
    return view('wedType.wed&app');
});

Route::get('app', function () {
    return view('wedType.app');
});

Route::get('game', function () {
    return view('wedType.game');
});

Route::get('testwork', function () {
    return view('testwork');
});

// page homemain

    //itemclcikBD
    Route::get('itemdetaliBD','ProjectController@index');
    Route::get('itemdetaliBD/{project_id}','ProjectController@detailitem');
    Route::get('itemtypeBD/{type_id}','ProjectController@typeitem');
    //itemclcikMDD
    Route::get('itemdetaliMDD','ProjectController@indexmdd');
    Route::get('itemdetaliMDD/{project_m_id}','ProjectController@detailitemmdd');
    Route::get('itemtypeMDD/{type_id}','ProjectController@detailitem');


Route::get('Detailproject', function () {
    return view('project.detailproject');
});


Route::get('addproject', 'ProjectController@viewadd');
Route::post('insertproject', 'ProjectController@insertproject')->name('insertproject');
Route::post('editproject', 'ProjectController@editproject');//เเก้ไขข้อมูลโปรเจค นิสิตเป็นคนเเก้ไข
Route::get('showdataproject', 'ProjectController@showproject');
Route::get('projectview/{project_id}', 'ProjectController@project');//ข้อมูลโปรเจคข้องนิสิต
Route::get('listdetil','ListdataController@listdetil');//listdetil ของนิสิต


Route::post('download', 'ProjectController@downloadfile');

Route::get('project', function () {
    return view('detailproject');
});

// Route::get('admin', 'ProjectController@itemproject');
// Route::get('homeadmin', 'profileadminController@pageadmin');
Route::get('homeadmin', 'AdminController@datadetil');


Route::get('teststap', function () {
    return view('teststap');
});

// Route::get('profile', function () {
//     return view('profileuser');
// });

// Route::get('logout', 'HomeController@index')->name('logout');

// Auth::routes();


Route::view('register','auth.register');
Route::post('registers','RegisterController@register');

Route::get('dbconnect', function () {
    return view('dbconnect');
});

Route::post('loginBD', function () {
    return view('session.session-loginBD');
});

Route::post('loginMDD', function () {
    return view('session.session-loginMDD');
});

// Route::post('insertproject', function () {
//     return view('insertproject');
// });

Route::post('logout', function () {
    return view('session.logout');
});

// Route::get('login', 'logintestController@index');
Route::post('logintestt', 'logintestController@chkauthen');

Route::get('home', 'HomeController@index')->name('home');


// โชว์ข้อมูล
Route::get('dataview', 'ListdataController@Datalist');
Route::get('viewadmin', 'ListdataController@Datalistadmin');
Route::get('viewproject', 'ProjectController@showdata');
Route::get('viewprojectmdd', 'ProjectController@showdatamdd');
// ลบข้อมูล
Route::get('delete/{id}', 'ListdataController@destroy');
Route::get('delete/{id}', 'DataadminController@destroy');
Route::get('delete/{id}', 'ListdataController@deleteproject');

// Route::get('edit/{id}', 'DatauserController@edit');


// Route::get('update/{id}', 'DatauserController@update');

Route::view('adduser', 'createdatauser');
Route::post('adddata', 'ListdataController@adduser');

// USER..

    // โปรไฟล์ผู้ใช้ทั่วไป
    Route::get('profile','ProfileController@show');
    Route::post('profileupdate', 'ProfileController@store')->name('update');
    
    

// ADMIN...

    // โปรไฟล์ผู้ดูเเลระบบ
    Route::get('profileadmin','profileadminController@show');
    Route::post('profileupdateadmin', 'profileadminController@store')->name('update');

    // อัพเดทโปรเจคป.ตรี
    Route::post('editprojectbd', 'ProjectController@editprojectbd')->name('editprojectbd');
    Route::post('editprojectbd_ad', 'ProjectController@editprojectbd_ad')->name('editprojectbd_ad');
    Route::get('projectviewbd/{project_id}', 'ProjectController@projectbd');
    Route::get('projectviewbd_A/{project_id}', 'ProjectController@projectbd_A');

    //การตรวจสอบ admin ก่อนออกสู่ระบบ
    Route::get('confirm_p/{project_id}', 'AdminController@confirmproject');

    // อัพเดทโปรเจคป.โท/ป.เอก
    Route::post('editprojectmdd', 'Project_MDDController@editprojectadmin');
    Route::get('projectviewmdd/{project_id}', 'Project_MDDController@projectmdd');
    

    // เเก้ไขข้อมูลผู้ใช้ทั่วไป
    Route::get('edit','DatauserController@index');
    Route::get('edit/{id}','DatauserController@show');
    Route::post('edit/{id}', 'DatauserController@edit');

    // เเก้ไขข้อมูลผู้ดูเเลระบบ
    Route::get('edituseradmin','DataadminController@index');
    Route::get('edituseradmin/{admin_company_id}','DataadminController@show');
    Route::post('edituseradmin/{admin_company_id}', 'DataadminController@update');

    //เพิ่มข้อมูลprojectBD
    Route::get('addBD','AdminController@viewaddbd');
    Route::post('insertBD','AdminController@insertprojectBD_Ad')->name('insertBD');

    //เพิ่มข้อมูลprojectMDD
    Route::get('addMDD','AdminController@viewaddmdd');
    Route::post('insertMDD','AdminController@insertprojectMDD_Ad')->name('insertMDD');

    //ลบข้อมูล โปรเจคป.ตรี
    Route::get('delete_p_bd/{project_id}','AdminController@delete_project');

    //ลบข้อมูล โปรเจคป.โท
    Route::get('delete_p_mdd/{project_m_id}','AdminController@delete_projectmdd');

    //อ่านไฟล์ตรวจสอบ
    Route::get('read_chk/{project_id}', 'AdminController@readfile');
