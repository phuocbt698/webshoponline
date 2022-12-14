<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AttributeModel;
use App\Models\Admin\CategoryModel;
use App\Models\Admin\ProductModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    const TITLE = 'Product';
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
        $categories = CategoryModel::all();
        return view('Admin.Product.create', [
            'title' => self::TITLE,
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
            'required' => 'Tr?????ng n??y kh??ng ???????c b??? tr???ng!',
            'name.min' => '????? d??i t???i thi???u l?? 5 k?? t???!',
            'name.max' => '????? d??i t???i ??a l?? 250 k?? t???!',
            'numeric' => 'Tr?????ng n??y nh???n gi?? tr??? s???',
            'image.image' => 'Kh??ng ????ng ?????nh d???ng ???nh!'
        ]);
        $adminModel = new ProductModel();
        //X??? l?? ???nh
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
