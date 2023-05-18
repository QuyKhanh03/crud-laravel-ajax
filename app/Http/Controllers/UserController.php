<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Response;
class UserController extends Controller
{
    public function getUsers(Request $request) {
        if($request->ajax()) {
            $data = User::select('*')->get();
            return Datatables::of($data)->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'"  class=" btn btn-danger removeItem">Remove</a>';
                $btn .= '  <a href="javascript:void(0)" data-id="'.$row->id.'" class="edit btn btn-success editItem">Edit</a>';
                $btn .= '  <a href="javascript:void(0)" data-id="'.$row->id.'" class="view btn btn-info viewItem">View</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $item = User::find($id);
        return response()->json($item);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $item = User::find($id);
        return response()->json($item);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'email'
        ]);
        User::updateOrCreate(
            ['id' => $request->id],
            [
                'name' => $request->name,
                'password' => "123456",
                'email' => $request->email
            ]
        );
        return response()->json(['success'=>'User saved successfully.']);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();
        return response()->json(['success'=>'User deleted successfully.']);
    }
}
