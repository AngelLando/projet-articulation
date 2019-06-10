<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Tag;
use App\Type;
use App\Http\Controllers\AppellationController;
use App\Http\Controllers\TagsController;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $products = Product::all();
        if ($id != null) {
            foreach ($products as $key => $val) {
                switch ($id) {
                    case ($id == 'Offre spéciale') :
                        if ($val->promotion->type != 'Offre spéciale') {
                            unset($products[$key]);
                        }
                        break;
                    case ($id == 'Nouveautés') :
                        $myDate = date("Y-m-d", strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "-1 month" ) );
                        if ($val->created_at < $myDate) {
                            unset($products[$key]);
                        }
                        break;
                    case ($id == 'Primeur') :
                        if ($val->type->name != 'Primeur') {
                            unset($products[$key]);
                        }
                        break;
                    case ($id == 'Offre du mois') :
                        if ($val->promotion->type != 'Offre du mois') {
                            unset($products[$key]);
                        }
                        break;
                }
            }
        }

        $tab = [];
        $allProducts = [];

        foreach ($products as $key => $product) {
            $newProduct = $this->getAllData($products[$key]);
            array_push($allProducts, $newProduct);
            //dd($newProduct);
        }

        $tab['products'] = $allProducts;
        $tab['appellations'] = AppellationController::index();
        $tab['tags'] = TagController::index();

        if($id == 'Recommandations') {
            $ratings = array_column($tab['products'], 'productRating');
            array_multisort($ratings, SORT_DESC, $tab['products']);
            $tab['products'] = array_slice($tab['products'], 0, 6);
        }

        // CONVERT ARRAY TO JSON TO PASS DATAS
        $json = json_encode($tab);
        return $json;
        //return view('homepage')->with('products', $json);
    }

    public function single($slug)
    {
        $products = [];
        $rawProduct = Product::where('slug', $slug)->firstOrFail();
        $recommandations = $this->getRecommandations($rawProduct);
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

    public static function getAllData($product)
    {
        $newProduct = [];
        $newProduct['id'] = $product->id;
        $newProduct['name'] = $product->name;
        $newProduct['kind'] = $product->kind;
        $newProduct['year'] = $product->year;
        $newProduct['description'] = $product->description;
        $newProduct['price'] = $product->price;
        $newProduct['path_image'] = $product->path_image;
        $newProduct['type'] = $product->type->name;
        $newProduct['supplier'] = $product->supplier->name;
        $newProduct['region'] = $product->supplier->region->name;
        $newProduct['country'] = $product->supplier->region->country->name;
        $newProduct['stock'] = $product->stock;
        $newProduct['alcohol'] = $product->alcohol;
        $newProduct['format'] = $product->format->name;
        $newProduct['quotation'] = $product->quotation;
        $newProduct['slug'] = $product->slug;
        $newProduct['tag'] = $product->tags;
        $newProduct['appellation'] = $product->appellations;
        $newProduct['promotion'] = $product->promotion->amount;
        $rating = $product->productRatings->avg('value');
        $newProduct['productRating'] = $rating;
        $newProduct['packaging_capacity'] = $product->format->packagings->first()->capacity;
        $newProduct['packagings'] = $product->format->packagings;
        return $newProduct;
    }

    public function getRecommandations($rawProduct)
    {
        $recommandations = [];
        $recommandationProduct = Product::where([
                ['kind', $rawProduct->kind],
                ['id', '!=', $rawProduct->id]]
        )->get()->take(3);
        foreach ($recommandationProduct as $recommandation) {
            $newRecommandation = $this->getAllData($recommandation);
            array_push($recommandations, $newRecommandation);
        }
        return $recommandations;
    }
}
