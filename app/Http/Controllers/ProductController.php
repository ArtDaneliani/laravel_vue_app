<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Product;
use App\Models\ProductTag;
use App\Models\Tag;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('product.index', compact('products'));
    }


    /*-----------------START CRUD------------------*/
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('product.create', compact('categories', 'tags'));
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'string',
            'price' => 'string',
            'sale_price' => 'string',
            'quantity' => 'integer',
            'description' => 'string',
            'image' => 'string',
            'status' => 'integer',
            'category_id' => '',
            'tags' => ''
        ]);
        $tags = $data['tags'];
        unset($data['tags']);
//        dd($tags, $data);

        $product = Product::create($data);
        $product->tags()->attach($tags);


        return redirect()->route('product.index');
    }

    public function show(Product $product)
    {
        $tags = Tag::all();
        return view('product.show', compact('product', 'tags'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('product.edit', compact('product', 'categories', 'tags'));
    }

    public function update(Product $product)
    {
        $data = request()->validate([
            'name' => 'string',
            'price' => 'string',
            'sale_price' => 'string',
            'quantity' => 'integer',
            'description' => 'string',
            'image' => 'string',
            'status' => 'integer',
            'category_id' => '',
            'tags' => '',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $product->update($data);
        $product->tags()->sync($tags);

        return redirect()->route('product.show', $product->id);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');
    }

    /*-----------------END CRUD------------------*/

    public function image_upload(Request $request)
    {
        $validatedData = $request->validate([
            'userfile' => 'image',
            'userfile.*' => 'mimetypes:image/jpeg,image/png,image/gif,image/webp',
        ]);


        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $key => $image) {
                $path = 'images';
                $name = $image->getClientOriginalName();

//                $insert[$key]['name'] = $name;
//                $insert[$key]['path'] = $path;

                Storage::putFileAs($path, $image, $name);
            }
        }

//        Product::insert($insert);

        return redirect()->route('product.index')->with('status', 'Несколько файлов загружены успешно');

//        if ($request->isMethod('post') && $request->file('userfile')) {
//            $request->validate([
//                // файл должен быть картинкой (jpeg, png, bmp, gif, svg или webp)
//                'userfile' => 'image',
//                // поддерживаемые MIME файла (image/jpeg, image/png)
////                'userfile' => 'mimetypes:image/jpeg,image/png,image/gif,image/webp',
//            ]);
//
//            $file = $request->file('userfile');
//            $upload_folder = 'images';
//            $filename = $file->getClientOriginalName(); // image.jpg
//
//            $path = Storage::putFileAs($upload_folder, $file, $filename);
//
//        }
//            return redirect()->route('product.index');
    }

    public function deleteProducts()
    {

//        DB::delete('delete from products where price = 54');
        DB::delete('delete from products');
//        $products = Product::find(4);
//        $products->delete();
        dump('deleted');
    }


    //firstOrCreate
    //updateOrCreate

    public function firstOrCreate()
    {
        $newProduct = Product::firstOrCreate([

            'price' => '55'
        ], [
            'name' => 'Samsung XDK',
            'price' => 54,
            'quantity' => 2,
            'image' => 'Dsamsung.jpg',
            'description' => 'description lorem ipsum samsung',
            'status' => 1,
        ]);

        dump($newProduct->description);
        dd('added');
    }

    public function updateOrCreate()
    {
        $newProduct = Product::updateOrCreate([
            'price' => 54
        ], [
            'name' => 'Motorola',
            'price' => 44,
            'quantity' => 20,
            'image' => 'motorola.jpg',
            'description' => 'description motorola',
            'status' => 1,
        ]);
        dump($newProduct->description);
        dd('updated');
    }
}
