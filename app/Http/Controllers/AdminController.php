<?php

namespace App\Http\Controllers;

use App\Category;
use App\Faq;
use App\Image;
use App\Product;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $hot = Product::where('hot', true)
            ->orderBy('hot_order', 'asc')->get();

        return view('admin.index', ['products' => $products, 'hots' => $hot]);
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.products.new', ['categories' => $categories, 'tags' => $tags]);
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.products.edit', ['product' => $product, 'categories' => $categories, 'tags' => $tags]);
    }

    public function setHotItems(Request $request)
    {
        $hots = $request->hots;

        $hotCollection = collect($hots);

        if(count($hotCollection->unique()->values()->all()) < 4)
        {
            return redirect()->to('/admin/#hot-errors')->withErrors(['You can not select duplicate hot items']);
        }


        Product::where('hot', true)->update(['hot' => false, 'hot_order' => null]);

        foreach ($hots as $key => $hot) {
            $prod = Product::find($hot);
            $prod->hot = true;
            $prod->hot_order = $key;
            $prod->save();
        }
        return redirect()->back();
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id'
        ]);
        if ($request->photos) {
            $product = Product::create([
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
                'category_id' => $request->category_id
            ]);
            $this->savePhotos($request->photos, $product->id);
        } else {
            return redirect()->back()->withErrors(['A product needs at least one image'])->withInput();;
        }

        $tags = $request->tags;

        foreach ($tags as $tag) {
            $product->tags()->attach($tag);
        }

        return redirect('/admin/products/' . $product->id . '/edit');
    }

    public function deleteImage($id)
    {
        Image::find($id)->delete();

        return 'true';
    }

    private function savePhotos($photos, $id)
    {
        foreach ($photos as $photo) {
            // Check if src is from db or new image
            if (explode("/", $photo)[1] != "storage") {

                $fileName = uniqid() . '.png';
                $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $photo));
                Storage::disk('public')->put($fileName, $data);
                Image::create([
                    'image' => $fileName,
                    'product_id' => $id
                ]);
            }
        }
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $this->validate($request, [
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id'
        ]);
        if ($request->photos) {
            $this->savePhotos($request->photos, $product->id);
        } else {
            return redirect()->back()->withErrors(['A product needs at least one image'])->withInput();
        }

        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category_id = $request->category_id;

        $tags = $request->tags;

        foreach ($tags as $tag) {
            $product->tags()->attach($tag);
        }

        $product->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if($product->hot) {
            $next = Product::where('hot', false)->first();
            $next->hot = true;
            $next->hot_order = $product->hot_order;
            $next->save();
        }

        $product->delete();

        return response(['msg' => 'Product deleted', 'status' => 'success']);
    }

    public function faq()
    {
        $faqs = Faq::all();

        return view('admin.faq', ['faqs' => $faqs]);
    }
}
