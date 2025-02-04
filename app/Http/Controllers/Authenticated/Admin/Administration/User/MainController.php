<?php

namespace App\Http\Controllers\Authenticated\Admin\Administration\User;

use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Validator;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $req)
    {
        try {
            $validating = Validator::make($req->all(), [
                'user_name' => 'required',
                'user_email' => 'required|email',
                'user_password' => 'required',
            ]);

            if ($validating->fails()) {
                return redirect()->back()->withInput()->withErrors($validating);
            } else {

                $user = User::create([
                    'name' => $req->user_name,
                    'email' => $req->user_email,
                    'access_level_id' => 1,
                    'password' => Hash::make($req->user_password),
                ]);

                $user_id = auth()->id();
                Log::create([
                    'user_id' => $user_id,
                    'ip' => $req->ip(),
                    'level' => 'info',
                    'description' => "Usuário {$user_id} cadastrou o Utilizador com ID '{$user->id}'.",
                ]);

                return redirect()->back()->with('success', 'cadastrado');

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
                'user_email' => 'required|email',
                'user_password' => 'required',
            ]);

            if ($validating->fails()) {
                return redirect()->back()->withInput()->withErrors($validating);
            } else {

                $user = User::where('id',$id)->update([
                    'name' => $req->user_name,
                    'email' => $req->user_email,
                    'password' => Hash::make($req->user_password),
                ]);

                $user_id = auth()->id();
                Log::create([
                    'user_id' => $user_id,
                    'ip' => $req->ip(),
                    'level' => 'info',
                    'description' => "Usuário {$user_id} actualizou os dados do Utilizador com ID '{$id}'.",
                ]);

                return redirect()->back()->with('updated', 'actualizado');

            }
        } catch (\Exception $err) {
            return response()->json(['error' => "Houve um erro no Servidor..."], 500);
        }
    }

    public function remove(string $id)
    {
        try {
            $product = User::where('id', $id)->first();
            User::where('id', $id)->delete();
            $user_id = auth()->id();
            Log::create([
                'user_id' => $user_id,
                'ip' => request()->ip(),
                'level' => 'info',
                'description' => "Usuário {$user_id} removeu o Utilizador com ID '{$product->id}'.",
            ]);
            return redirect()->back()->with('removed', 'removido');
        } catch (\Exception $err) {
            return response()->json(['error' => "Houve um erro no Servidor..."], 500);
        }
    }
}
