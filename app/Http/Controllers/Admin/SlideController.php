<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\SlideModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SlideController extends Controller
{
    const TITLE = 'Slide';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $slides = SlideModel::get();
            return DataTables::of($slides)->addColumn('action', function ($slide) {
                    $routeDetail = route('slide.detail', $slide->id);
                    $routeEdit = route('slide.edit', $slide->id);
                    $routeDelete = route('slide.delete', $slide->id);
                    $deleteAjax = "deleteItemAjax('$routeDelete')";
                    $buttonDetail = '<button class="btn btn-sm btn-warning" onclick="window.location.href=\'' . "$routeDetail'\">"
                        . '<i class="fas fa-eye"></i>' . '</button>';
                    $buttonEdit = '<button class="btn btn-sm btn-success" onclick="window.location.href=\'' . "$routeEdit'\">"
                        . '<i class="fas fa-pen-alt"></i>' . '</button>';
                    $buttonDelete = '<button class="btn btn-sm btn-danger btn-delete" onclick="' . "$deleteAjax\">"
                        . ' <i class="fas fa-trash"></i>' . '</button>';
                    return $buttonDetail . '    ' . $buttonEdit . '    ' . $buttonDelete;
                })->rawColumns(['action'])->make(true);
        }
        return view('Admin.Slide.index', [
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
        return view('Admin.Slide.create',  [
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
            'title' => 'required|min:5|max:250',
            'content' => 'required|min:5|max:250',
            'image' => 'required|image',
            'time_start' => 'required',
            'time_end' => 'required|after:time_start'
        ], [
            'required' => 'Trường này không được bỏ trống!',
            'title.min' => 'Độ dài tối thiểu là 5 ký tự!',
            'title.max' => 'Độ dài tối đa là 250 ký tự!',
            'content.min' => 'Độ dài tối thiểu là 5 ký tự!',
            'content.max' => 'Độ dài tối đa là 250 ký tự!',
            'image.image' => 'Không đúng định dạng ảnh!',
            'time_end.after' => 'Thời gian kết thúc phải sau ngày bắt đầu!'
        ]);
        $slideModel = new SlideModel();
        //Xử lý ảnh
        $image = $request->image;
        $nameImage = $image->getClientOriginalName();
        $folderImage = 'uploads/images/slide/';
        $newNameImage = $folderImage . 'slide-' . time() . '-' . $nameImage;
        //custom $request

        $request->merge([
            'path_image' => $newNameImage,    
        ]);
        $slideModel::create($request->all());
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
        $slide = SlideModel::find($id);
        return view('Admin.Slide.detail', [
            'title' => self::TITLE,
            'infoSlide' => $slide
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
        $slide = SlideModel::findOrFail($id);
        return view('Admin.Slide.update', [
            'title' => self::TITLE,
            'slide' => $slide
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
        $slideModel = SlideModel::find($id);
        $request->validate([
            'title' => 'required|min:5|max:250',
            'content' => 'required|min:5|max:250',
            'image' => 'image',
            'time_start' => 'required',
            'time_end' => 'required|after:time_start'
        ], [
            'required' => 'Trường này không được bỏ trống!',
            'title.min' => 'Độ dài tối thiểu là 5 ký tự!',
            'title.max' => 'Độ dài tối đa là 250 ký tự!',
            'content.min' => 'Độ dài tối thiểu là 5 ký tự!',
            'content.max' => 'Độ dài tối đa là 250 ký tự!',
            'image.image' => 'Không đúng định dạng ảnh!',
            'time_end.after' => 'Thời gian kết thúc phải sau ngày bắt đầu!'
        ]);
        //Xử lý ảnh
        $newNameImage = $slideModel->path_image;
        if($request->hasFile('image')){
            $image = $request->image;
            $nameImage = $image->getClientOriginalName();
            $folderImage = 'uploads/images/slide/';
            $newNameImage = $folderImage . 'slide-' . time() . '-' . $nameImage;
            unlink($slideModel->path_image);
            $image->move($folderImage, $newNameImage);   
        }
        $request->merge([
            'path_image' => $newNameImage
        ]);
        $slideModel->update($request->all());
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
        $delete = SlideModel::destroy($id);
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
