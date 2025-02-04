<?php

namespace App\Http\Controllers\Authenticated\Admin\Administration\Producer;

use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\Producer;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Validator;

class MainController extends Controller
{

    public function store(Request $req)
    {
        try {
            $validating = Validator::make($req->all(), [
                'user_name' => 'required',
                'user_email' => 'required|email|unique:users,email',
                'user_password' => 'required',
                'user_nif' => 'required',
                'user_phone_number' => 'required',
                'user_company_name' => 'required',
                'user_description' => 'required',
                'user_address' => 'required',
                'user_address_reference' => 'required',
                'user_province' => 'required',
            ]);

            if ($validating->fails()) {
                return redirect()->back()->withInput()->withErrors($validating);
            } else {

                $user = User::create([
                    'name' => $req->user_name,
                    'email' => $req->user_email,
                    'access_level_id' => 2,
                    'password' => Hash::make($req->user_password),
                ]);

                if($user){
                    $producer = Producer::create([
                        'nif' => $req->user_nif,
                        'phone_number' => $req->user_phone_number,
                        'company_name' => $req->user_company_name,
                        'description' => $req->user_description,
                        'address' => $req->user_address,
                        'address_reference' => $req->user_address_reference,
                        'province_id' => $req->user_province,
                        'user_id' => $user->id,
                    ]);

                    $user_id = auth()->id();
                    Log::create([
                        'user_id' => $user_id,
                        'ip' => $req->ip(),
                        'level' => 'info',
                        'description' => "Usuário {$user_id} cadastrou o Produtor com ID '{$producer->id}' e com ID de Utilizador {$user->id}.",
                    ]);

                    return redirect()->back()->with('success', 'cadastrado');

                }

            }
        } catch (\Exception $err) {
            return response()->json(['error' => "Houve um erro no Servidor..."], 500);
        }
    }


    public function update(Request $req, string $id)
    {
        try {
            $validating = Validator::make($req->all(), [
                'user_name' => 'required',

                //'user_email' => 'required|email|unique:users,email',
                'user_password' => 'required',
                'user_nif' => 'required',
                'user_phone_number' => 'required',
                'user_company_name' => 'required',
                'user_description' => 'required',
                'user_address' => 'required',
                'user_address_reference' => 'required',
                'user_province' => 'required',
            ]);

            if ($validating->fails()) {
                return redirect()->back()->withInput()->withErrors($validating);
            } else {

                $user = User::where('id',$id)->update([
                    'name' => $req->user_name,
                   // 'email' => $req->user_email,
                    'password' => Hash::make($req->user_password),
                ]);

                if ($user) {
                     $producer_db = Producer::where('user_id',$id)->first();
                     $producer = Producer::where('id', $producer_db->id)->update([
                        'nif' => $req->user_nif,
                        'phone_number' => $req->user_phone_number,
                        'company_name' => $req->user_company_name,
                        'description' => $req->user_description,
                        'address' => $req->user_address,
                        'address_reference' => $req->user_address_reference,
                        'province_id' => $req->user_province,
                    ]);

                     $user_id = auth()->id();
                    Log::create([
                        'user_id' => $user_id,
                        'ip' => $req->ip(),
                        'level' => 'info',
                        'description' => "Usuário {$user_id} actualizou os dados do Produtor com ID '{$producer_db->id}' e com ID de Utilizador {$id}.",
                    ]);

                     return redirect()->back()->with('updated', 'actualizado');

                }

            }
         } catch (\Exception $err) {
            return response()->json(['error' => "Houve um erro no Servidor..."], 500);
        } 
    }

    public function remove(string $id)
    {
        try {
            $user = User::where('id', $id)->first();
            $producer = Producer::where('user_id', $id)->first();
            User::where('id', $id)->delete();
            $user_id = auth()->id();
            Log::create([
                'user_id' => $user_id,
                'ip' => request()->ip(),
                'level' => 'info',
                'description' => "Usuário {$user_id} removeu o Produtor com ID '{$producer->id}' e com ID de Utilizador {$user->id}.",
            ]);
            return redirect()->back()->with('removed', 'removido');
        } catch (\Exception $err) {
            return response()->json(['error' => "Houve um erro no Servidor..."], 500);
        }
    }
}
