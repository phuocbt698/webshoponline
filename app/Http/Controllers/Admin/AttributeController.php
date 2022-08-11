<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AttributeModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AttributeController extends Controller
{
    const TITLE = 'Product';
    const ACTIVE = 'Attribute';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $attributes = AttributeModel::all();
            return DataTables::of($attributes)->addColumn('action',function($attribute){
                $routeDetail = route('attribute.detail', $attribute->id);
                $routeEdit = route('attribute.edit', $attribute->id);
                $routeDelete = route('attribute.delete', $attribute->id);
                $deleteAjax = "deleteItemAjax('$routeDelete')";
                $buttonDetail = '<button class="btn btn-sm btn-warning" onclick="window.location.href=\'' . "$routeDetail'\">"
                        . '<i class="fas fa-eye"></i>' . '</button>';
                $buttonEdit = '<button class="btn btn-sm btn-success" onclick="window.location.href=\'' . "$routeEdit'\">"
                              .'<i class="fas fa-pen-alt"></i>'.'</button>';
                $buttonDelete = '<button class="btn btn-sm btn-danger btn-delete" onclick="' . "$deleteAjax\">"
                              .' <i class="fas fa-trash"></i>'.'</button>';
                return $buttonDetail . '    ' . $buttonEdit . '    ' . $buttonDelete;
            })->make(true);          
        }
        return view('Admin.attribute.index', [
            'title'=>self::TITLE,
            'active'=>self::ACTIVE
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.attribute.create', [
            'title'=>self::TITLE,
            'active'=>self::ACTIVE
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
            'name' => 'required|min:3|max:250|unique:tbl_attribute'
        ], [
            'name.required' => 'Trường này không được bỏ trống!',
            'name.min' => 'Trường này tối thiểu 3 ký tự!',
            'name.max' => 'Trường này tối đa 250 ký tự!',
            'name.unique' => 'Dữ liệu đã tồn tại! Vui lòng kiểm tra lại!'
        ]);
        $AttributeModel = new AttributeModel();
        $AttributeModel::create($request->all());
        return true;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $attribute = AttributeModel::findOrFail($id);
        return view('Admin.Attribute.detail', [
            'title' => self::TITLE,
            'active' => self::ACTIVE,
            'infoAttribute' => $attribute
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
        $attribute = AttributeModel::findOrFail($id);
        return view('Admin.attribute.update', [
            'title' => self::TITLE,
            'active' => self::ACTIVE,
            'attribute' => $attribute
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
        $request->validate([
            'name' => 'required|min:3|max:250|unique:tbl_attribute'
        ], [
            'name.required' => 'Trường này không được bỏ trống!',
            'name.min' => 'Trường này tối thiểu 3 ký tự!',
            'name.max' => 'Trường này tối đa 250 ký tự!',
            'name.unique' => 'Dữ liệu đã tồn tại! Vui lòng kiểm tra lại!'
        ]);
        $AttributeModel = AttributeModel::find($id);
        $AttributeModel->update($request->all());
        return true;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = AttributeModel::destroy($id);
        if ($delete) { // xóa thành công
            $statusCode = 200;
            $isSuccess = true;
        } else {
            $statusCode = 400;
            $isSuccess = false;
        }

        // Trả về dữ liệu json và trạng thái kèm theo
        return response()->json(['isSuccess' => $isSuccess], $statusCode);
    }
}
