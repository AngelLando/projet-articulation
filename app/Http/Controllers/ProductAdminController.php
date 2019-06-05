<?php

namespace App\Http\Controllers;

use Session;
use App\Product;
use App\Format;
use App\Type;
use App\Supplier;
use App\Promotion;
use App\Packaging;
use App\Appellation;
use App\Tag;
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
        return view('admin.products.index')->with('products', Product::orderBy('created_at', 'desc')->paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create')->with('products', Product::all())
                                            ->with('formats', Format::all())
                                            ->with('types', Type::all())
                                            ->with('suppliers', Supplier::all())
                                            ->with('promotions', Promotion::all())
                                            ->with('packagings', Packaging::all())
                                            ->with('appellations', Appellation::all())
                                            ->with('tags', Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kind' => 'required',
            'name' => 'required',
            'year' => 'required|numeric',
            'description' => '',
            'price' => 'required|numeric',
            'path_image' => 'required|file',
            'weight' => 'numeric',
            'stock' => 'numeric',
            'alcohol' => 'numeric',
            'quotation' => '',
            'format' => 'required',
            'type' => 'required',
            'supplier' => 'required',
            'promotion' => 'required',
            'packagings' => 'required',
            'appellations' => '',
            'tags' => ''
        ]);

        $path_image = $request->path_image;
        $rename = time().$path_image->getClientOriginalName();
        $path_image->move('uploads/products', $rename);

        $product = Product::create([
            'kind' => $request->kind,
            'name' => $request->name,
            'year' => $request->year,
            'description' => $request->description,
            'price' => $request->price,
            'path_image' => 'uploads/products/' . $rename,
            'weight' => $request->weight,
            'stock' => $request->stock,
            'alcohol' => $request->alcohol,
            'quotation' => $request->quotation,
            'slug' => str_slug($request->name),
            'format_id' => $request->format,
            'type_id' => $request->type,
            'supplier_id' => $request->supplier,
            'promotion_id' => $request->promotion,
        ]);

        $product->format->packagings()->attach($request->packagings);
        $product->appellations()->attach($request->appellations);
        $product->tags()->attach($request->tags);

        Session::flash('success', 'Le produit a été créé!');

        return redirect()->route('produits.index');
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
                                            ->with('suppliers', Supplier::all())
                                            ->with('promotions', Promotion::all())
                                            ->with('packagings', Packaging::all())
                                            ->with('appellations', Appellation::all())
                                            ->with('tags', Tag::all());
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
        $this->validate($request, [
            'kind' => 'required',
            'name' => 'required',
            'year' => 'required|numeric',
            'description' => '',
            'price' => 'required|numeric',
            'path_image' => '',
            'weight' => 'numeric',
            'stock' => 'numeric',
            'alcohol' => 'numeric',
            'quotation' => '',
            'format' => 'required',
            'type' => 'required',
            'supplier' => 'required',
            'promotion' => 'required',
            'packagings' => 'required',
            'appellations' => '',
            'tags' => ''
        ]);

        $product = Product::find($id);

        $product->kind = $request->kind;
        $product->name = $request->name;
        $product->year = $request->year;
        $product->description = $request->description;
        $product->price = $request->price;
        if($request->hasFile('path_image')) {
            $path_image = $request->path_image;
            $rename = time() . $path_image->getClientOriginalName();
            $path_image->move('uploads/products', $rename);
            $product->path_image = 'uploads/products/' . $rename;
        }
        $product->weight = $request->weight;
        $product->stock = $request->stock;
        $product->alcohol = $request->alcohol;
        $product->quotation = $request->quotation;
        $product->slug = str_slug($request->name);
        $product->format_id = $request->format;
        $product->type_id = $request->type;
        $product->supplier_id = $request->supplier;
        $product->promotion_id = $request->promotion;
        $product->format->packagings()->sync($request->packagings);
        $product->appellations()->sync($request->appellations);
        $product->tags()->sync($request->tags);

        $product->save();

        Session::flash('success', 'Produit mis à jour!');

        return redirect()->route('produits.index');
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

        return redirect()->route('produits.index');
    }
}
