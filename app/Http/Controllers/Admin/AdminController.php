<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AdminModel;
use App\Models\Admin\RoleModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Rules\PhoneRule;

class AdminController extends Controller
{
    const TITLE = 'User-admin';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $admins = AdminModel::all();
            return DataTables::of($admins)->addColumn('action',function($admin){
                $routeEdit = route('admin.edit', $admin->id);
                $routeDelete = route('admin.delete', $admin->id);
                $deleteAjax = "deleteItemAjax('$routeDelete')";
                $buttonEdit = '<button class="btn btn-sm btn-success" onclick="window.location.href=\'' . "$routeEdit'\">"
                              .'<i class="fas fa-pen-alt"></i>'.'</button>';
                $buttonDelete = '<button class="btn btn-sm btn-danger btn-delete" onclick="' . "$deleteAjax\">"
                              .' <i class="fas fa-trash"></i>'.'</button>';
                return $buttonEdit . '    ' . $buttonDelete;
            })->make(true);          
        }
        return view('Admin.Admin.index', [
            'title'=>self::TITLE
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = RoleModel::all();
        $cities = DB::table('tbl_city')->get();
        return view('Admin.Admin.create', [
            'title' => self::TITLE,
            'roles' => $roles,
            'cities'  => $cities
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_role' => 'required',
            'name' => 'required|min:5|max:250',
            'email' => 'required|email|unique:tbl_admin',
            'password' => 'required',
            'phone' => ['required',  new PhoneRule('S')]]);
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
