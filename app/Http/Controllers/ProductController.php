<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = ['products' => Product::all()];

        $products = $all['products'];
        $tab = [];
        $allProducts = [];
        foreach ($products as $product) {
            $newProduct = $this->getAllData($product);
            array_push($allProducts, $newProduct);
        }
        $tab['products'] = $allProducts;

        // CONVERT ARRAY TO JSON TO PASS DATAS
        $json = json_encode($tab);
        return view('homepage')->with('products', $json);
    }

    public function single($slug)
    {
        $products = [];
        $recommandations = [];
        $rawProduct = Product::where('slug', $slug)->firstOrFail();
        $recommandationProduct = Product::where([
                ['kind', $rawProduct->kind],
                ['id', '!=', $rawProduct->id]]
        )->get()->take(3);
        foreach ($recommandationProduct as $recommandation) {
            $newRecommandation = $this->getAllData($recommandation);
            array_push($recommandations, $newRecommandation);
        }

        $product = $this->getAllData($rawProduct);
        $products['product'] = $product;
        $products['products'] = $recommandations;
        $json = json_encode($products);
        return view('single')->with('products', $json);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product = ['products' => $product::all()];
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public static function getById($id)
    {
        return ['product' => Product::where('id', $id)->firstOrFail()];
    }

    public function getAllData($product)
    {
        $newProduct = [];
        $newProduct['id'] = $product->id;
        $newProduct['name'] = $product->name;
        $newProduct['kind'] = $product->kind;
        $newProduct['year'] = $product->year;
        $newProduct['path_image'] = $product->path_image;
        $newProduct['type'] = $product->type->name;
        $newProduct['supplier'] = $product->supplier->name;
        $newProduct['region'] = $product->supplier->region->name;
        $newProduct['country'] = $product->supplier->region->country->name;
        $newProduct['stock'] = $product->stock;
        $newProduct['description'] = $product->description;
        $newProduct['alcohol'] = $product->alcohol;
        $newProduct['format'] = $product->format->name;
        $newProduct['quotation'] = $product->quotation;
        $newProduct['slug'] = $product->slug;
        $newProduct['price'] = $product->prices[0]->amount;
        $newProduct['tag'] = $product->tags[0]->name;
        $newProduct['appellation'] = $product->appellations[0]->name;
        //$newProduct['productRating'] = $product->productRatings[0]->value;
        $newProduct['packaging_capacity'] = $product->format->packagings[0]->capacity;
        return $newProduct;
    }
}
