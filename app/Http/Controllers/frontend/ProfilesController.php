<?php
namespace App\Http\Controllers\frontend;

use App\Models\User;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserProfileRequest;




class ProfilesController extends Controller
{
    public function index(User $profile)
    {

        return view('profile', compact('profile'));
    }

    public function edit(User $profile){

        if($profile->id == auth()->id())
        {
            return view('profile_edit', compact('profile'));
        }
        else
        {
             abort(403);
        }


    }
    public function update(UserProfileRequest $request,User $profile){

       $profile ->name = $request['name'];
       $profile ->email = $request['email'];
       $profile ->phone = $request['phone'];
       $profile ->address = $request['address'];
       $profile -> save();

       $image = Image::where('imageable_id', $profile)->first();

       if(request()->file('image')!=null){
        $file = request()->file('image');
        $file_name = uniqid(time()) . '_' . $file->getClientOriginalName();
        if($image = Image::where('imageable_type','App\Models\User')->where('imageable_id',$profile->id)->first()){
            unlink(public_path('img/profile/'.$image->name));
            $image->name = $file_name;
            $image->path = 'img/profile'."/$file_name";
        }
        $file->move(public_path('img/profile'), 'img/profile'."/$file_name");
        $profile->image()->save($image);
    }


    return redirect()->route('profiles',$profile)->with('success','profile update successfully .');

        }
}
