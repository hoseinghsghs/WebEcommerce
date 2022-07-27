<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductImage;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session ;
use Illuminate\Support\Facades\Storage;
use Flasher\Toastr\Prime\ToastrFactory;
use Verta;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('admin.page.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Session::forget('images');

        $brands=Brand::all();
        $tags=Tag::all();
        $categories=Category::where('parent_id','!=' , 0)->get();

        return view('admin.page.products.create' , compact('brands','tags','categories') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request ,ToastrFactory $flasher)
    {
        try {
            DB::beginTransaction();

        if (isset($request->primary_image)) {
            $ImageController = new ImageController();
            $image_name = $ImageController->UploadeImage($request->primary_image, "primary_image", 900, 800);
        } else {
            $image_name = null;
        }
        $product = Product::create([
            'name' => $request->name,
            'position' => $request->position,
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'primary_image' => $image_name,
            'description' => $request->description,
            'is_active' => $request->is_active,
            'delivery_amount' => $request->delivery_amount,
            'delivery_amount_per_product' => $request->delivery_amount_per_product,
        ]);
        $imagesStore = Session::pull('images', []);

        foreach ($imagesStore as $imageStore)
        {
            ProductImage::create([
                'product_id' => $product->id,
                'image' => $imageStore
        ]);
        }

        $productAttributeController = new ProductAttributeController();
        $productAttributeController->store($request->attribute_ids, $product);

        $category = Category::find($request->category_id);
        $productVariationController = new ProductVariationController();
        $productVariationController->store($request->variation_values, $category->attributes()->wherePivot('is_variation', 1)->first()->id, $product);

        $product->tags()->attach($request->tag_ids);
        DB::commit();
    } catch (\Exception $ex) {
        DB::rollBack();

        $flasher->addError('مشکل در ایجاد محصول');

        return redirect()->back();
    }
    Session::forget('images');
    $flasher->addSuccess('محصول مورد نظر ایجاد شد');
    return redirect()->route('admin.products.index');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product_attributes=$product->attributes()->with('attribute')->get();
        $product_variation=$product->variations()->with('attribute')->get();
        $images=$product->images;
        $tags=$product->tags;


        return view('admin.page.products.show',compact('product','product_attributes','product_variation','images','tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $brands=Brand::all();
        $tags=Tag::all();
        $categories=Category::where('parent_id','!=' , 0)->get();
        $product_attributes=$product->attributes()->with('attribute')->get();
        $product_variation=$product->variations()->with('attribute')->get();

        return view('admin.page.products.edit',compact('brands','tags','categories','product','product_attributes','product_variation'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product,ToastrFactory $flasher)
    {

  
        try {
            DB::beginTransaction();

            $product->update([
                'name' => $request->name,
                'position' => $request->position,
                'brand_id' => $request->brand_id,
                'description' => $request->description,
                'is_active' => $request->is_active,
                'delivery_amount' => $request->delivery_amount,
                'delivery_amount_per_product' => $request->delivery_amount_per_product,
            ]);

            $productAttributeController = new ProductAttributeController();
            $productAttributeController->update($request->attribute_values);

            $productVariationController = new ProductVariationController();
            $productVariationController->update($request->variation_values);

            $product->tags()->sync($request->tag_ids);

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            $flasher->addError('مشکل در ویرایش محصول');
            return redirect()->back();
        }

        $flasher->addSuccess('محصول مورد نظر ویرایش شد');
        return redirect()->route('admin.products.index');


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



    public function uploadImage(Request $request){

            $images = $request->file();


            if (count($images) > 0) {

                foreach ($images as $image) {

                    $ImageController = new ImageController();
                    $image_name = $ImageController->UploadeImage($image, "other_product_image" , 900 , 800);
                    Session::push('images', $image_name);
                    $paths[] = ['url' => $image_name];
                }

            }


            return response()->json($image_name, 200);


    }



    public function deleteImage(Request $request){

            $namefile = $request->name;
            ProductImage::where('image',$namefile)->delete();
            Storage::delete('test/' .$namefile);

            $images = Session::pull('images', []); // Second argument is a default value
            if(($key = array_search($namefile, $images)) !== false) {
                unset($images[$key]);
            }
            Session::put('images', $images);


            return response()->json(['success' =>"تصویر حذف شد"]);

    }

    //دسته بندی
    public function editCategory(Request $request, Product $product )
    {
        $categories = Category::where('parent_id', '!=', 0)->get();
        return view('admin.page.products.edit_category', compact('product' , 'categories'));
    }

    public function updateCategory(Request $request, Product $product,ToastrFactory $flasher)
    {


        $request->validate([
            'category_id' => 'required',
            'attribute_ids' => 'required',
            'attribute_ids.*' => 'required',
            'variation_values' => 'required',
            'variation_values.*.*' => 'required',
            'variation_values.price.*' => 'integer',
            'variation_values.quantity.*' => 'integer'
        ]);



            $product->update([
                'category_id' => $request->category_id
            ]);

            if(isset($request->attribute_ids)){
            $productAttributeController = new ProductAttributeController();
            $productAttributeController->change($request->attribute_ids, $product);
            }
            if(isset($request->category_id)){
            $category = Category::find($request->category_id);
            $productVariationController = new ProductVariationController();
            $productVariationController->change($request->variation_values, $category->attributes()->wherePivot('is_variation', 1)->first()->id, $product);
            }
        $flasher->addSuccess('ویژگی مورد نظر ویرایش شد');

        return redirect()->route('admin.products.index');
    }
}