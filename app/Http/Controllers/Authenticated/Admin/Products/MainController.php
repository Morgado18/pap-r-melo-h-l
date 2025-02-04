<?php

namespace App\Http\Controllers\Authenticated\Admin\Products;

use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\Product;
use Illuminate\Http\Request;
use Validator;

class MainController extends Controller
{

    public function store(Request $req)
    {
        try {
            $validating = Validator::make($req->all(), [
                'product_name' => 'required',
                'product_price' => 'required|decimal:0,999',
                'product_quant_stock' => 'required',
                'product_quant_min_buy' => 'required',
                'product_status' => 'required',
                'product_producer' => 'required',
                'product_category' => 'required',
                'product_img' => 'required|max:2048', //|mimes:jpeg,png,jpg
            ]);

            if ($validating->fails()) {
                return redirect()->back()->withInput()->withErrors($validating);
            } else {

                //$product = Product::create($req->except(['product_img']));

                $product = Product::create([
                    'name' => $req->product_name,
                    'quantity' => $req->product_quant_stock,
                    'price' => $req->product_price,
                    'min_quant_to_buy' => $req->product_quant_min_buy,
                    'img_path' => null,
                    'description' => $req->product_description,
                    'producer_id' => $req->product_producer,
                    'product_category_id' => $req->product_category,
                    'product_status_id' => $req->product_status,
                    'average_rating' => 0,
                ]);

                $folderPath = "products/{$product->id}";
                $imagePaths = [];

                if ($req->hasFile('product_img')) {
                    foreach ($req->file('product_img') as $file) {
                        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
                        $filePath = $file->storeAs($folderPath, $fileName, 'public');
                        $imagePaths[] = $filePath;
                    }
                }

                $product->update(['img_path' => json_encode($imagePaths)]);

                $user_id = auth()->id();
                Log::create([
                    'user_id' => $user_id,
                    'ip' => $req->ip(),
                    'level' => 'info',
                    'description' => "Usuário {$user_id} cadastrou o Produto com ID '{$product->id}'.",
                ]);

                return redirect()->back()->with('success', 'cadastrado');

                /* if ($req->hasFile('product_img') && $req->file('product_img')->isValid()) {

                } */
                /* $store = Product::create([
                    'name' => $req->product_name,
                    'quantity' => $req->product_quant_stock,
                    'price' => $req->product_price,
                    'min_quant_to_buy' => $req->product_quant_min_buy,
                    'img_path' => null,
                    'description' => $req->product_description,
                    'producer_id' => $req->product_producer_id,
                    'product_category_id' => $req->s,
                    'product_status_id' => $req->product_status,
                ]); */
                /* if ($store) {
                    return redirect()->back()->with('success', 'Produto cadastrado');
                } */
            }
        } catch (\Exception $err) {
            return response()->json(['error' => "Houve um erro no Servidor..."], 500);
        }
    }

    public function update(Request $req, string $slug)
    {
        try {
            $validating = Validator::make($req->all(), [
                'product_name' => 'required',
                'product_price' => 'required',
                'product_quant_stock' => 'required',
                'product_quant_min_buy' => 'required',
                'product_status' => 'required',
                'product_producer' => 'required',
                'product_category' => 'required',
                /* 'product_img' => 'required|max:2048', */ //|mimes:jpeg,png,jpg
            ]);

            if ($validating->fails()) {
                return redirect()->back()->withInput()->withErrors($validating);
            } else {

                $product = Product::where('slug', $slug)->update([
                    'name' => $req->product_name,
                    'quantity' => $req->product_quant_stock,
                    'price' => $req->product_price,
                    'min_quant_to_buy' => $req->product_quant_min_buy,
                    /* 'img_path' => null, */
                    'description' => $req->product_description,
                    'producer_id' => $req->product_producer,
                    'product_category_id' => $req->product_category,
                    'product_status_id' => $req->product_status,
                ]);

               /*  $folderPath = "products/{$product->id}";
                $imagePaths = []; */

                /* if ($req->hasFile('product_img')) {
                    foreach ($req->file('product_img') as $file) {
                        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
                        $filePath = $file->storeAs($folderPath, $fileName, 'public');
                        $imagePaths[] = $filePath;
                    }
                } */

                /* $product->update(['img_path' => json_encode($imagePaths)]); */

                $productDb = Product::where('slug', $slug)->first();
                $user_id = auth()->id();
                Log::create([
                    'user_id' => $user_id,
                    'ip' => $req->ip(),
                    'level' => 'info',
                    'description' => "Usuário {$user_id} actualizou os dados do Produto com ID '{$productDb->id}'.",
                ]);

                return redirect()->back()->with('success_update', 'actualizado');
            }
        } catch (\Exception $err) {
            return response()->json(['error' => "Houve um erro no Servidor..."], 500);
        }
    }

    public function remove(string $slug)
    {
        try{
            $product = Product::where('slug', $slug)->first();
            Product::where('slug',$slug)->delete();
            $user_id = auth()->id();
            Log::create([
                'user_id' => $user_id,
                'ip' => request()->ip(),
                'level' => 'info',
                'description' => "Usuário {$user_id} removeu o Produto com ID '{$product->id}'.",
            ]);
            return redirect()->back()->with('removed', 'removido');
        } catch (\Exception $err) {
            return response()->json(['error' => "Houve um erro no Servidor..."], 500);
        }
    }
}
