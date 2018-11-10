<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.user.index');
    }
    public function list()
    {
        $result = Users::all();

        return view('pages.user.list')
            ->with('userlist' , $result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $user = new Users();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = $request->password;
        $user->email = $request->email;
        $user->dateOfBirth = $request->dateOfBirth;
        $user->designation = $request->designation;
        $user->status = $request->status;
        $user->gender = $request->gender;
        $user->save();

        return redirect()->route('user.list');
    }

//    public function profile()
//    {
//        $user = Users::find();
//
//        return view('user.profile')
//            ->with('user' , $user);
//    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Users::find($id);

        return view('pages.user.details')
            ->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
//        $user = DB::table('users')
//            ->where('id',$id)
//            ->first();
        $user = Users::find($id);
//        dd($user);
        return view('pages.user.edit')
            ->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $userToUpdate = Users::find($request->uid);
        $userToUpdate ->name=$request->name;
        $userToUpdate ->email=$request->email;
        $userToUpdate ->dateOfBirth = $request->dateOfBirth;
        $userToUpdate ->designation = $request->designation;
        $userToUpdate ->status = $request->status;
        $userToUpdate ->gender = $request->gender;
        $userToUpdate->save();

        return redirect()->route('user.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Users::find($id);
        $user->delete();

        return response()->json([
            'msg' => 'user deleted',
        ]);
    }
}
