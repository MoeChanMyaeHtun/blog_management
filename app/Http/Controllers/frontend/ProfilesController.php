<?php
namespace App\Http\Controllers\frontend;

use App\Models\User;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;




class ProfilesController extends Controller
{
    public function index(Request $request)
    {
        $profiles = User::orderBy('id','desc')->paginate(5);
        $i = ($request->input('page', 1) - 1) * 5;
        return view('profile', compact('profiles','i'));

    }
    public function edit($id){
        $profile = User::find($id);

        return view('profile_edit', compact('profile'));
        // if($profile->id == auth()->user()->id){
        //     return view('admin.profile.edit', compact('profile'));
        // }
        // else{
        //     return back()->with('error', 'Unauthorize');
        // }
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


       $image = Image::where('imageable_id',$id)->first();
       if(request()->hasFile('image')){
           unlink(public_path('img/profile/'.$image->name));
           $file = request()->file('image');
        //    dd($file);
           $file_name = uniqid(time()) . '_' . $file->getClientOriginalName();
           $save_path = ('img/profile');
           $file->move($save_path, $save_path."/$file_name");
           $image->name =  $file_name ;
           $image->path = "$save_path/$file_name";
           $profile->image()->save($image);
       }
        return redirect('/profile')->with('success','profile update successfully .');
    }
    public function delete($id){
       $profile = User::find($id);
       $profile->delete();
       return back()->with('success','product delete successfully .');
    }
    // if($profile->id == auth()->user()->id) {
    //     $profile->delete();
    //     return back();
    //     } else {
    //     return back()->with('error', 'Unauthorize');
    //     }

    // }

}
