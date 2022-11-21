<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Matiere;
use App\Models\MatiereUser;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function user_status_activer($id){
        $user = User::find($id);
        if(!$user){
            return response()->json([
                'message' => 'Utilisateur introuvable ou inexistant',
                'status' => 404
            ], 404);
        }
        $user->update([
            'status' => 1
        ]);
        if($user){
            return response()->json([
                'message' => 'Utilisateur activé avec succès',
                'user' => $user,
                'status' => 200
            ], 200);
        }
    }
    public function user_status_desactiver($id){
        $user = User::find($id);
        if(!$user){
            return response()->json([
                'message' => 'Utilisateur introuvable ou inexistant',
                'status' => 404
            ], 404);
        }
        $user->update([
            'status' => 0
        ]);
        if($user){
            return response()->json([
                'message' => 'Utilisateur désactivé avec succès',
                'user' => $user,
                'status' => 200
            ], 200);
        }
    }

    /**
     * @OA\Post(
     *      path="/api/login_user",
     *      operationId="user_login",
     *      tags={"users"},
     *      summary="Connexion",
     *      description="Renvoie les données de l'utilisateur connecé",
     *      @OA\RequestBody(
     *          required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="email",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="password",
     *                     type="string"
     *                 ),
     *                 example={"email": "cedriczouzoua@gmail.com", "password":"12345678X"}
     *             )
     *         )
     *
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    public function login_user(Request $request){
        try {
            $this->validate($request,[
                'email' => 'required',
                'password' => 'required'
            ]);
            $user = User::where('email',$request->email)->first();
            if(!$user){
                return response()->json([
                    'message' => "Cet email ne possede pas de compte",
                    'status' => 404
                ], 404);
            }

            if(Hash::check($request->password, $user->password)==true){
                Log::info("Un tilisateur s'est connecté: $request->nom - $request->prenoms - $request->email ".now());
                return response()->json([
                    'message' => "Connexion reussi",
                    'user' => $user,
                    'status' => 200,
                    'token' => $user->createToken($user->nom.''.$user->created_at)->plainTextToken
                ], 200);
            }else{
                Log::warning("Connexion échouée: ['email'=> $request->email] ".now());
                return response()->json([
                    'message' => "Mot de passe incorrecte",
                    'status' => 403
                ],403);
            }
        } catch (Exception $exception) {
            Log::critical("Connexion Impossible, Eception: $exception");
            return response()->json([
                'Exception' => $exception,
                'status' => 405
            ], 405);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Get(
     *      path="/api/users",
     *      operationId="users_list",
     *      tags={"users"},
     *      summary="liste des utilisateurs",
     *      description="liste des utilisateurs",
     *     @OA\Response(response="200", description="Affiche la liste des utilisateurs")
     * )
     */
    public function index()
    {
        $users = User::with('livres','dossiers','matieres')->get();
        return response()->json([
            'users' => $users,
            'status' => 200
        ],200);
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
    /**
     * @OA\Post(
     *      path="/api/users",
     *      operationId="users",
     *      tags={"users"},
     *      summary="Inscription",
     *      description="Création d'un utilisateur",
     *      @OA\RequestBody(
     *          required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="nom",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="prenoms",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="email",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="phone",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="password",
     *                     type="string"
     *                 ),
     *                 example={"nom": "Adjoumani","prenoms": "Jean Cedric","email": "adjoumani@gmail.com","password":"12345678X","password_confirmation":"12345678X","phone": "0102030405","adresse": "Abidjan-Yopougon","photo": "data:image/png;base64,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"}
     *             )
     *         )
     *
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request,[
                'nom' => 'required',
                'prenoms' => 'required',
                'email' => 'required|email|unique:users,email',
                'phone' => 'required',
                'password' =>'required|confirmed',
                'matieres' => 'required|array'
            ]);
            if($request->photo != null){
                $photo = $this->uploadImageApi($request->photo);
            }else{
                $photo = null;
            }
            $user = User::create([
                'nom' => $request->nom,
                'prenoms' => $request->prenoms,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'adresse' => $request->adresse,
                'photo' => $photo,
                'status' => 2, //0 = "déactivé" 1 = "activé" 2 = "en attente"
                'score' => 0
            ]);
            $matiere_users = $request->matieres;
            $user->matieres()->attach($matiere_users);
            if($user){
                Log::info("Un utilisateur s'est inscrit: $request->nom - $request->prenoms - $request->email - $request->phone ".now());
                return response()->json([
                    'message' => "Utilisateur créé avec succès",
                    'user' => $user,
                    'status' => 201
                ], 201);
            }else{
                Log::warning("Inscription impossible: $request->nom - $request->prenoms - $request->email $request->phone ".now());
                return response()->json([
                    'message' => "Utilisateur non créé",
                    'status' => 403
                ], 403);
            }
        } catch (Exception $exception) {
            Log::critical("Inscription impossible Exception : $exception ".now());
            return response()->json([
                'Exception' => $exception,
                'status' => 405
            ],405);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Get(
     *      path="/api/users/{id}",
     *      operationId="users_one",
     *      tags={"users"},
     *      summary="Atteindre un utlisateur",
     *      description="Obtenir les données d'un utilisateur",
     *     @OA\Response(response="200", description="Affichage d'un utilisateur")
     * )
     */
    public function show($id)
    {
        $user = User::where('id',$id)->with('livres','dossiers')->first();
        $matieres = Matiere::all();
        if(!$user){
            return response()->json([
                'message' => "Utilisateur non trouvé ou inexistant",
                'status' => 404
            ], 404);
        }else{
            return response()->json([
                'user' => $user,
                'matieres' => $matieres,
                'status' => 200
            ], 200);
        }
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
    /**
     * @OA\Put(
     *      path="/api/users/{id}",
     *      operationId="users_update",
     *      tags={"users"},
     *      summary="Mise à jour d'un utilisateur",
     *      description="Mise à jour d'un utilisateur",
     *      @OA\RequestBody(
     *          required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="nom",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="prenoms",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="email",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="phone",
     *                     type="string"
     *                 ),
     *                 example={"nom": "Adjoumani","prenoms": "Jean Cedric","email": "adjoumani@gmail.com","phone": "0102030405","adresse": "Abidjan-Cocody","photo": "data:image/png;base64,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"}
     *             )
     *         )
     *
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    public function update(Request $request, $id)
    {
        try {
            $this->validate($request,[
                'nom'=>'required',
                'prenoms' => 'required',
                'phone' => 'required'
            ]);
            $user = User::find($id);
            if(!$user){
                return response()->json([
                    'message' => 'Utilisateur non trouvé ou inexistant',
                    'status' => 404
                ], 404);
            }
            if($request->photo !=null){
                $photo = $this->uploadImageApi($request->photo);
            }else{
                $photo = $user->photo;
            }
            $user->update([
                'nom' => $request->nom,
                'prenoms' => $request->prenoms,
                'email' => $user->email,
                'password' => $user->password,
                'phone' => $request->phone,
                'adresse' => $request->adresse,
                'score' => $request->score,
                'photo' => $photo
            ]);
            if($user){
                Log::info("Mise à jour d'un utilisateur reussi : $request->nom - $request->prenoms - $request->email - $request->phone ".now());
                return response()->json([
                    'message' => "Données de l'utilisateur mise à jour",
                    'user' => $request->nom,
                    'status' => 200
                ], 200);
            }else{
                Log::warning("Mise à des donées de l'utilisateur est impossible: $request->nom - $request->prenoms - $request->email - $request->phone ".now());
                return response()->json([
                    'message' => "Mise à jour des données de l'utilisateur a échoué",
                    'status' => 403
                ], 403);
            }
        } catch (Exception $exception) {
            Log::critical("Mise à jour d'un utilisateur a échoué, Exception : $exception ".now());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Delete(
     *      path="/api/users/{id}",
     *      operationId="users_delete",
     *      tags={"users"},
     *      summary="Supprimer un utlisateur",
     *      description="Suprimer les données d'un utilisateur",
     *     @OA\Response(response="200", description="Suppression d'un utilisateur")
     * )
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if(!$user){
            return response()->json([
                'message' => 'Utilisateur introuvable ou inexistant',
                'status' => 404
            ], 404);
        }
        if($user->delete()){
            return response()->json([
                'message' => "Utilisateur supprimé avec succès",
                'status' => 200
            ], 200);
        }
    }
}
