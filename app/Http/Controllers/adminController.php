<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\alluser;
use App\Models\admin;
use App\Models\manager;
use App\Models\staff;
use App\Models\leave_application;
use App\Models\branch;
use App\Models\transfer_application;
use App\Models\customer;
class adminController extends Controller
{

    public function login()
    {
        return view('login');
    }
    public function loginSubmit(Request $req)
    {
        $req->validate(
            [
                'username'=>'required',
                'password'=>'required',
                
            ],
            
    );

    $user=alluser::where('username',$req->username)->where('password',md5($req->password))->where('active_status',"active")->first();
       if($user==null)
       {
          $req->session()->flash('registration','Insert valid information');
          
          return back();
       }
       else
       {
            if($user->usertype=="admin")
            {
                $req->session()->put('usertype','admin');
                $req->session()->put('username',$user->username);
                return redirect()->route('admin.home');
            }
            if($user->usertype=="manager")
            {
                $req->session()->put('usertype','manager');
                $req->session()->put('username',$user->username);
                return redirect()->route('manager.home');
            }
            if($user->usertype=="staff")
            {
                $req->session()->put('usertype','staff');
                $req->session()->put('username',$user->username);
                return redirect()->route('staff.home');
            }
            if($user->usertype=="customer")
            {
                $req->session()->put('usertype','customer');
                $req->session()->put('username',$user->username);
                return redirect()->route('customer.home');
            }
          
       }





    }
   

    public function logout()
    {
        session()->flush();
        return redirect()->route('login');
    }
  


    public function registration()
    {
        return view('Admin.registration');
    }

    public function registrationSubmit(Request $req)
    {
        $req->validate(
            [
                'username'=>'required|min:3|max:9|unique:allusers|string',
                'email'=>'required',
                'password'=>'required|min:5|max:15',
                'cpassword'=>'required|same:password',
                'phone'=>'required|regex:/^01[0-9]{9}$/',
                'gender'=>'required',
                'date_of_birth'=>'required',
                'picture'=>'mimes:png,jpg,jpeg|required',
                
            ],
            
    );
    $pic=$req->file('picture')->store('Profile Picture');


    $st =new alluser();
    $st->username=$req->username;
    $st->password=md5($req->password);
    $st->email=$req->email;
    $st->phone=$req->phone;
    $st->dob=$req->date_of_birth;
    $st->gender=$req->gender;
    $st->usertype="admin";
    $st->image=$pic;
    $st->save();
    $req->session()->flash('registration','User Registered');
    return redirect()->route('login');

    }
    public function Home()
    { $manager=alluser::where('usertype','manager')->where('active_status','pending')->get();
     $managerCount = count($manager);
     $admin=alluser::where('usertype','admin')->where('active_status','pending')->get();
     $adminCount = count($admin);
     $staff=alluser::where('usertype','staff')->where('active_status','pending')->get();
     $staffCount = count($staff);
     $manager=leave_application::where('status','pending')->get();
     $lmanagerCount = count($manager);
     $tapplication=transfer_application::where('status','pending')->get();
     $tapplicationCount = count($tapplication);
       
        $count=[$managerCount , $adminCount, $staffCount,  $lmanagerCount, $tapplicationCount ];
        return view('Admin.home',['counts'=>$count]);
        
    }
    
