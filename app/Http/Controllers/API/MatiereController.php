<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Matiere;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MatiereController extends Controller
{
    public function matiere_status_activer($id){
        $matiere = Matiere::find($id);
        if(!$matiere){
            return response()->json([
                'message' => 'Matiere introuvable ou inexistante',
                'status' => 404
            ], 404);
        }
        $matiere->update([
            'status' => true
        ]);
        if($matiere){
            return response()->json([
                'message' => 'Matiere activée avec succès',
                'matiere' => $matiere,
                'status' => 200
            ], 200);
        }

    }
    public function matiere_status_desactiver($id){
        $matiere = Matiere::find($id);
        if(!$matiere){
            return response()->json([
                'message' => 'Matiere introuvable ou inexistante',
                'status' => 404
            ], 404);
        }
        $matiere->update([
            'status' => false
        ]);
        if($matiere){
            return response()->json([
                'message' => 'Matiere desactivée avec succès',
                'matiere' => $matiere,
                'status' => 200
            ], 200);
        }

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Get(
     *      path="/api/matieres",
     *      operationId="matieres_list",
     *      tags={"matieres"},
     *      summary="liste des matières",
     *      description="liste des matières",
     *     @OA\Response(response="200", description="Affiche la liste des matières")
     * )
     */
    public function index()
    {
        $matieres = Matiere::with('users')->get();
        return response()->json([
            'matieres' => $matieres,
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
     *      path="/api/matieres",
     *      operationId="matieres",
     *      tags={"matieres"},
     *      summary="Création d'une matière",
     *      description="Création d'une matière",
     *      @OA\RequestBody(
     *          required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="designation",
     *                     type="string"
     *                 ),
     *                 example={"designation": "EPS"}
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
                'designation' => 'required'
            ]);
            $matiere = Matiere::create([
                'designation' => $request->designation,
                'status' => true
            ]);
            if($matiere){
                Log::info("Création d'une matière reussi: $request->designation ".now());
                return response()->json([
                    'message' => "Matière créée avec succès",
                    'matiere' => $matiere,
                    'status' => 201
                ], 201);
            }else{
                Log::warning("Création d'une matière est impossible: $request->designation ".now());
                return response()->json([
                    'message' => "Céation d'une matière à echoué",
                    'status' => 403
                ], 403);
            }
        } catch (Exception $exception) {
            Log::critical("Création d'une matière est impossible, Exception: $exception ".now());
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
     *      path="/api/matieres/{id}",
     *      operationId="matieres_one",
     *      tags={"matieres"},
     *      summary="Atteindre une matiere",
     *      description="Obtenir les données d'une matiere",
     *     @OA\Response(response="200", description="Affichage d'une matiere")
     * )
     */
    public function show($id)
    {
        $matiere = Matiere::where('id', $id)->with('users')->first();
        if(!$matiere){
            return response()->json([
                'message' => "Matière introuvable ou inexistante",
                'status' => 404
            ], 404);
        }
        return response()->json([
            'matiere' => $matiere,
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
     *      path="/api/matieres/{id}",
     *      operationId="matieres_update",
     *      tags={"matieres"},
     *      summary="Mise à jour d'une matière",
     *      description="Mise à jour d'une matière",
     *      @OA\RequestBody(
     *          required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="designation",
     *                     type="string"
     *                 ),
     *                 example={"designation": "EPS"}
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
                'designation' => 'required'
            ]);
            $matiere = Matiere::find($id);
            if(!$matiere){
                return response()->json([
                    'message' => "Matière introuvable ou inexistante",
                    'status' => 404
                ], 404);
            }
            $matiere->update([
                'designation' => $request->designation,
            ]);
            if($matiere){
                Log::info("Mise à jour d'une matière avec succès: $request->designation ".now());
                return response()->json([
                    'message' => "Matière mise à jour",
                    'matiere' => $matiere,
                    'status' => 200
                ], 200);
            }else{
                Log::warning("Mise à jour d'une matière est impossible: $request->designation ".now());
                return response()->json([
                    'message' => "Mise à jour d'une matière a echoué",
                    'status' => 403
                ], 403);
            }
        } catch (Exception $exception) {
            Log::critical("Mise à jour d'une matière est impossible; Exception: $exception ".now());
            return response()->json([
                'Exception' => $exception,
                'status' => 405
            ],405);
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
     *      path="/api/matieres/{id}",
     *      operationId="matieres_delete",
     *      tags={"matieres"},
     *      summary="Supprimer une matiere",
     *      description="Supprimer les données d'une matiere",
     *     @OA\Response(response="200", description="Suppression d'une matiere")
     * )
     */
    public function destroy($id)
    {
        $matiere = Matiere::find($id);
        if(!$matiere){
            return response()->json([
                'message' => "Matière introuvable ou inexistante",
                'status' => 404
            ], 404);
        }
        if($matiere->delete()){
            return response()->json([
                'message' => "Matière supprimée avec succes",
                'status' => 200
            ], 200);
        }
    }
}
