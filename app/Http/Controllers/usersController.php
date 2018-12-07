<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use App\User;
use App\Country;
use Auth;
use Illuminate\Foundation\Auth\RegistersUsers;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user=User::all();
      return view('users.profile', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function showFriends()
    {
      //aca deberia consultar sobre la tabla que relaciona usuarios conn usuarios
      return view('users.profileFriends');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showUser()
    {
        return view('users.profile');
    }

    public function showComments()
    {
        $comments = Auth::user()->comments;

        return view('users.profileComments')->with(compact('comments'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $countries=Country::all();
        return view('users.profileEdit', compact('countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersRequest $request, $id)
    {

      $user = User::find($id);

      //dd($user);



      $file = $request->image;

      // Nombre final de la imagen
      $finalName = strtolower(str_replace(" ", "_", $request->name));

      // Armo un nombre único para este archivo
      $name = $finalName . uniqid('_image_') . "." . $file->extension();

      // Guardo el archivo en la carpeta
      $file->storePubliclyAs("public/storage/usersImage", $name);

      $user->name = $request->name;
      $user->email = $request->email;
      $user->nickname = $request->nickname;

      $user->image = $name;

      $user->city_id = $request->city_id;
      $user->target = $request->target;
      $user->save();
      return redirect('/profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