    public function viewprofile()
    {
       $type=Session()->get('usertype'); 
       $name=Session()->get('username');
       $admin=alluser::where('usertype',$type)->where('username',$name)->first();
        return view('Admin.viewprofile')->with('admin',$admin);
    }
    public function adminrequest()
    {   
        $admin=alluser::where('usertype','admin')->get();
        
        return view('Admin.adminrequest')->with('admin',$admin);
    }
    public function managerrequest()
    {
        $manager=alluser::where('usertype','manager')->get();
        
        return view('Admin.managerrequest')->with('manager',$manager);
    }
    public function staffrequest()
    {  $staff=alluser::where('usertype','staff')->get();
        
        return view('Admin.staffrequest')->with('staff',$staff);
    }
    public function changepassword()
    {
        return view('Admin.changepassword');
    }
    public function acceptadmin($username)
    {
      $admin =alluser::where('username',$username)->first();
      $admin->active_status="active";
      $admin->save();
      $st = new admin;
      $st->username=$admin->username;
      $st->password=md5($admin->password);
      $st->email=$admin->email;
      $st->phone=$admin->phone;
      $st->dob=$admin->dob;
      $st->gender=$admin->gender;
      $st->image=$admin->image;
      $st->save();
      session()->flash('registration','Accepted');
      return back();
    }
    public function rejectadmin($username)
    {   $name=Session()->get('username');
        

        
            if($name!=$username){
               $admin =alluser::where('username',$username)->first();
               $admin->delete();
               $admin =admin::where('username',$username)->first();
               if($admin){
               
               $admin->delete();}

               session()->flash('registration','Rejected');
               
            }
           else{
            
            session()->flash('registration','Cannot be Rejected');
           }
           return back();  
        }
        
        
       
    
    public function acceptmanager($username)
    {
      $manager =alluser::where('username',$username)->first();
      $manager->active_status="active";
      $manager->save();
      $st = new manager;
      $st->username=$manager->username;
      $st->password=md5($manager->password);
      $st->email=$manager->email;
      $st->phone=$manager->phone;
      $st->dob=$manager->dob;
      $st->gender=$manager->gender;
      $st->image=$manager->image;
      $st->save();
      session()->flash('registration','Accepted');
      return back();
    }
    public function rejectmanager($username)
    {   
        $manager =alluser::where('username',$username)->first();
        $manager->delete();
        $manager =manager::where('username',$username)->first();
        if($manager){
           
            $manager->delete();
        }
        session()->flash('registration','Rejected');
        return back();
       
    }
    public function acceptstaff($username)
    {
      $staff =alluser::where('username',$username)->first();
      $staff->active_status="active";
      $staff->save();
      $staff =staff::where('username',$username)->first();
      $staff->active_status="active";
      $staff->save();
      session()->flash('registration','Accepted');
      return back();
    }
    public function rejectstaff($username)
    {   
        $staff =alluser::where('username',$username)->first();
        $staff->delete();
        $staff=staff::where('username',$username)->first();
        
           
            $staff->delete();
        
            session()->flash('registration','Rejected');
        return back();
       
    }
    public function leaveapplication()
    {
        $manager=leave_application::all();
        
        return view('Admin.leaveapplication')->with('manager',$manager);
    }
    public function acceptleaveapplication($username)
    {
        $manager =alluser::where('username',$username)->first();
        $manager->delete();
       
        $manager=manager::where('username',$username)->first();
        $manager->delete();
      
        $manager=leave_application::where('username',$username)->first();
        $manager->status="accepted";
        $manager->save();
        session()->flash('registration','Accepted');
        return back();
      
    }
    public function rejectleaveapplication($username)
    {   
        $manager=leave_application::where('username',$username)->first();
        $manager->status="rejected";
        $manager->save();
        session()->flash('registration','Rejected');
       return back();
    }
    public function bancustomer()
    {
        $customer=customer::all();
        
        return view('Admin.bancustomer')->with('customer',$customer);
    }
    public function acceptbancustomer($username)
    {   
        $customer= customer::where('username',$username)->first();
        $customer->delete();
        $customer= alluser::where('username',$username)->first();
        $customer->delete();
        session()->flash('registration','Customer Banned');
       
       return back();
    }
    public function bancustomersubmit(request $req)
    {  
        
        $req->validate(
        [
            
            'customer'=>'required',
            
            
        ],
        ['customer.required'=>'Please Enter The Customer Username']
    );
    $cname=$req->customer;
$customer=customer::where('username',$cname)->first();
if($customer==null){
    session()->flash('registration','No Customer Found');
    
}
else{
    
        $customer->delete();
        $customer= alluser::where('username',$cname)->first();
        $customer->delete();
        session()->flash('registration','Customer Banned');
       
}      
return back();    }
    public function branches()
    {
       
        
         $manager=branch::all();
        
        return view('Admin.branches')->with('manager',$manager);
    }
    public function branchessubmit(request $req)
    {  
        
        $req->validate(
        [
            
            'branch'=>'required',
            
            
        ],
    );
    $bname=$req->branch;
$branch=branch::where('name',$bname)->first();
if($branch!=null){
    session()->flash('registration','This branch is already created');
    return back();  
}
else{
    $pt=new branch();
    $pt->name=$bname;     
     $pt->save();
     session()->flash('registration','Branch Created Sucessfully');
     return back();  
}      
    }
    public function addbranchmanager()
    {
        
        
         $manager=branch::all();
        
        return view('Admin.addbranchmanager')->with('manager',$manager);
    }
    public function addbranchmanagersubmit(request $req)
    {

        $req->validate(
            [
                
                'branch'=>'required',
                'bmanager'=>'required'
                
                
            ],
        
        [
            'bmanager.required'=>'The Branch Manager name is required.',
            
        ]
    );
      $bmanager=$req->bmanager;  
      $bname=$req->branch;  
      $branch=branch::where('name',$bname)->first();
      $bm=branch::where('branch_manager',$bmanager)->first();
      $manager=manager::where('username',$bmanager)->first();
       if($branch==null )
       {
          session()->flash('registration','This Branch does not exist ');
          return back();
       }
       if($branch->branch_manager!=null)
        {
            session()->flash('registration','There is already a manager in this branch');
            return back();
        }
        if($manager==null)
        {
            session()->flash('registration','Enter a valid manager name');
            return back();
        }
       if($bm!=null){
        session()->flash('registration','This manager is already in another branch');
        return back();
       }
       else{

        $manager=manager::where('username',$bmanager)->first();
        $manager->branch=$bname;
        $manager->save();
        $branch->name=$bname;
        $branch->branch_manager=$bmanager;
        
        $branch->save();
        return back();
       }
       
   

   
    }
    
  
    public function setsalary()
    {
      
        $manager=manager::all();
        
        return view('Admin.setsalary')->with('manager',$manager);
        
        
    }
    public function submitsalary(Request $req)
    {
    
        $mname=$req->mname;
       $salary=$req->salary;
        $req->validate(
            [
                
                'salary'=>'required',
                'mname'=>'required'
                
                
            ],
      
        [
            'mname.required'=>'The Manager name is required.',
            
        ]
    );
        $manager=manager::where('username',$mname)->first();

        if($salary<30000  || $salary>100000){
            session()->flash('registration','Salary must be greater than 30000 and less than 100000 TK');   
            return back(); 
        }
        if(is_numeric($salary)==false){
            session()->flash('registration','Enter valid salary'); 
            return back();
        }
        if($manager==null)
        {
            session()->flash('registration','Enter a valid manager name');
            return back();
        }
        if($manager->salary!=0)
        {
            session()->flash('registration','You cannot update the salary');
            return back();
        }
        else{
            $manager= manager::where('username',$req->mname)->update(['salary' => $req->salary]);
            return back();
        }
        
 
        
         
       
        
        
    }
    public function transferapplications()
    {
      
        $manager=transfer_application::all();
        
        return view('Admin.transferapplications')->with('manager',$manager);
        
        
    }
    public function accepttransferapplication($username)
    {

    $tapplication=transfer_application::where('username',$username)->first();
    $desired_branch=$tapplication->desire;
    $dbranch=branch::where('name',$desired_branch)->first();
    $currbranch=branch::where('branch_manager',$username)->first();
    $manager=manager::where('username',$username)->first();
   
    if($dbranch==null)
        {
            session()->flash('registration','This Branch is not created yet');
            return back();
        }
    

    else{
        $dbranchmanager=$dbranch->branch_manager;
        if($dbranchmanager!=null)
        {
            session()->flash('registration','This Branch already has a manager');
            return back();
        }
        else{
            $tapplication->status='accepted';
            $tapplication->save();
            $dbranch->branch_manager=$username;
            $dbranch->save();
            $currbranch->branch_manager='';
            $currbranch->save();
            $manager->branch=$desired_branch;
            $manager->save();
            session()->flash('registration','Accepted');
            return back();
        }
        
    }
    }
    public function rejecttransferapplication($username)
    {   
        $manager=transfer_application::where('username',$username)->first();
        $manager->status="rejected";
        $manager->save();
        session()->flash('registration','Rejected');
       return back();
    }
    
    public function changepasswordsubmit(Request $req)
    {
        $req->validate(
            [
                'cpass'=>'required',
                'npass'=>'required|min:5|max:15',
                'conpass'=>'required|same:npass',
                
                
            ],
            [
                'cpass.required'=>'Please provide your Current password',
                'npass.required'=>'Please provide your New password',
                'npass.min'=> 'Username  should contain at least 5 characters',
                'npass.max'=> 'Username should not exceed 15 characters',
                'conpass.required'=> 'Please provide the New password again',
                'conpass.same'=> 'The Confirm Password and New Password must match.'
            ]
            
    );
    
  
    $name=Session()->get('username');
    $st =alluser::where('username',$name)->first();
   
    if($st->password!=md5($req->cpass))
        {
            $req->session()->flash('registration','Current password is not correct');
            return back();
        }
        else{
            $st->password=md5($req->npass);
            $st->save();
            $st =admin::where('username',$name)->first();
            $st->password=md5($req->npass);
            $st->save();
            $req->session()->flash('registration','Password Changed');
            return back();
        }
 
    
   

    }
 




}
