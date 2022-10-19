<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;




class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $profiles = User::orderBy('updated_at', 'DESC')->orderBy('created_at', 'DESC')->paginate(5);
        $i = ($request->input('page', 1) - 1) * 5;
        return view('admin.profile.index', compact('profiles','i'));

    }
    public function edit($id){
        $profile = User::find($id);
        // return view('profile.edit', compact('profile'));
        if($profile->id == auth()->user()->id){
            return view('admin.profile.edit', compact('profile'));
        }
        else{
            return back()->with('error', 'Unauthorize');
        }
    }
    public function update(Request $request,$id){
        $request -> validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
       $profile = User::find($id);
       $profile ->name = $request['name'];
       $profile ->email = $request['email'];
       $profile ->phone = $request['phone'];
       $profile ->address = $request['address'];
       $profile -> save();
        return redirect('/profile')->with('success','profile update successfully .');
    }
    public function delete($id){
       $profile = User::find($id);
    if($profile->id == auth()->user()->id) {
        $profile->delete();
        return back();
        } else {
        return back()->with('error', 'Unauthorize');
        }

    }

}
