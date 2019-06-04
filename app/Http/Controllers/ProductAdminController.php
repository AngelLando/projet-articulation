<?php

namespace App\Http\Controllers;

use Session;
use App\Product;
use App\Format;
use App\Type;
use App\Supplier;
use Illuminate\Http\Request;

class ProductAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products.index')->with('products', Product::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $categories = Category::all();

        //if($categories->count() == 0 || $tags->count() == 0) {
        //  Session::flash('info', 'You must have categories and tags before attempting to create a post!');
        //  return redirect()->back();
        //}

        return view('admin.products.create');
        // ->with('categories', $categories)
        // ->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        return view('admin.products.edit')->with('product', $product)
                                            ->with('products', Product::all())
                                            ->with('formats', Format::all())
                                            ->with('types', Type::all())
                                            ->with('suppliers', Supplier::all());
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
        // Validation des données
        $this->validate($request, [
            'kind' => '',
            'name' => '',
            'year' => '',
            'description' => '',
            'path_image' => '',
            'weight' => '',
            'stock' => '',
            'alcohol' => '',
            'quotation' => '',
        ]);

        $product = Product::find($id);

        if($request->hasFile('path_image')) {
            $path_image = $request->path_image;
            $rename = time() . $path_image->getClientOriginalName();
            $path_image->move('uploads/products', $rename);
            $product->path_image = 'uploads/products/' . $rename;
        }

        $product->kind = $request->kind;
        $product->name = $request->name;
        $product->year = $request->year;
        $product->description = $request->description;
        $product->weight = $request->weight;
        $product->stock = $request->stock;
        $product->alcohol = $request->alcohol;
        $product->quotation = $request->quotation;
        $product->slug = str_slug($request->name);

        $product->save();

        Session::flash('success', 'Produit mis à jour!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);

        Session::flash('success', 'Le produit a été supprimé!');

        return redirect()->route('products.index');
    }
}
