<?php

namespace App\Http\Controllers\Visit;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Province;
use App\Models\Visit;
use Illuminate\Http\Request;

class MainController extends Controller
{


    public function index()
    {
        $visit_ip = request()->ip();
        $visit_db = Visit::where('ipaddress',$visit_ip)->first();
        if(!$visit_db){
            Visit::create([
                'ipaddress' => $visit_ip
            ]);
        }
        $cart = session()->get('cart', []);
        $user = auth()->user();
        if($user){
            $data['user'] = $user;
            return view('index', ['data'=> $data]);
        }else{
            return view('index');
        }
    }

    public function list_products(){
        $data['products'] = Product::join('producer', 'producer.id', 'product.producer_id')
            ->join('users', 'users.id', 'producer.user_id')
            ->join('product_status', 'product_status.id', 'product.product_status_id')
            ->join('product_category', 'product_category.id', 'product.product_category_id')
            ->select(
                'product.*',
                'users.name as producer_name',
                'producer.id as producer_id',
                'product_status.status',
                'product_category.name as category_name'
            )
            ->orderByDesc('id')
            ->get();

        $user = auth()->user();
        $data['user'] = auth()->user();
        return view('visit.products', ['data' => $data]);

    }

    public function view_create_buyer(){
        $data['provinces'] = Province::orderBy('name', 'asc')->get();
        $data['user'] = auth()->user();
        return view('visit.buyer', ['data' => $data]);
    }
    public function view_create_producer()
    {
        $data['provinces'] = Province::orderBy('name','asc')->get();
        $data['user'] = auth()->user();
        return view('visit.producer', ['data'=> $data]);
    }

    public function mycart()
    {
        $cart = session()->get('cart', []);
        //dd(session()->get('cart'));
        $data['user'] = auth()->user();
        return view('visit.cart', compact('cart'), ['data'=>$data]);
    }

    /* cart */

    public function add_cart(Request $request, $productId)
    {
        $product = [
            'id' => $productId,
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity', 1),
        ];

        // Recupera o carrinho da sessão
        $cart = session()->get('cart', []);

        // Verifica se o produto já está no carrinho
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $product['quantity'];
        } else {
            $cart[$productId] = $product;
        }

        // Atualiza o carrinho na sessão
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Carrinho actualizado!');
    }

    // Remover item do carrinho
    public function remove_cart_item($productId)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Produto removido do carrinho!');
    }

    // Finalizar compra (armazenar no banco de dados)
    public function checkout()
    {
        $cart = session()->get('cart', []);

        // Aqui você pode salvar os dados do carrinho no banco de dados
        // Exemplo: Criar um pedido (order) e associar os itens do carrinho

        // Limpar o carrinho após finalizar a compra
        session()->forget('cart');

        return redirect()->route('cart.index')->with('success', 'Compra finalizada com sucesso!');
    }
}
