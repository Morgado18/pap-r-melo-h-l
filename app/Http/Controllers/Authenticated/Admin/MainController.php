<?php

namespace App\Http\Controllers\Authenticated\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccessLevel;
use App\Models\Log;
use App\Models\Producer;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductStatus;
use App\Models\Province;
use App\Models\User;
use App\Models\Visit;
use DB;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function dash(){

        $data['user'] = auth()->user();

        $data['visits'] = Visit::count();
        $data['buyers'] = User::where('access_level_id',3)->count();
        $data['producers'] = User::where('access_level_id', 2)->count();
        $data['available_products'] = Product::where('product_status_id', 1)->count();

        $data['products'] = Product::join('producer', 'producer.id', 'product.producer_id')
                ->join('product_category', 'product_category.id', 'product.product_category_id')
                ->join('users', 'users.id', 'producer.user_id')
                ->join('product_status', 'product_status.id', 'product.product_status_id')
                ->select(
                    'product.*',
                    'users.name as producer_name',
                    'producer.id as producer_id',
                    'product_status.status',
                    'product_category.name as category_name'
                )
                ->orderByDesc('id')
                ->get()->take(10);

        return view('authenticated.admin.dash', ['data'=>$data]);
    }

    /* products */

    public function available_products()
    {

        $data['user'] = auth()->user();

        $search = request('search');

        if($search){
            $data['products'] = Product::join('producer', 'producer.id', 'product.producer_id')
                ->join('product_category', 'product_category.id', 'product.product_category_id')
                ->join('users', 'users.id', 'producer.user_id')
                ->join('product_status', 'product_status.id', 'product.product_status_id')
                ->where([
                    ['product.name','like','%' .$search. '%']
                ])
                ->where('product_status_id', 1)
                ->select(
                    'product.*',
                    'users.name as producer_name',
                    'producer.id as producer_id',
                    'product_status.status',
                    'product_category.name as category_name'
                )->orderByDesc('id')
                ->get();
        }else{
            $data['products'] = Product::join('producer', 'producer.id', 'product.producer_id')
                ->join('product_category', 'product_category.id', 'product.product_category_id')
                ->join('users', 'users.id', 'producer.user_id')
                ->join('product_status', 'product_status.id', 'product.product_status_id')
                ->where('product_status_id', 1)
                ->select(
                    'product.*',
                    'users.name as producer_name',
                    'producer.id as producer_id',
                    'product_status.status',
                    'product_category.name as category_name'
                )
                ->orderByDesc('id')
                ->get()->take(5);
        }

        $data['product_status'] = ProductStatus::all();
        $data['categories'] = ProductCategory::all();
        $data['producers'] = Producer::join('users', 'users.id', 'producer.user_id')
            ->select(
                'users.name as producer_name',
                'producer.id as producer_id',
            )
            ->get();


        return view('authenticated.admin.products.available', ['data' => $data]);
    }

    public function all_products()
    {

        $data['user'] = auth()->user();

        $search = request('search');

        if ($search) {
            $data['products'] = Product::join('producer', 'producer.id', 'product.producer_id')
                ->join('product_category', 'product_category.id', 'product.product_category_id')
                ->join('users', 'users.id', 'producer.user_id')
                ->join('product_status', 'product_status.id', 'product.product_status_id')
                ->where([
                    ['product.name', 'like', '%' . $search . '%']
                ])->select(
                    'product.*',
                    'users.name as producer_name',
                    'producer.id as producer_id',
                    'product_status.status',
                    'product_category.name as category_name'
                )->orderByDesc('id')
                ->get();
        } else {
            $data['products'] = Product::join('producer', 'producer.id', 'product.producer_id')
                ->join('product_category', 'product_category.id', 'product.product_category_id')
                ->join('users', 'users.id', 'producer.user_id')
                ->join('product_status', 'product_status.id', 'product.product_status_id')
                ->select(
                    'product.*',
                    'users.name as producer_name',
                    'producer.id as producer_id',
                    'product_status.status',
                    'product_category.name as category_name'
                )
                ->orderByDesc('id')
                ->get()->take(5);
        }

        $data['product_status'] = ProductStatus::all();
        $data['categories'] = ProductCategory::all();
        $data['producers'] = Producer::join('users', 'users.id', 'producer.user_id')
            ->select(
                'users.name as producer_name',
                'producer.id as producer_id',
            )
            ->get();


        return view('authenticated.admin.products.all', ['data' => $data]);
    }

    public function pending_products()
    {

        $data['user'] = auth()->user();

        $search = request('search');

        if ($search) {
            $data['products'] = Product::join('producer', 'producer.id', 'product.producer_id')
                ->join('product_category', 'product_category.id', 'product.product_category_id')
                ->join('users', 'users.id', 'producer.user_id')
                ->join('product_status', 'product_status.id', 'product.product_status_id')
                ->where([
                    ['product.name', 'like', '%' . $search . '%']
                ])
                ->where('product_status_id', 3)
                ->select(
                    'product.*',
                    'users.name as producer_name',
                    'producer.id as producer_id',
                    'product_status.status',
                    'product_category.name as category_name'
                )->orderByDesc('id')
                ->get();
        } else {
            $data['products'] = Product::join('producer', 'producer.id', 'product.producer_id')
                ->join('product_category', 'product_category.id', 'product.product_category_id')
                ->join('users', 'users.id', 'producer.user_id')
                ->join('product_status', 'product_status.id', 'product.product_status_id')
                ->where('product_status_id', 3)
                ->select(
                    'product.*',
                    'users.name as producer_name',
                    'producer.id as producer_id',
                    'product_status.status',
                    'product_category.name as category_name'
                )
                ->orderByDesc('id')
                ->get()->take(5);
        }

        $data['product_status'] = ProductStatus::all();
        $data['categories'] = ProductCategory::all();
        $data['producers'] = Producer::join('users', 'users.id', 'producer.user_id')
            ->select(
                'users.name as producer_name',
                'producer.id as producer_id',
            )
            ->get();


        return view('authenticated.admin.products.pending', ['data' => $data]);
    }

    public function sold_out_products()
    {

        $data['user'] = auth()->user();

        $search = request('search');

        if ($search) {
            $data['products'] = Product::join('producer', 'producer.id', 'product.producer_id')
                ->join('product_category', 'product_category.id', 'product.product_category_id')
                ->join('users', 'users.id', 'producer.user_id')
                ->join('product_status', 'product_status.id', 'product.product_status_id')
                ->where([
                    ['product.name', 'like', '%' . $search . '%']
                ])
                ->where('product_status_id', 5)
                ->select(
                    'product.*',
                    'users.name as producer_name',
                    'producer.id as producer_id',
                    'product_status.status',
                    'product_category.name as category_name'
                )->orderByDesc('id')
                ->get();
        } else {
            $data['products'] = Product::join('producer', 'producer.id', 'product.producer_id')
                ->join('product_category', 'product_category.id', 'product.product_category_id')
                ->join('users', 'users.id', 'producer.user_id')
                ->join('product_status', 'product_status.id', 'product.product_status_id')
                ->where('product_status_id', 5)
                ->select(
                    'product.*',
                    'users.name as producer_name',
                    'producer.id as producer_id',
                    'product_status.status',
                    'product_category.name as category_name'
                )
                ->orderByDesc('id')
                ->get()->take(5);
        }

        $data['product_status'] = ProductStatus::all();
        $data['categories'] = ProductCategory::all();
        $data['producers'] = Producer::join('users', 'users.id', 'producer.user_id')
            ->select(
                'users.name as producer_name',
                'producer.id as producer_id',
            )
            ->get();


        return view('authenticated.admin.products.sold_out', ['data' => $data]);
    }

    public function unavailable_products()
    {

        $data['user'] = auth()->user();

        $search = request('search');

        if ($search) {
            $data['products'] = Product::join('producer', 'producer.id', 'product.producer_id')
                ->join('product_category', 'product_category.id', 'product.product_category_id')
                ->join('users', 'users.id', 'producer.user_id')
                ->join('product_status', 'product_status.id', 'product.product_status_id')
                ->where([
                    ['product.name', 'like', '%' . $search . '%']
                ])
                ->where('product_status_id', 4)
                ->select(
                    'product.*',
                    'users.name as producer_name',
                    'producer.id as producer_id',
                    'product_status.status',
                    'product_category.name as category_name'
                )->orderByDesc('id')
                ->get();
        } else {
            $data['products'] = Product::join('producer', 'producer.id', 'product.producer_id')
                ->join('product_category', 'product_category.id', 'product.product_category_id')
                ->join('users', 'users.id', 'producer.user_id')
                ->join('product_status', 'product_status.id', 'product.product_status_id')
                ->where('product_status_id', 4)
                ->select(
                    'product.*',
                    'users.name as producer_name',
                    'producer.id as producer_id',
                    'product_status.status',
                    'product_category.name as category_name'
                )
                ->orderByDesc('id')
                ->get()->take(5);
        }

        $data['product_status'] = ProductStatus::all();
        $data['categories'] = ProductCategory::all();
        $data['producers'] = Producer::join('users', 'users.id', 'producer.user_id')
            ->select(
                'users.name as producer_name',
                'producer.id as producer_id',
            )
            ->get();


        return view('authenticated.admin.products.unavailable', ['data' => $data]);
    }

    /* end products */

    /* activities */

    public function logs(){
        $data['user'] = auth()->user();
        $data['logs'] = Log::orderByDesc('id')->get()->take(20);
        return view('authenticated.admin.activities.logs.all', ['data' => $data]);
    }

    public function visits()
    {
        $data['user'] = auth()->user();
        $data['visits'] = Visit::orderByDesc('id')->get()->take(20);
        return view('authenticated.admin.activities.visits.all', ['data' => $data]);
    }

    /* end activities */

    /* administration */

    public function all_users()
    {
        $data['user'] = auth()->user();
        $data['users'] = User::leftJoin('producer', 'producer.user_id', '=', 'users.id')
            ->leftJoin('buyer', 'buyer.user_id', '=', 'users.id')
            ->join('access_level', 'access_level.id', '=', 'users.access_level_id')
            ->select(
                'access_level.access as access_level',
                'users.*',
                'users.id as user_id',
                'producer.phone_number as producer_phone',
                'producer.nif as producer_nif',
                'buyer.phone_number as buyer_phone',
                'buyer.nif as buyer_nif'
            )
            ->orderByDesc('users.id')
            ->take(20)
            ->get();
        $data['access_levels'] = AccessLevel::all();
        return view('authenticated.admin.administration.users.all', ['data' => $data]);
    }

    public function all_producers()
    {
        $data['user'] = auth()->user();

        $data['users'] = User::leftJoin('producer', 'producer.user_id', '=', 'users.id')
            ->leftJoin('product', 'product.producer_id', '=', 'producer.id')
            ->join('access_level', 'access_level.id', '=', 'users.access_level_id')
            ->join('province', 'province.id', '=', 'producer.province_id')
            ->where('access_level_id', 2)
            ->whereNull('product.deleted_at')
            ->select(
                'users.id as user_id',
                'users.name as name',
                'users.email as email',
                'producer.phone_number as phone_number',
                'producer.nif as nif',
                'producer.id as producer_id',
                'producer.address',
                'producer.province_id',
                'producer.address_reference',
                'producer.description',
                'producer.company_name as company_name',
                'users.created_at as created_at',
                'producer.id as producer_id',
                'access_level.access as access',
                'province.name as province_name',
                \DB::raw('COUNT(product.id) as products_count')
            )
            ->groupBy([
                'users.id',
                'users.name',
                'users.email',
                'producer.phone_number',
                'producer.id',
                'producer.nif',
                'producer.company_name',
                'users.created_at',
                'producer.id',
                'access_level.access',
                'producer.address',
                'producer.province_id',
                 'province.name',
                'producer.address_reference',
                'producer.description',
            ])
            ->orderByDesc('producer.id')
            ->take(20)
            ->get();

        $data['access_levels'] = AccessLevel::all();
        $data['provinces'] = Province::all();
        return view('authenticated.admin.administration.producers.all', ['data' => $data]);
    }

    public function all_buyers()
    {
        $data['user'] = auth()->user();

        $data['users'] = User::leftJoin('buyer', 'buyer.user_id', '=', 'users.id')
            ->join('access_level', 'access_level.id', '=', 'users.access_level_id')
            ->join('province', 'province.id', '=', 'buyer.province_id')
            ->where('access_level_id', 3)
            ->select(
                'users.id as user_id',
                'users.name as name',
                'users.email as email',
                'buyer.phone_number',
                'buyer.nif',
                'buyer.id as buyer_id',
                'buyer.province_id',
                'buyer.default_address',
                'users.created_at as created_at',
                'buyer.id as buyer_id',
                'access_level.access as access',
                'province.name as province_name',
            )
            ->orderByDesc('buyer.id')
            ->take(20)
            ->get();
        $data['access_levels'] = AccessLevel::all();
        $data['provinces'] = Province::all();
        return view('authenticated.admin.administration.buyers.all', ['data' => $data]);
    }

    /* end administration */

}
