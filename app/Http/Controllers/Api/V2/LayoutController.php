<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use App\Http\Resources\V2\BannerCollection;
use App\Http\Resources\V2\CategoryWithProductsCollection;
use App\Http\Resources\V2\ProductMini2Collection;
use App\Models\Category;
use App\Models\Product;
use Auth;
use Illuminate\Http\Request;

class LayoutController extends Controller
{

    public function __construct() {
        $authorizationHeader = \request()->header('Authorization');
        if(isset($authorizationHeader) && strlen($authorizationHeader) > 7 ) {
            $this->middleware('auth:sanctum');
        }
    }

    function homeLayout() {

        // $data['categories_products'] = new CategoryWithProductsCollection($this->getFeatuerdCategoriesProducts());
        $data['todays_deal_products'] = new ProductMini2Collection(filter_products(Product::where('todays_deal', '1'))->limit(6)->get());
        $data['newest_products'] = new ProductMini2Collection( filter_products(Product::latest())->limit(6)->get());
        $data['recommended_products'] = new ProductMini2Collection( $this->getRecommendedProducts());
        $data['home_youtube_link']=json_decode(get_setting('home_banner1_links'), true)[0];
        $data['home_banner_1']=new BannerCollection(json_decode(get_setting('home_slider_images'), true));
        $data['home_banner_2']=new BannerCollection(json_decode(get_setting('home_banner2_images'), true));
        $data['home_banner_3']=new BannerCollection(json_decode(get_setting('home_banner3_images'), true));

        return response()->json([
            'success'=>true,
            'data'=>$data
        ], 200);
    }
    
    public function getRecommendedProducts()
    {
        $user = Auth::user();
        if ($user && $user->wishlists()->count() > 0) {
            $user_wished_products_ids = $user->wishlists()->inRandomOrder()->limit(15)->pluck('product_id')->toArray();
            $recommended_products_categories_ids = Product::query()->whereIn('id', $user_wished_products_ids)->pluck('category_id')->toArray();
            $recommended_products = Product::query()->whereNotIn('id', $user_wished_products_ids)
                ->whereIn('category_id', $recommended_products_categories_ids)
                ->limit(6)->get();
        } else {
            $recommended_products = filter_products(\App\Models\Product::inRandomOrder())
                ->limit(6)
                ->get();
        }
        return $recommended_products;
    }

    // function getFeatuerdCategoriesProducts() {
    //     $home_categories_ids = json_decode(get_setting('home_categories'));
    //     return Category::query()->whereIn('id' , $home_categories_ids)
    //     ->with(['products'=>function($q){
    //         $q->physical()->where('published',1)->where('approved',1);
    //     }])->orderByDesc('order_level')->limit(6)->get();
    // }

}
