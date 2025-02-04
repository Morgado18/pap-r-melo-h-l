<?php

namespace App\Http\Controllers\Authenticated\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Buyer;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Storage;

class MainController extends Controller
{
    public function dash()
    {
        $data['user'] = auth()->user();

        return view('authenticated.buyer.dash', ['data' => $data]);
    }
    public function finalizepurchase(Request $req)
    {
        $cart = $req->input('cart');
        $paymentMethod = $req->input('payment_method');

        $user = auth()->user();
        $buyer = Buyer::where('user_id', $user->id)->first();

        // Limpa o carrinho após o loop
        session()->forget('cart');

        $date = Carbon::now()->format('d/m/Y, H:i');
        $data = [
            'cart' => $cart,
            'paymentMethod' => $paymentMethod,
            'date' => $date,
            'user' => $user,
            'total' => array_reduce($cart, function ($carry, $item) {
                return $carry + ($item['price'] * $item['quantity']);
            }, 0),
        ];

        // Gerar o PDF e armazená-lo
        $pdf = PDF::loadview('authenticated.pdf.buyer.order.index', $data)
            ->setPaper('a4', 'landscape');
        $pdfname = time() . $buyer->id . $user->email;
        $pdfPath = 'pdfs/orders/order_proof_' . $pdfname . '.pdf';
        $pdf->save(public_path($pdfPath));

        foreach ($cart as $item) {
            $order = Order::create([
                'buyer_id' => $buyer->id,
                'total' => $item['price'] * $item['quantity'],
                'status' => "Processando",
                'payment_method' => $paymentMethod,
                'payment_proof_path' => "developing...",
                'order_proof_path' => $pdfPath,
            ]);

            if ($order) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['price'],
                ]);
            }
        }

        return redirect()->back()->with([
            'success' => 'Compra finalizada com sucesso! Baixe o recibo.',
            'pdf_url' => url('pdfs/orders/order_proof_'. $pdfname.'.pdf')
        ]);
    }

}
