<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Livre;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LivreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Get(
     *      path="/api/livres",
     *      operationId="livres_list",
     *      tags={"livres"},
     *      summary="liste des livres",
     *      description="liste des livres",
     *     @OA\Response(response="200", description="Affiche la liste des livres")
     * )
     */
    public function index()
    {
        $livres = Livre::with('user')->get();
        return response()->json([
            'livres' => $livres,
            'status' => 200
        ], 200);
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
     *      path="/api/livres",
     *      operationId="livres",
     *      tags={"livres"},
     *      summary="Création d'un livre",
     *      description="Création d'un livre",
     *      @OA\RequestBody(
     *          required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="sku",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="nom",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="points",
     *                     type="integer"
     *                 ),
     *                 @OA\Property(
     *                     property="user_id",
     *                     type="integer"
     *                 ),
     *                 example = {"sku": "Meth473","nom": "Go For English","points": 400,"user_id":1}
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
                'sku' => 'required',
                'nom' => 'required',
                'points' => 'required',
                'user_id' => 'required'
            ]);
            $livre = Livre::create([
                'sku' => $request->sku,
                'nom' => $request->nom,
                'points' => $request->points,
                'status' => true,
                'user_id' => $request->user_id
            ]);
            if($livre){
                Log::info("Création d'un livre reussi: $request->sku - $request->nom - $request->points ".now());
                return response()->json([
                    'message' => 'Livre créé avec succès',
                    'livre' => $livre,
                    'status' => 201
                ], 201);
            }else{
                Log::warning("Création d'un livre est impossible: $request->sku - $request->nom - $request->points");
                return response()->json([
                    'message' => "Créqtion d'un livre a échoué",
                    'status' => 403
                ], 403);
            }
        } catch (Exception $exception) {
            Log::critical("Création d'un livre est impossible, Exception: $exception ".now());
            return response()->json([
                'Exception' => $exception,
                'status' => 405
            ], 405);
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
     *      path="/api/livres/{id}",
     *      operationId="livres_one",
     *      tags={"livres"},
     *      summary="Atteindre un dossier",
     *      description="Obtenir les données d'un livre",
     *     @OA\Response(response="200", description="Affichage d'un livre")
     * )
     */
    public function show($id)
    {
        $livre = Livre::where('id',$id)->with('user')->first();
        if(!$livre){
            return response()->json([
                'message' => "Livre introuvable ou inexistant",
                'status' => 404
            ], 404);
        }
        return response()->json([
            'livre' => $livre,
            'status' => 200
        ], 200);
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
     *      path="/api/livres/{id}",
     *      operationId="livres_update",
     *      tags={"livres"},
     *      summary="Mise à jour d'un livre",
     *      description="Mise à jour d'un livre",
     *      @OA\RequestBody(
     *          required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="sku",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="nom",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="user_id",
     *                     type="integer"
     *                 ),
     *                 @OA\Property(
     *                     property="points",
     *                     type="integer"
     *                 ),
     *                 example = {"sku": "Meth473","nom": "Go  English","points": 400, "user_id":2}
     *             )
     *         )
     *
     *      ),
     *      @OA\Response(
     *          response=200,
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
                'sku' => 'required',
                'nom' => 'required',
                'points' => 'required',
                'user_id' => 'required',
            ]);
            $livre = Livre::find($id);
            if(!$livre){
                return response()->json([
                    'message' => 'livre introuvable ou inexistant',
                    'status' => 404
                ], 404);
            }
            $livre->update([
                'sku' => $request->sku,
                'nom' => $request->nom,
                'points' => $request->points,
                'status' => $livre->status
            ]);
            if($livre){
                Log::info("Mise à jour d'un livre reussi: $request->sku - $request->nom - $request->points - $request->status ".now());
                return response()->json([
                    'message' => "Mise à jour d'un livre avec succès",
                    'livre' => $livre,
                    'status' => 200
                ], 200);
            }else{
                Log::warning("Mise à jour d'un livre est impossible: $request->sku - $request->nom - $request->points");
                return response()->json([
                    'message' => "Mise à jour d'un livre a échoué ",
                    'status' => 403
                ], 403);
            }

        } catch (Exception $exception) {
            Log::critical("Mise àjour d'un livre est impossible, Exception $exception ".now());
            return response()->json([
                'Exception' => $exception,
                'status' => 405
            ], 405);
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
     *      path="/api/livres/2",
     *      operationId="livre_dlete",
     *      tags={"livres"},
     *      summary="Supprimer un livre",
     *      description="Supprimer les données d'un livre",
     *     @OA\Response(response="200", description="Suppression d'un livre")
     * )
     */
    public function destroy($id)
    {
        $livre = Livre::find($id);
        if(!$livre){
            return response()->json([
                'message' => 'Livre introuvable ou inexistant',
                'status' => 404
            ], 404);
        }
        if($livre->delete()){
            return response()->json([
                'message' => "Livre supprimé avec succès",
                'status' => 200
            ], 200);
        }
    }
}
