<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Http\Controllers\Admin\ImageController;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::latest()->paginate(10);
        return view('admin.page.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ToastrFactory $flasher)
    {
        $request->validate(
            [
                'name' => 'unique:brands',
                'index' => 'unique:brands',
            ]
        );

        if (isset($request->is_active)) {
            $request->isactive = true;
        } else {
            $request->isactive = false;
        };

        if (isset($request->img)) {
            $ImageController = new ImageController();
            $image_name = $ImageController->UploadeImage($request->img, "brands", 205, 205);
        } else {
            $image_name = null;
        }

        Brand::create([
            'name' => $request->name,
            'index' => $request->index,
            'image' => $image_name,
            'is_active' => $request->isactive
        ]);
        $flasher->addSuccess('برند جدید ایجاد شد');
        return redirect()->route('admin.brands.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.page.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand, ToastrFactory $flasher)
    {
        $request->validate(
            [
                'name' => 'required',
                'index' => 'required',
            ]
        );
        
        if (isset($request->is_active)) {
            $request->isactive = true;
        } else {
            $request->isactive = false;
        };

        if (isset($request->img)) {
            if (Storage::exists('brands/' . $brand->image)) {
                Storage::delete('brands/' . $brand->image);
            }
            $ImageController = new ImageController();
            $image_name = $ImageController->UploadeImage($request->img, "brands", 180, 310);
        } else {
            $image_name = $brand->image;
        }

        $brand->update([
            'name' => $request->name,
            'index' => $request->index,
            'image' => $image_name,
            'is_active' => $request->isactive
        ]);

        $flasher->addSuccess('برند با موفقیت تغییر کرد');
        return redirect()->route('admin.brands.index');
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

    public function active(Request $request)
    {
    }
}