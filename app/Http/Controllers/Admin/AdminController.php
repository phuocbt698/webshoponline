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
            // $admins = AdminModel::all();
            $admins = AdminModel::get();
            return DataTables::of($admins)->addColumn('role', function ($admin) {
                return $admin->role->name;
            })
                ->addColumn('action', function ($admin) {
                    $routeDetail = route('admin.detail', $admin->id);
                    $routeEdit = route('admin.edit', $admin->id);
                    $routeDelete = route('admin.delete', $admin->id);
                    $deleteAjax = "deleteItemAjax('$routeDelete')";
                    $buttonDetail = '<button class="btn btn-sm btn-warning" onclick="window.location.href=\'' . "$routeDetail'\">"
                        . '<i class="fas fa-eye"></i>' . '</button>';
                    $buttonEdit = '<button class="btn btn-sm btn-success" onclick="window.location.href=\'' . "$routeEdit'\">"
                        . '<i class="fas fa-pen-alt"></i>' . '</button>';
                    $buttonDelete = '<button class="btn btn-sm btn-danger btn-delete" onclick="' . "$deleteAjax\">"
                        . ' <i class="fas fa-trash"></i>' . '</button>';
                    return $buttonDetail . '    ' . $buttonEdit . '    ' . $buttonDelete;
                })->rawColumns(['role', 'action'])->make(true);
        }
        return view('Admin.Admin.index', [
            'title' => self::TITLE
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
            'role' => 'required',
            'name' => 'required|min:5|max:250',
            'email' => 'required|email|unique:tbl_admin',
            'password' => 'required',
            'city' => 'required',
            'phone' => ['required',  new PhoneRule('S??? ??i???n tho???i kh??ng ????ng ?????nh d???ng!'), 'unique:tbl_admin'],
            'image' => 'required|image'
        ], [
            'required' => 'Tr?????ng n??y kh??ng ???????c b??? tr???ng!',
            'name.min' => '????? d??i t???i thi???u l?? 5 k?? t???!',
            'name.max' => '????? d??i t???i ??a l?? 250 k?? t???!',
            'email.email' => 'Email ch??a ????ng ?????nh d???ng!',
            'email.unique' => 'Email ???? t???n t???i!',
            'phone.unique' => 'S??? ??i???n tho???i ???? t???n t???i!',
            'image.image' => 'Kh??ng ????ng ?????nh d???ng ???nh!'
        ]);
        $adminModel = new AdminModel();
        //X??? l?? ???nh
        $image = $request->image;
        $nameImage = $image->getClientOriginalName();
        $folderImage = 'uploads/images/admin/';
        $newNameImage = $folderImage . 'user-' . time() . '-' . $nameImage;
        //custom $request
        $role = $request->role;
        $bcryptPassword = bcrypt($request->password);
        $city = $request->city;
        $request->merge([
            'id_role' => $role,
            'password' => $bcryptPassword,
            'path_image' => $newNameImage,
            'id_city' => $city
        ]);
        $adminModel::create($request->all());
        $image->move($folderImage, $newNameImage);
        return 1;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = AdminModel::leftJoin('tbl_city', 'tbl_admin.id_city', '=', 'tbl_city.id')
            ->leftJoin('tbl_district', 'tbl_admin.id_district', '=', 'tbl_district.id')
            ->leftJoin('tbl_ward', 'tbl_admin.id_ward', '=', 'tbl_ward.id')
            ->select('tbl_admin.*', 'tbl_city.name as nameCity', 'tbl_district.name as nameDistrict', 'tbl_ward.name as nameWard')
            ->findOrFail($id);
        return view('Admin.Admin.detail', [
            'title' => self::TITLE,
            'infoUser' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = AdminModel::findOrFail($id);
        $roles = RoleModel::all();
        $cities = DB::table('tbl_city')->get();
        return view('Admin.Admin.update', [
            'title' => self::TITLE,
            'user' => $user,
            'roles' => $roles,
            'cities'  => $cities
        ]);
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
        $adminModel = AdminModel::find($id);
        $request->validate([
            'role' => 'required',
            'name' => 'required|min:5|max:250',
            'email' => 'required|email|unique:tbl_admin,email,'.$id,
            'password' => 'required',
            'city' => 'required',
            'phone' => ['required',  new PhoneRule('S??? ??i???n tho???i kh??ng ????ng ?????nh d???ng!'), 'unique:tbl_admin,phone,'.$id],
            'image' => 'image'
        ], [
            'required' => 'Tr?????ng n??y kh??ng ???????c b??? tr???ng!',
            'name.min' => '????? d??i t???i thi???u l?? 5 k?? t???!',
            'name.max' => '????? d??i t???i ??a l?? 250 k?? t???!',
            'email.email' => 'Email ch??a ????ng ?????nh d???ng!',
            'email.unique' => 'Email ???? t???n t???i!',
            'phone.unique' => 'S??? ??i???n tho???i ???? t???n t???i!',
            'image.image' => 'Kh??ng ????ng ?????nh d???ng ???nh!'
        ]);
        //X??? l?? ???nh
        $newNameImage = $adminModel->path_image;
        if($request->hasFile('image')){
            $image = $request->image;
            $nameImage = $image->getClientOriginalName();
            $folderImage = 'uploads/images/admin/';
            $newNameImage = $folderImage . 'user-' . time() . '-' . $nameImage;
            unlink($adminModel->path_image);
            $image->move($folderImage, $newNameImage);   
        }
        //custom $request
        $role = $request->role;
        if($adminModel->password != $request->password){
            $md5Password = md5($request->password);
        }else{
            $md5Password = $request->password;
        }
        $city = $request->city;
        $request->merge([
            'id_role' => $role,
            'password' => $md5Password,
            'path_image' => $newNameImage,
            'id_city' => $city
        ]);
        $adminModel->update($request->all());
        return 1;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = AdminModel::destroy($id);
        if ($delete) { // x??a th??nh c??ng
            $statusCode = 200;
            $isSuccess = true;
        } else {
            $statusCode = 400;
            $isSuccess = false;
        }

        // Tr??? v??? d??? li???u json v?? tr???ng th??i k??m theo
        return response()->json(['isSuccess' => $isSuccess], $statusCode);
    }
}
