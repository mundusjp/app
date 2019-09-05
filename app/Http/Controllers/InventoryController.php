<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;
use App\Category;
use Yajra\Datatables\Datatables;
use Mail;
use App\User;
use Auth;
use App\Mail\ApprovalRequest;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventories = Inventory::all();
        return view('admin.inventory','inventories');
    }

    public function admin_index(){
      $incentories = Inventory::all();
      $categories = Category::all();
      return view('admin.inventory',compact('inventories','categories'));
    }

    public function user_index(){
      $incentories = Inventory::all();
      $categories = Category::all();
      return view('user.inventory',compact('inventories','categories'));
    }

    public function getInventories()
    {
        $inventories = Inventory::select(['id', 'user_id', 'inventory', 'category_id','amount','status_id', 'created_at', 'updated_at']);
        return Datatables::of($inventories)
        ->addColumn('approve',function($inventory){
          $button = '<a href="javascript:{}" class="btn btn-xs btn-success btn-approve" data-remote="'.$inventory->id.'">Approve</a>';
          return $button;
        })->addColumn('reject',function($inventory){
          $button = '<a href="javascript:{}" class="btn btn-xs btn-danger btn-reject" data-remote="'.$inventory->id.'">Reject</a>';
          return $button;
        })
        ->make(true);
    }

    public function getUserInventories()
    {
        $inventories = Inventory::where('user_id', Auth::guard('user')->user()->id)->select(['id', 'user_id', 'inventory', 'category_id','amount','status_id', 'created_at', 'updated_at']);
        return Datatables::of($inventories)
        ->addColumn('update',function($inventory){
          if($inventory->status_id == 1){
            return 'Not Approved';
          }else{
            $button = '<a href="javascript:{}" class="btn btn-xs btn-success btn-edit" data-remote="'.$inventory->id.'">Edit</a>';
            return $button;
          };
        })->make(true);
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
        request()->validate([
          'id'=> 'required|integer',
          'category'=>'required|integer',
          'amount'=>'required|integer',
          'inventory'=>'required|string'
        ]);
        $inventory = new Inventory;
        $inventory->user_id = $request->id;
        $inventory->inventory = $request->inventory;
        $inventory->category_id = $request->category;
        $inventory->amount = $request->amount;
        $inventory->status_id = 1;
        $inventory->save();
        $mail = Mail::to("super.raymundus@gmail.com","Administrator")->send(new ApprovalRequest);
        return back()->with('success','Added new inventory and waiting for approval!');
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
        request()->validate([
          'inventory'=>'required|string',
          'amount'=>'required|integer',
          'category'=>'required|integer'
        ]);
         $inventory = Inventory::find($id);
         $inventory->update([
           'inventory'=>$request->inventory,
           'amount'=>$request->amount,
           'category'=>$request->category_id
         ]);
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
