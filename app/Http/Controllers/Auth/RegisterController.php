<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
            'password' => ['required', 'string', 'min:8'],
            'surname' => ['required','string','max:255'],
            'Nazione' => ['required','string','max:2'],
            'Provincia' => ['required','string','max:255'],
            'Città' => ['required','string','max:255'],
            'name_of_industry' => ['required','string','max:255']
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => preg_replace("/[^A-Za-z0-9\-\']/", '', $data['name']),
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'surname' => preg_replace("/[^A-Za-z0-9\-\']/", '', $data['surname']),
            'Nazione' => preg_replace("/[^A-Za-z0-9\-\']/", '', $data['Nazione']),
            'Provincia' => preg_replace("/[^A-Za-z0-9\-\']/", '', $data['Provincia']),
            'Città' => preg_replace("/[^A-Za-z0-9\-\']/", '', $data['Città']),
            'name_of_industry' => preg_replace("/[^A-Za-z0-9\-\']/", '', $data['name_of_industry'])

        ]);
    }
}
