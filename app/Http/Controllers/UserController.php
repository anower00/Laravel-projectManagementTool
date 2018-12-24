<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use Intervention;
use File;
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
//        dd($request);
        if(isset($request->picture) && !empty($request->picture)){
        $image = $request->picture;
        $extension =$image->getClientOriginalExtension();//get image extension only
        $imageOriginalName= $image->getClientOriginalName();
        $basename = substr($imageOriginalName, 0 , strrpos($imageOriginalName, "."));//get image name without extension
        $imageName=$basename.date("YmdHis").'.'.$extension;//make new name
        $path = 'images/profilePicture/' . $imageName;
        Intervention::make($image->getRealPath())->resize(200, 200)->save($path);
    }
        $user = new Users();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = $request->password;
        $user->email = $request->email;
        $user->dateOfBirth = $request->dateOfBirth;
        $user->designation = $request->designation;
        $user->status = $request->status;
        $user->gender = $request->gender;
        if(isset($request->picture) && !empty($request->picture)) {
            $user->profile_picture = $path;
        }
        $save = $user->save();
        if ($save){
            $request->session()->flash('message', 'User create successfully.');
        }

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
        $userToUpdate->update();

        return redirect()->route('user.list');
    }

    public function resetPassword()
    {
        $user = session()->get('user');
        return view('pages.user.reset-password', compact('user'));
    }

    public function admin_credential_rules(array $data)
    {
        $messages = [
            'oldPass.required' => 'Please enter current password',
            'newPass.required' => 'Please enter password',
        ];

        $validator = Validator::make($data, [
            'oldPass' => 'required',
            'newPass' => 'required|same:newPass',
            'retypeNewPass' => 'required|same:newPass',
        ], $messages);

        return $validator;
    }
    public function updatePassword(Request $request)
    {
//        dd($request);
        if(session()->has('user'))
        {
            $request_data = $request->All();
//            dd($request_data);
            $validator = $this->admin_credential_rules($request_data);
            if($validator->fails())
            {
                return redirect()->back()->withErrors($validator->getMessageBag()->toArray());
//                return response()->json(array('error' => $validator->getMessageBag()->toArray()), 400);
            }
            else
            {
                $user = Users::find($request->uid);
                $current_password = $user->password;
                if($request_data['oldPass'] == $user->password)
                {

                    $user->password = $request->newPass;
                    $user->save();
                    return redirect()->back()->with('message', 'Password Updated!');
                }
                else
                {
                    return redirect()->back()->withErrors(['Password doesn\'t match']);
                }
            }
        }
        else
        {
            return redirect()->to('/');
        }
    }

    public function searchUser(Request $request)
    {
        $userlist = Users::where($request->category,'Like','%'.$request->search_query.'%')->get();
        return view('pages/user/list', compact('userlist'));
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

    public function profile()
    {
        $user = session()->get('user');

        return view('pages.user.profile')
            ->with('user',$user);
    }

    public function changeProfilePicture(Request $request)
    {
//        dd($request);

        $user = session()->get('user');
        if(isset($request->picture) && !empty($request->picture)) {
            $image = $request->picture;
            $extension = $image->getClientOriginalExtension();//get image extension only
            $imageOriginalName = $image->getClientOriginalName();
            $basename = substr($imageOriginalName, 0, strrpos($imageOriginalName, "."));//get image name without extension
            $imageName = $basename . date("YmdHis") . '.' . $extension;//make new name
            $path = 'images/profilePicture/' . $imageName;
            Intervention::make($image->getRealPath())->resize(200, 200)->save($path);
        }

//        File::delete($user->profile_picture);
        $user = Users::find($user->id);
        if(isset($request->picture) && !empty($request->picture)) {
            $user->profile_picture = $path;
        }
        $user->update();
        $request->session()->put('user', $user);

        return view('pages.user.profile')
            ->with('user',$user);
    }
}
