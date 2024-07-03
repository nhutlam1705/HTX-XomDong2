<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Introduction;
use App\Models\Product;
use App\Models\Category;
use App\Models\Event;

class HomeController extends Controller
{
    public function index() {
        $introduction = Introduction::where('active_region_id', 1)
            ->orderBy('id', 'desc')
            ->take(3)
            ->get();
        $product = Product::where('active_region_id', 1) 
            ->orderBy('id', 'desc')
            ->get();
        $events = Event::where('active_region_id', 1)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('pages.home', compact('introduction','product','events'));
        
    }

    public function introduceDetail($id)
    {
        $introduction = Introduction::findOrFail($id);
        if ($introduction->active_region_id != 1) {
            abort(404, 'Page not found.');
        }
        return view('pages.IntroduceDetail', compact('introduction'));
    }
    public function ProductDetail($id)
    {
        $productfindone = Product::findOrFail($id);
        if ($productfindone->active_region_id != 1) {
            abort(404, 'Page not found.');
        }

        $productcategory = Product::where('category_id', $productfindone->category_id)
        ->where('id', '!=', $productfindone->id)
        ->where('active_region_id', 1)
        ->orderBy('id', 'desc')
        ->get();

         $product = Product::where('active_region_id', 1) 
            ->orderBy('id', 'desc')
            ->get();
        return view('pages.ProductDetail', compact('productfindone','product','productcategory'));
    }

    public function Product()
    {
        // Lấy tất cả danh mục và các sản phẩm thuộc về mỗi danh mục
        $categories = Category::where('active_region_id', 1)
            ->with(['products' => function($query) {
                $query->where('active_region_id', 1)
                      ->orderBy('id', 'desc');
            }])
            ->orderBy('id', 'desc')
            ->get();

        return view('pages.Product', compact('categories'));
    }
    public function Introduce(Request $request)
    {
        $introduction = Introduction::where('active_region_id', 1)
            ->orderBy('id', 'desc')
            ->get();
        $event = Event::where('active_region_id', 1)
            ->orderBy('id', 'desc')
            ->get();
        $eventNews = Event::where('active_region_id', 1) 
            ->orderBy('id', 'desc')
            ->take(3)
            ->get();
        $eventHot = Event::find(6);

        return view('pages.introduce', compact('introduction','event','eventNews','eventHot'));
    }
    public function Contact()
    {
        return view('pages.contact');
    }

    public function Event(Request $request){
        $event = Event::where('active_region_id', 1)
        ->orderBy('id', 'desc')
        ->get();

        $eventNews = Event::where('active_region_id', 1) 
        ->orderBy('id', 'desc')
        ->take(3)
        ->get();
        $eventHot = Event::find(6);
    return view('pages.event', compact('event','eventNews','eventHot'));
    }

    public function EventDetail($id)
    {
        $event = Event::findOrFail($id);
        if ($event->active_region_id != 1) {
            abort(404, 'Page not found.');
        }
        $eventNews = Event::where('active_region_id', 1) 
        ->orderBy('id', 'desc')
        ->take(3)
        ->get();
        $eventHot = Event::find(6);
        return view('pages.EventDetail', compact('event','eventNews','eventHot'));
    }

}
