<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message'=> 'User LogOut Successfully',
            'alert-type'=>'success'
        );

        return redirect('/login')->with($notification);
    }


    public function profile(){
        $id=Auth::user()->id;
        $adminData=User::find($id);
        return view('admin.admin_profile_view',compact('adminData'));
    }


    public function editProfile(){
        $id=Auth::user()->id;
        $editData=User::find($id);
        return view('admin.admin_profile_edit',compact('editData'));
    }

    public function storeProfile(Request $request){
        $id=Auth::user()->id;
        $data=User::find($id);
        $data->name=$request->name;
        // $data->username=$request->username;
        $data->email=$request->email;

        if($request->file('profile_image')){
            $file = $request-> file('profile_image');

            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('public/upload/admin_images'),$filename);
            $data['profile_image']= $filename;
        }
        $data->save();

        $notification = array(
            'message'=> 'Admin Profile Successfully',
            'alert-type'=>'success'
        );

        return redirect()->route('admin.profile')->with($notification);
      }



    public function changePassword(){
        return view('admin.admin_profille_change_password');
    }

    public function updatePassword(Request  $request){
        $validateData=$request->validate([
            'oldpassword'=>'required',
            'newpassword'=>'required',
            'confirmpassword'=>'required|same:newpassword',
        ]);

        $hashedPassword =Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashedPassword)){
            $users=User::find(Auth::id());
            $users->password = bcrypt($request->newpassword);
            $users->save();

            session()->flash('message','New Password Update Successfully');
            return redirect()->back();
        }
        else{
            session()->flash('message','Old Password is not match');
            return redirect()->back();
        }
    }
}


