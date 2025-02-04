<?php

namespace App\Http\Controllers\Authenticated\Producer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Producer;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductStatus;
use App\Models\User;
use Illuminate\Http\Request;
use function Laravel\Prompts\select;

class MainController extends Controller
{
    public function dash()
    {
        $data['user'] = auth()->user();

        $data['today_orders'] = Order::whereDate('created_at',today())->count();

        return view('authenticated.producer.dash', ['data'=>$data]);
    }

    public function all_my_orders(){
        $data['user'] = auth()->user();

        $search = request('search');
        if($search){
            $data['orders'] = Order::join('order_item', 'order_item.order_id', 'order.id')
                ->join('product', 'product.id', 'order_item.product_id')
                ->join('producer', 'producer.id', 'product.producer_id')
                ->join('buyer', 'buyer.id', 'order.buyer_id')
                ->join('users', 'users.id', 'producer.user_id')
                ->where('users.id', $data['user']->id)
                ->where([
                    ['users.name','like','%'.$search.'%']
                ])
                ->orWhere([
                    ['order.status', 'like', '%' . $search . '%']
                ])
                ->orWhere([
                    ['order.payment_method', 'like', '%' . $search . '%']
                ])
                ->select(
                    'order.id as order_id',
                    'order.status',
                    'users.name as user_name',
                    'users.email as user_email',
                    'buyer.phone_number',
                    'buyer.default_address',
                    'order.status as order_status',
                    'order.total as order_total',
                    'order.payment_method as payment_method',
                    'order.payment_proof_path as order_payment_proof_path',
                    'order.order_proof_path as order_proof_path',
                    'order.created_at as created_at'
                )
                ->selectRaw('COUNT(order_item.product_id) as product_count')
                ->groupBy(
                    'order.id',
                    'order.status',
                    'users.name',
                    'users.email',
                    'buyer.phone_number',
                    'buyer.default_address',
                    'order.status',
                    'order.total',
                    'order.payment_method',
                    'order.payment_proof_path',
                    'order.order_proof_path',
                    'order.created_at'
                )
                ->orderByDesc('order.id')
                ->get();
        }else{
                $data['orders'] = Order::join('order_item', 'order_item.order_id', 'order.id')
                ->join('product', 'product.id', 'order_item.product_id')
                ->join('producer', 'producer.id', 'product.producer_id')
                ->join('buyer', 'buyer.id', 'order.buyer_id')
                ->join('users as producer_user', 'producer_user.id', 'producer.user_id') // Alias para o usuário do produtor
                ->join('users as buyer_user', 'buyer_user.id', 'buyer.user_id') // Alias para o usuário do comprador
                ->where('producer_user.id', $data['user']->id) // Filtra pelo usuário do produtor
                ->orWhere('buyer_user.id', $data['user']->id) // Ou filtra pelo usuário do comprador
                ->select(
                    'order.id as order_id',
                    'order.status',
                    'producer_user.name as producer_name', // Nome do produtor
                    'producer_user.email as producer_email', // Email do produtor
                    'buyer_user.name as user_name', // Nome do comprador
                    'buyer_user.email as user_email', // Email do comprador
                    'buyer.phone_number',
                    'buyer.default_address',
                    'order.status as order_status',
                    'order.total as order_total',
                    'order.payment_method as payment_method',
                    'order.payment_proof_path as order_payment_proof_path',
                    'order.order_proof_path as order_proof_path',
                    'order.created_at as created_at'
                )
                ->selectRaw('COUNT(order_item.product_id) as product_count')
                ->groupBy('order.id',
                    'order.status',
                    'producer_user.name',
                    'producer_user.email',
                    'buyer_user.name',
                    'buyer_user.email',
                    'buyer.phone_number',
                    'buyer.default_address',
                    'order.status',
                    'order.total',
                    'order.payment_method',
                    'order.payment_proof_path',
                    'order.order_proof_path',
                    'order.created_at'
                )
                ->orderByDesc('order.id')
                ->get();
        }
        return view('authenticated.producer.orders.all', ['data'=>$data]);
    }

    public function mark_as($status, $orderId){
        $order = Order::where('id',$orderId)->first();
        if($status == 'sending'){
            $order->update(['status'=>'Enviando']);
        }elseif ($status == 'done') {
            $order->update(['status' => 'Concluído']);
        } elseif ($status == 'canceled') {
            $order->update(['status' => 'Cancelado']);
        }
        return redirect()->back()->with('success', 'Status do Pedido actualizado com sucesso!');
    }

    public function all_my_products()
    {
        $data['user'] = auth()->user();
        $producer = Producer::where('user_id', $data['user']->id)->first();

        $search = request('search');

        if ($search) {
            $data['products'] = Product::join('producer', 'producer.id', 'product.producer_id')
                ->join('product_category', 'product_category.id', 'product.product_category_id')
                ->join('users', 'users.id', 'producer.user_id')
                ->join('product_status', 'product_status.id', 'product.product_status_id')
                ->where([
                    ['product.name', 'like', '%' . $search . '%']
                ])
                ->where('product.producer_id', $producer->id)
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
                ->where('product.producer_id', $producer->id)
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

        return view('authenticated.producer.products.all', ['data'=>$data]);
    }

    public function all_my_costumers(){
        $data['user'] = auth()->user();
        $data['costumers'] = [];
        return view('authenticated.producer.costumers.all', ['data' => $data]);
    }

     public function all_my_chats(){
        $data['user'] = auth()->user();
        /* $data['chats'] = []; */
        return view('authenticated.producer.chats.all', ['data' => $data]);
    }

     public function my_profile(){
        $user = auth()->user();

        $data['user'] = User::join('producer','producer.user_id','users.id')
            ->join('province', 'province.id', 'producer.province_id')
            ->where('users.id',$user->id)
            ->select('users.*','province.name as province_name','producer.*')->first();
            //dd($data['user']);

        return view('authenticated.producer.profile', ['data' => $data]);
    }

}
