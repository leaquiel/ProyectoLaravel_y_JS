<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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
            'country_id' => ['required'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ],
        [
        //   'name.required' => 'nomber obligatorio',
        //   'email.required' => 'email obligatorio',
        //   'email.email' => 'email invalido',
          'country_id.required' => 'El campo pais es obligatorio',
        //   'name.string' => 'nomber deben ser letras',
        ]
      );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $file = $data['image'];

        // Nombre final de la imagen
        $finalName = strtolower(str_replace(" ", "_", $data['name']));

        // Armo un nombre único para este archivo
        $name = $finalName . uniqid('_image_') . "." . $file->extension();

        // Guardo el archivo en la carpeta
        $file->storePubliclyAs("public/storage/usersImage", $name);

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'nickname' => $data['nickname'],

            'image' => $name,

            'city_id' => $data['city_id'],
            'target' => $data['target'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
