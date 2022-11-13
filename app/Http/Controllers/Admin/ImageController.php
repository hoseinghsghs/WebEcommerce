<?php

namespace App\Http\Controllers\Admin;

use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{

    public function UploadeImage($image, $directory, $height = null, $width = null)
    {

        if ($image) {

            //درایور پیش فرض ذخیره
            $filesystem = config('filesystems.default');

            //مسیر ذخیره سازی درایور پیش فرض
            $pach = config('filesystems.disks.' . $filesystem)['root'];

            //پسوند تصویر
            $extension = $image->extension();

            //ساخت نام تصویر از هلپر فانکشن
            $image_name = Persian_generateImageName($extension);



            if (!Storage::exists($directory)) {
                // این پوشه را بساز
                Storage::makeDirectory($directory);
            }

            if ($height && $width) {
                $img = Image::make($image)->resize($width, $height);

                $img->save($pach . '/' . $directory . '/' . $image_name);
            } else {

                $image->storeAs($directory, $image_name);

            }

            return $image_name;
        } else {

            return null;
        }
    }

    //////////////////ویرایش تصویر

    public function edit(Product $product)
    {
        return view('admin.page.products.edit_images', compact('product'));
    }

    public function edit_uploadImage(Request $request){
        $images = $request->file();
        if (count($images) > 0) {
            foreach ($images as $image) {
                $image_upload=ProductImage::where('image',$image)->get();
                $ImageController = new ImageController();
                $image_name = $ImageController->UploadeImage($image, "other_product_image" , 900 , 800);
                ProductImage::create([
                    'product_id' => $request->product,
                    'image' => $image_name
                ]);

                $paths[] = ['url' => $image_name];
            }

        }
        return response()->json($image_name, 200);
    }



    public function edit_deleteImage(Request $request){

       $product= Product::find($request->id);
            $namefile = $request->name;
            ProductImage::where('image',$namefile)->delete();
            Storage::delete('test/' .$namefile);
            return response()->json(['success' =>"تصویر حذف شد"]);

    }


    public function setPrimary(Request $request, Product $product,ToastrFactory $flasher)
    {

        $product =Product::find($request->product);

        if ($request->has('primary_image')) {

            if (isset($request->primary_image)) {
                $ImageController = new ImageController();
                $image_name = $ImageController->UploadeImage($request->primary_image, "primary_image", 900, 800);
            } else {
                $image_name = null;
            }

            $product->update([
                'primary_image' => $image_name
            ]);
            $flasher->addSuccess('محصول مورد نظر ویرایش شد');
            return redirect()->back();
        }
        $flasher->addSuccess('تصویر قبلی بدون ویرایش');
            return redirect()->back();
    }



}