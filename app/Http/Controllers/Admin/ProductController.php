<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\CategoryModel;
use App\Models\Admin\ProductModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    const TITLE = 'Product';
    const ACTIVE = 'Product';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // $admins = AdminModel::all();
            $products = ProductModel::get();
            return DataTables::of($products)->addColumn('category', function ($product) {
                return $product->category->name;
            })
                ->addColumn('action', function ($product) {
                    $routeDetail = route('product.detail', $product->id);
                    $routeEdit = route('product.edit', $product->id);
                    $routeDelete = route('product.delete', $product->id);
                    $deleteAjax = "deleteItemAjax('$routeDelete')";
                    $buttonDetail = '<button class="btn btn-sm btn-warning" onclick="window.location.href=\'' . "$routeDetail'\">"
                        . '<i class="fas fa-eye"></i>' . '</button>';
                    $buttonEdit = '<button class="btn btn-sm btn-success" onclick="window.location.href=\'' . "$routeEdit'\">"
                        . '<i class="fas fa-pen-alt"></i>' . '</button>';
                    $buttonDelete = '<button class="btn btn-sm btn-danger btn-delete" onclick="' . "$deleteAjax\">"
                        . ' <i class="fas fa-trash"></i>' . '</button>';
                    return $buttonDetail . '    ' . $buttonEdit . '    ' . $buttonDelete;
                })->rawColumns(['category', 'action'])->make(true);
        }
        return view('Admin.Product.index', [
            'title' => self::TITLE,
            'active' => self::ACTIVE,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CategoryModel::all();
        return view('Admin.Product.create', [
            'title' => self::TITLE,
            'active' => self::ACTIVE,
            'categories' => $categories
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
            'category' => 'required',
            'name' => 'required|min:5|max:250',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'image' => 'required|image',
            'description' => 'required'
        ], [
            'required' => 'Trường này không được bỏ trống!',
            'name.min' => 'Độ dài tối thiểu là 5 ký tự!',
            'name.max' => 'Độ dài tối đa là 250 ký tự!',
            'numeric' => 'Trường này nhận giá trị số',
            'image.image' => 'Không đúng định dạng ảnh!'
        ]);
        $adminModel = new ProductModel();
        //Xử lý ảnh
        $image = $request->image;
        $nameImage = $image->getClientOriginalName();
        $folderImage = 'uploads/images/product/';
        $newNameImage = $folderImage . 'product-' . time() . '-' . $nameImage;
        //custom $request
        $category = $request->category;
        $request->merge([
            'id_category' => $category,
            'path_image' => $newNameImage
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
        $product = ProductModel::findOrFail($id);
        return view('Admin.Product.detail', [
            'title' => self::TITLE,
            'active' => self::ACTIVE,
            'infoProduct' => $product
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
