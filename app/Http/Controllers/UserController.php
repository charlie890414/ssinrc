<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\user;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
         $this->middleware('auth');
     }
    public function index()
    {
        return view('user',[
            'users' => user::all(),
            'updateornot' => '增加'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
          'name' => 'required',
          'email' => 'required|unique:users',
          'password' => 'required|confirmed'
        ]);
        if ($validator->fails()){
            return redirect('/user')
                        ->witherrors($validator)
                        ->withinput();
        }
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'superuser' => 0,
        ]);

        return redirect('/user');
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
        return view('update_user',[
            'user' => user::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $input)
    {
        $user = User::find($id);
        $validator = Validator::make($input->all(),[
          'name' => 'required',
          'email' => 'required'
        ]);
        if ($validator->fails()){
            return redirect('/user/edit/'.$id)
                        ->witherrors($validator);
        }
        $user->name = $input['name'];
        $user->email = $input['email'];
        if($input['superuser']!=null)$user->superuser=1;
        else  $user->superuser = 0;
        $user->save();
        return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/user');
    }
}
