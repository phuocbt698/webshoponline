<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AttributeModel;
use App\Models\Admin\ValueModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ValueController extends Controller
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
            $values = ValueModel::all();
            return DataTables::of($values)->addColumn('attribute', function ($value) {
                return $value->attribute->name;
            })->addColumn('action',function($value){
                $routeEdit = route('value.edit', $value->id);
                $routeDelete = route('value.delete', $value->id);
                $deleteAjax = "deleteItemAjax('$routeDelete')";
                $buttonEdit = '<button class="btn btn-sm btn-success" onclick="window.location.href=\'' . "$routeEdit'\">"
                        . '<i class="fas fa-pen-alt"></i>' . '</button>';
                $buttonDelete = '<button class="btn btn-sm btn-danger btn-delete" onclick="' . "$deleteAjax\">"
                              .' <i class="fas fa-trash"></i>'.'</button>';
                return $buttonEdit . '    ' . $buttonDelete;
            })->rawColumns(['attribute', 'action'])->make(true);          
        }
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
            'value' => 'required|max:250|unique:tbl_value_attribute'
        ], [
            'value.required' => 'Trường này không được bỏ trống!',
            'value.max' => 'Trường này tối đa 250 ký tự!',
            'value.unique' => 'Dữ liệu đã tồn tại! Vui lòng kiểm tra lại!'
        ]);
        $ValueModel = new ValueModel();
        $ValueModel::create($request->all());
        return true;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ValueModel = ValueModel::find($id);
        $idAttribute = $ValueModel->id_attribute;
        $attribute = AttributeModel::findOrFail($idAttribute);
        return view('Admin.Attribute.detail', [
            'title' => self::TITLE,
            'active' => self::ACTIVE,
            'values' => $ValueModel,
            'infoAttribute' => $attribute
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
            'value' => 'required|max:250|unique:tbl_value_attribute'
        ], [
            'value.required' => 'Trường này không được bỏ trống!',
            'value.max' => 'Trường này tối đa 250 ký tự!',
            'value.unique' => 'Dữ liệu đã tồn tại! Vui lòng kiểm tra lại!'
        ]);
        $ValueModel = ValueModel::find($id);
        $ValueModel->update($request->all());
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
        $delete = ValueModel::destroy($id);
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
