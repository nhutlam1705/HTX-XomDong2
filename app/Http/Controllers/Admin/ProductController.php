<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Region;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function CreateProduct()
    {
        $categories = Category::all();
        return view('admin.ProductManager.Products.CreateProduct',compact('categories'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title_product' => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'image_product' => 'required|image|mimes:webp,jfif,jpeg,png,jpg,gif,svg|max:2048',
            'image_product1' => 'nullable|image|mimes:webp,jfif,jpeg,png,jpg,gif,svg|max:2048',
            'image_product2' => 'nullable|image|mimes:webp,jfif,jpeg,png,jpg,gif,svg|max:2048',
            'image_product3' => 'nullable|image|mimes:webp,jfif,jpeg,png,jpg,gif,svg|max:2048',
            'description_product' => 'required|string',
            'active_region_id' => 'nullable|exists:regions,id',
        ]);
        $data = $request->only('title_product', 'description_product');
        $data ['active_region_id'] = $request->input('active_region_id', 2);
        $data ['user_id'] = Auth::id();
        $data ['category_id'] = $request->input('category_id');

        $imageFields = ['image_product', 'image_product1', 'image_product2', 'image_product3'];

        foreach ($imageFields as $imageField) {
            if ($request->hasFile($imageField)) {
                $data[$imageField] = $request->file($imageField)->store('products', 'public');
            }
        }

        Product::create($data);
        return redirect()->route('Products.ShowProduct')->with('success', 'Product created successfully.');
    }
    public function ShowProductDetail(Product $product)
    {
        return view('admin.ProductManager.Products.ShowProductDetail', compact('product'));
    }

    public function ShowProduct()
    {
        $products = Product::all();
        // $products = Product::with('activeRegion')->get();
        // $products = Product::with('category')->get();
        return view('admin.ProductManager.Products.ShowProduct', compact('products'));
    }
    public function EditProduct(Product $product)
    {
        $categories = Category::all();
        return view('admin.ProductManager.Products.EditProduct', compact('product','categories'));
    }

    public function UpdateProduct(Request $request, Product $product)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'title_product' => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'image_product' => 'nullable|image|mimes:webp,jfif,jpeg,png,jpg,gif,svg|max:2048',
            'image_product1' => 'nullable|image|mimes:webp,jfif,jpeg,png,jpg,gif,svg|max:2048',
            'image_product2' => 'nullable|image|mimes:webp,jfif,jpeg,png,jpg,gif,svg|max:2048',
            'image_product3' => 'nullable|image|mimes:webp,jfif,jpeg,png,jpg,gif,svg|max:2048',
            'description_product' => 'required|string',
            'active_region_id' => 'nullable|exists:regions,id',
        ]);

        // Initialize an array to hold the data to be updated
        $data = $request->only('title_product', 'description_product');
        $data['active_region_id'] = $request->input('active_region_id', 2);
        $data['category_id'] = $request->input('category_id');
        $imageFields = ['image_product', 'image_product1', 'image_product2', 'image_product3'];

        foreach ($imageFields as $imageField) {
            if ($request->hasFile($imageField)) {
                if ($product->$imageField) {
                    Storage::disk('public')->delete($product->$imageField);
                }
                $data[$imageField] = $request->file($imageField)->store('products', 'public');
            }
        }
        $product->update($data);
        return redirect()->route('Products.ShowProduct')->with('success', 'Cập nhật thành công!... Vui lòng chờ Admin Duyệt');
    }

    public function DestroyProduct(Product $product)
    {
        $product->delete();
        return redirect()->route('Product.ShowProduct')->with('success', 'Xóa thành công. Vui lòng chờ Admin Duyệt ');
    }

    public function BrowserProduct()
    {
        $products = Product::where('active_region_id','!=', 1)->get();
        return view('admin.ProductManager.Products.BrowserProduct', compact('products'));
    }
    public function ApproveProduct($id)
    {
        $product = Product::findOrFail($id);
        // Thay đổi active_region_id thành 1 khi duyệt
        $product->active_region_id = 1;
        $product->save();

        return redirect()->route('Products.BrowserProduct')->with('success', 'Duyệt bài viết thành công.');
    }

    public function RejectProduct($id)
    {
        $product = Product::findOrFail($id);
        // Thay đổi active_region_id thành 3 khi từ chối
        $product->active_region_id = 3;
        $product->save();

        return redirect()->route('Products.BrowserProduct')->with('success', 'Từ chối bài viết thành công.');
    }
}
