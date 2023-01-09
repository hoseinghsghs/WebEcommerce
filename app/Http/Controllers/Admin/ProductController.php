<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Flasher\Toastr\Prime\ToastrFactory;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('admin.page.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product_attributes = $product->attributes()->with('attribute')->get();
        $product_variation = $product->variations()->with('attribute')->get();
        $images = $product->images;
        $tags = $product->tags;
        return view('admin.page.products.show', compact('product', 'product_attributes', 'product_variation', 'images', 'tags'));
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

    public function uploadImage(Request $request)
    {
        $images = $request->file();
        if (count($images) > 0) {
            foreach ($images as $image) {
                $ImageController = new ImageController();
                $image_name = $ImageController->UploadeImage($image, "other_product_image", 900, 800);
                Session::push('images', $image_name);
                $paths[] = ['url' => $image_name];
            }
        }
        return response()->json($image_name, 200);
    }

    public function deleteImage(Request $request)
    {

        $namefile = $request->name;
        ProductImage::where('image', $namefile)->delete();
        Storage::delete('test/' . $namefile);

        $images = Session::pull('images', []); // Second argument is a default value
        if (($key = array_search($namefile, $images)) !== false) {
            unset($images[$key]);
        }
        Session::put('images', $images);

        return response()->json(['success' => "تصویر حذف شد"]);
    }

    public function editCategory(Request $request, Product $product)
    {
        $categories = Category::where('parent_id', 0)->with('children.children')->get();
        return view('admin.page.products.edit_category', compact('product', 'categories'));
    }

    public function updateCategory(Request $request, Product $product, ToastrFactory $flasher)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'attribute_ids' => 'required|array',
            'attribute_ids.*' => 'required|string',
            'variation_values' => 'required|array',
            'variation_values.value.*' => 'required|string|distinct',
            'variation_values.price.*' => 'required|integer',
            'variation_values.quantity.*' => 'required|integer',
            'variation_values.sku.*' => 'nullable|string|distinct|unique:product_variations,sku',
            'variation_values.guarantee.*' => 'nullable|string',
            'variation_values.time_guarantee.*' => 'nullable|string',
        ]);

        $product->update([
            'category_id' => $request->category_id
        ]);

        if (isset($request->attribute_ids)) {
            $productAttributeController = new ProductAttributeController();
            $productAttributeController->change($request->attribute_ids, $product);
        }
        if (isset($request->category_id)) {
            $category = Category::find($request->category_id);
            $productVariationController = new ProductVariationController();
            $productVariationController->change($request->variation_values, $category->attributes()->wherePivot('is_variation', 1)->first()->id, $product);
        }
        $flasher->addSuccess('دسته‌بندی محصول مورد نظر ویرایش شد');

        return redirect()->route('admin.products.index');
    }

    public function archive()
    {
        return view('admin.page.products.archive');
    }
}
