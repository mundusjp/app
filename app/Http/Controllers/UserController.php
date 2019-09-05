<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.users');
    }

    public function get_users(){
        $users = User::select(['id','name','email','user_status']);
        return Datatables::of($users)
        ->addColumn('status',function($user){
          if($user->user_status == 1){
            $button = '<a href="javascript:{}" class="btn btn-xs btn-danger btn-suspend" data-remote="'.$user->id.'">Suspend</a>';
            return $button;
          }else{
            $button = '<a href="javascript:{}" class="btn btn-xs btn-danger btn-activate" data-remote="'.$user->id.'">Activate</a>';
            return $button;
          };
        })->addColumn('delete',function($user){
          $button = '<a href="javascript:{}" class="btn btn-xs btn-danger btn-delete" data-remote="'.$user->id.'">Delete</a>';
          return $button;
        })->addColumn('reset',function($user){
          $button = '<a href="javascript:{}" class="btn btn-xs btn-danger btn-reset" data-remote="'.$user->id.'">Delete</a>';
          return $button;
        })
        ->make(true);
    }

    public function reset_password($id){
      $user = User::find($id);
      $user->update([
        'password'=> Hash::make('user123')
      ]);
      return back()->with('success','Success! The user password is reset to default!');
    }

    public function suspend($id){
      $user = User::find($id);
      $user->update([
        'user_status'=>0
      ]);
      return back()->with('success','Success! The user is now suspended!');
    }

    public function activate($id){
      $user = User::find($id);
      $user->update([
        'user_status'=>1
      ]);
      return back()->with('success','Success! The user is now activated!');
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
        //
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
        //
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
        //
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
