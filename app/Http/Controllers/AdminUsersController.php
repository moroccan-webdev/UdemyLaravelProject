<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Requests\UsersCreateRequest;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'id')->all();

        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersCreateRequest $request)
    {
          $user = new User;
          //dd($user);
          //$input = $request->all();
          if($file = $request->file('photo_id')){
              $name = time().$file->getClientOriginalName();
              $file->move('images', $name);
              $photo = Photo::create(['file'=>$name]);
              //$înput['photo_id'] = $photo->id;
              $user->photo_id = $photo->id;
          }
          $user->password = bcrypt($request->password);
          //User::create($input);
          $user->name = $request->name;
          $user->email = $request->email;
          $user->role_id = $request->role_id;
          $user->is_active = $request->is_active;
          $user->save();

          return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::pluck('name', 'id')->all();
        return view('admin.users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersCreateRequest $request, $id)
    {
        $user = User::findOrFail($id);
        if($file = $request->file('photo_id')){
            $name = time().$file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);
            //$înput['photo_id'] = $photo->id;
            $user->photo_id = $photo->id;
        }
        $user->password = bcrypt($request->password);
        //User::create($input);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->is_active = $request->is_active;
        $user->save();

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $user = User::findOrFail($id);
          unlink(public_path()."/images/".$user->photo->file);
          $user->delete();
          return redirect()->route('users.index');
    }
}
