<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\CategoryModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    const TITLE = 'Category';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $categories = CategoryModel::all();
            return DataTables::of($categories)->addColumn('action', function ($category) {
                $routeEdit = route('category.edit', $category->id);
                $routeDelete = route('category.delete', $category->id);
                $deleteAjax = "deleteItemAjax('$routeDelete')";
                $buttonEdit = '<button class="btn btn-sm btn-success" onclick="window.location.href=\'' . "$routeEdit'\">"
                    . '<i class="fas fa-pen-alt"></i>' . '</button>';
                $buttonDelete = '<button class="btn btn-sm btn-danger btn-delete" onclick="' . "$deleteAjax\">"
                    . ' <i class="fas fa-trash"></i>' . '</button>';
                return $buttonEdit . '    ' . $buttonDelete;
            })->make(true);
        }
        return view('Admin.Category.index', [
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
        return view('Admin.Category.create', [
            'title' => self::TITLE
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
            'name' => 'required|min:3|max:250|unique:tbl_role'
        ], [
            'name.required' => 'Trường này không được bỏ trống!',
            'name.min' => 'Trường này tối thiểu 3 ký tự!',
            'name.max' => 'Trường này tối đa 250 ký tự!',
            'name.unique' => 'Dữ liệu đã tồn tại! Vui lòng kiểm tra lại!'
        ]);
        $roleModel = new CategoryModel();
        $roleModel::create($request->all());
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
        $category = CategoryModel::findOrFail($id);
        return view('Admin.Category.update', [
            'title' => self::TITLE,
            'category' => $category
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
            'name' => 'required|min:3|max:250|unique:tbl_role'
        ], [
            'name.required' => 'Trường này không được bỏ trống!',
            'name.min' => 'Trường này tối thiểu 3 ký tự!',
            'name.max' => 'Trường này tối đa 250 ký tự!',
            'name.unique' => 'Dữ liệu đã tồn tại! Vui lòng kiểm tra lại!'
        ]);
        $categoryModel = CategoryModel::find($id);
        $categoryModel->update($request->all());
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
        $delete = CategoryModel::destroy($id);
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
