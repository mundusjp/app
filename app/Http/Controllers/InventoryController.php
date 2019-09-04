<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;
use Yajra\Datatables\Facades\Datatables;

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

    public function getInventories()
    {
        $inventories = Inventory::select(['id', 'user_id', 'inventory', 'category_id','amount','status_id', 'created_at', 'updated_at']);
        return Datatables::of($inventories)->make();
        // ->addColumn('approve',function($inventory){
        //   return '<a href="#approve-'.$inventory->id.'" class="btn btn-success">Approve</a>';
        // })->addColumn('reject',function($inventory){
        //   return '<a href="#reject-'.$inventory->id.'" class="btn btn-danger">Reject</a>';
        // })
        // ->make();
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
