<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

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
    protected $redirectTo = '/home';

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
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'apellido' => ['required', 'string', 'max:255'],
            'direccion' => ['required', 'string', 'max:255'],
            'nacimiento' => ['required', 'date'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data){

      $data['confirmation_code'] = Str::random(25);
      $user = User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'apellido' => $data['apellido'],
        'direccion' => $data['direccion'],
        'nacimiento' => $data['nacimiento'],
        'password' => Hash::make($data['password']),
        'confirmation_code' => $data['confirmation_code'],
      ]);
      // Send confirmation code
      Mail::send('emails.confirmation_code', $data, function($message) use ($data) {
      $message->to($data['email'], $data['name'])->subject('Por favor confirma tu correo');
      });
      $user->roles()->attach(Role::where('name', 'user')->first());

      return $user;
    }// /create
}
