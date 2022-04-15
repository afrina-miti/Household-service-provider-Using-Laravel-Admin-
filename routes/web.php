<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\managerController;
use App\Models\admin;
use App\Models\manager;
use App\Models\staff;
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

Route::get('/', function () {
    return view('welcome');
});

//Login 
Route::get('/login',[adminController::class,'login'])->name('login');
Route::post('/login',[adminController::class,'loginSubmit'])->name('login.submit');
Route::get('/logout',[adminController::class,'logout'])->name('logout');

//->middleware('auth.admin')

//Admin
Route::get('/admin/registration',[adminController::class,'registration'])->name('admin.registration');
Route::post('/admin/registration',[adminController::class,'registrationSubmit'])->name('admin.registration.submit');
Route::get('/admin/home',[adminController::class,'Home'])->middleware('auth.admin')->name('admin.home');

Route::get('/admin/viewprofile',[adminController::class,'viewprofile'])->middleware('auth.admin')->name('admin.viewprofile');
Route::get('/admin/adminrequest',[adminController::class,'adminrequest'])->middleware('auth.admin')->name('admin.adminrequest');
Route::get('/admin/managerrequest',[adminController::class,'managerrequest'])->middleware('auth.admin')->name('admin.managerrequest');
Route::get('/admin/staffrequest',[adminController::class,'staffrequest'])->middleware('auth.admin')->name('admin.staffrequest');
Route::get('/admin/changepassword',[adminController::class,'changepassword'])->middleware('auth.admin')->name('admin.changepassword');
Route::post('/admin/changepassword',[adminController::class,'changepasswordsubmit'])->middleware('auth.admin')->name('admin.changepasswordsubmit');
Route::get('/admin/acceptadmin/{username}',[adminController::class,'acceptadmin'])->middleware('auth.admin')->name('admin.acceptadmin');
Route::get('/admin/rejectadmin/{username}',[adminController::class,'rejectadmin'])->middleware('auth.admin')->name('admin.rejectadmin');
Route::get('/admin/acceptmanager/{username}',[adminController::class,'acceptmanager'])->middleware('auth.admin')->name('admin.acceptmanager');
Route::get('/admin/rejectmanager/{username}',[adminController::class,'rejectmanager'])->middleware('auth.admin')->name('admin.rejectmanager');
Route::get('/admin/acceptstaff/{username}',[adminController::class,'acceptstaff'])->middleware('auth.admin')->name('admin.acceptstaff');
Route::get('/admin/rejectstaff/{username}',[adminController::class,'rejectstaff'])->middleware('auth.admin')->name('admin.rejectstaff');
Route::get('/admin/leaveapplication',[adminController::class,'leaveapplication'])->middleware('auth.admin')->name('admin.leaveapplication');
Route::get('/admin/rejectleaveapplication/{username}',[adminController::class,'rejectleaveapplication'])->middleware('auth.admin')->name('admin.rejectleaveapplication');
Route::get('/admin/acceptleaveapplication/{username}',[adminController::class,'acceptleaveapplication'])->middleware('auth.admin')->name('admin.acceptleaveapplication');
Route::get('/admin/branches',[adminController::class,'branches'])->middleware('auth.admin')->name('admin.branches');
Route::post('/admin/branches',[adminController::class,'branchessubmit'])->middleware('auth.admin')->name('admin.branchessubmit');
Route::get('/admin/setsalary',[adminController::class,'setsalary'])->middleware('auth.admin')->name('admin.setsalary');
Route::post('/admin/setsalary',[adminController::class,'submitsalary'])->middleware('auth.admin')->name('admin.submitsalary');
Route::get('/admin/addbranchmanager',[adminController::class,'addbranchmanager'])->middleware('auth.admin')->name('admin.addbranchmanager');
Route::post('/admin/addbranchmanager',[adminController::class,'addbranchmanagersubmit'])->middleware('auth.admin')->name('admin.addbranchmanagersubmit');
Route::get('/admin/transferapplications',[adminController::class,'transferapplications'])->middleware('auth.admin')->name('admin.transferapplications');
Route::get('/admin/rejecttransferapplication/{username}',[adminController::class,'rejecttransferapplication'])->middleware('auth.admin')->name('admin.rejecttransferapplication');
Route::get('/admin/accepttransferapplication/{username}',[adminController::class,'accepttransferapplication'])->middleware('auth.admin')->name('admin.accepttransferapplication');
Route::get('/admin/bancustomer',[adminController::class,'bancustomer'])->middleware('auth.admin')->name('admin.bancustomer');
Route::post('/admin/bancustomer',[adminController::class,'bancustomersubmit'])->middleware('auth.admin')->name('admin.bancustomersubmit');
Route::get('/admin/acceptbancustomer/{username}',[adminController::class,'acceptbancustomer'])->middleware('auth.admin')->name('admin.acceptbancustomer');









//Manager
Route::get('/manager/registration',[managerController::class,'registration'])->name('manager.registration');
Route::post('/manager/registration',[managerController::class,'registrationSubmit'])->name('manager.registration.submit');
Route::get('/manager/home',[managerController::class,'Home'])->name('manager.home');
Route::get('/manager/profile',[managerController::class,'Profile'])->name('manager.profile');




//stuff





//customer