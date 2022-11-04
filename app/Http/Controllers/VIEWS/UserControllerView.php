<?php

namespace App\Http\Controllers\VIEWS;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserControllerView extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $user_desactive = User::where('status',0)->count();
        $user_attente = User::where('status',2)->count();
        $user_active = User::where('status',1)->count();
        return view('admin.layout.users.user_list',[
            'users' => $users,
            'user_active' => $user_active,
            'user_desactive' => $user_desactive,
            'user_attente' => $user_attente,
        ]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate =  $this->validate($request,[
            'nom' => 'required',
            'prenoms' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'adresse' => 'required',
            'password' => 'required|confirmed'
        ]);
        if(!$validate){
            redirect()->route('users.index')->withErrors([]);
        }
        $user = User::create([// insertion de données dans la base de donné es
            'nom' => $request->nom,
            'prenoms' => $request->prenoms,
            'email' => $request->email,
            'phone' => $request->phone,
            'adresse' => $request->adresse,
            'photo' => $request->photo,
            'status' => 2, //0 = "déactivé" 1 = "activé" 2 = "en attente"
            'score' => 0,
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(10),
        ]);
        if($user){
            session()->flash('msg','Utilisateur ajouter avec succès'); // creation de variable pour le SweetAlert
            return redirect()->route('users.index'); // Redirection
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
