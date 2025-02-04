<?php

namespace App\Http\Controllers\CreateAccount;

use App\Http\Controllers\Controller;
use App\Models\Buyer;
use App\Models\Producer;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Validator;

class MainController extends Controller
{

    
    public function store_producer(Request $req)
    {
        try{
            $validating = Validator::make($req->all(), [
                'nif' => 'unique:producer,nif|required', // |unique:buyer,nif
                'responsible_name' => 'required',
                'email' => 'required|unique:users,email',
                'company_name' => 'required',
                'phone_number' => 'required',
                'address' => 'required',
                'address_reference' => 'required',
                'province' => 'required',
                'description' => 'required',
                'password' => 'required',
            ]);

            if ($validating->fails()) {
                return redirect()->back()->withInput()->withErrors($validating);
            }else{
                $store_user = User::create([
                    'name' => $req->responsible_name,
                    'email' => $req->email,
                    'password' => Hash::make($req->password),
                    'access_level_id' => 2,
                ]);

                if ($store_user) {
                    $store_producer = Producer::create([
                        'nif' => $req->nif,
                        'phone_number' => $req->phone_number,
                        'description' => $req->description,
                        'company_name' => $req->company_name,
                        'address' => $req->address,
                        'address_reference' => $req->address_reference,
                        'province_id' => $req->province,
                        'user_id' => $store_user->id
                    ]);

                    if ($store_producer) {
                        return redirect()->back()->with('created_producer', 'Conta criada');
                    }
                }
            }
        }catch(\Exception $err){
            return response()->json(['error'=>"Houve um erro no Servidor..."],500);
        }

    }

    public function store_buyer(Request $req)
    {
        try {
            $validating = Validator::make($req->all(), [
                'nif' => 'unique:buyer,nif|required', // |unique:buyer,nif
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'phone_number' => 'required',
                'default_address' => 'required',
                'province' => 'required',
                'password' => 'required',
            ]);

            if ($validating->fails()) {
                return redirect()->back()->withInput()->withErrors($validating);
            } else {
                $store_user = User::create([
                    'name' => $req->name,
                    'email' => $req->email,
                    'password' => Hash::make($req->password),
                    'access_level_id' => 3,
                ]);
                if ($store_user) {
                    $store_buyer = Buyer::create([
                        'nif' => $req->nif,
                        'phone_number' => $req->phone_number,
                        'default_address' => $req->default_address,
                        'province_id' => $req->province,
                        'user_id' => $store_user->id,
                    ]);

                    if ($store_buyer) {
                        return redirect()->back()->with('created_buyer', 'Conta criada');
                    }
                }
            }
        } catch (\Exception $err) {
            return response()->json(['error' => "Houve um erro no Servidor..."], 500);
        }

    }
}
