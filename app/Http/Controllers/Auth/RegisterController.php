<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Image;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required','regex:/^([(09)\(01)\(0-9)\s\+\(\)]*)$/','max:12'],
            'address' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'image'=>['required'],
        ]);
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
       $profile = new User();
       $profile->name = $data['name'];
       $profile->email = $data['email'];
       $profile->phone = $data['phone'];
       $profile->address = $data['address'];
       $profile->password = Hash::make($data['password']);
       $profile->save();

        $image = new Image();

            $file = request()->file('image');
            // dd($file);
            $file_name = uniqid(time()) . '_' . $file->getClientOriginalName();
            $save_path = ('img/profile');
            $file->move($save_path, $save_path."/$file_name");
            $image->name =  $file_name ;
            $image->path = "$save_path/$file_name";
           $profile->image()->save($image);

        return $profile;
    }
}
