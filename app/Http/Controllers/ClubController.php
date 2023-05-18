<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Resource;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clubs = Club::all();
        return response()->json([
            'clubs' => $clubs,
        ], Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->club != '' && $request->balance_available != '' && $request->club != null && $request->balance_available != null) {
            $club = Club::create([
                'club' => $request->club,
                'balance_available' => $request->balance_available,
            ]);
            return response()->json([
                'club' => $club,
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'success' => false,
                'error' => 'Você deve enviar os parâmetros necessários para salvar: clube e saldo_disponivel'
            ], Response::HTTP_CONFLICT);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Club $club)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Club $club)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        if($request->clube_id != '' && $request->recurso_id != '' && $request->clube_id != null && $request->recurso_id != null && $request->valor_consumo != '' && $request->valor_consumo != null) {
            $clubExist = Club::where('id', $request->clube_id)->get();
            if($clubExist->count() > 0) {
                if($clubExist->first()->balance_available >= $request->valor_consumo) {
                    $value_last = $clubExist->first()->balance_available;
                    $value = $clubExist->first()->balance_available - $request->valor_consumo;
                    $clubExist->first()->update([
                        'balance_available' => $value
                    ]);
                    $club = $clubExist->first();
                    $resource = Resource::where('id', $request->recurso_id)->get()->first();
                    $value_resource = $resource->balance_available - $request->valor_consumo;
                    $resource->update([
                        'balance_available' => $value_resource
                    ]);
                    return response()->json([
                        'clube' => $club->club,
                        'saldo_anterior' => $value_last,
                        'saldo_atual' => $club->balance_available
                    ], Response::HTTP_OK);
                } else {
                    return response()->json([
                        'success' => false,
                        'error' => 'O saldo disponível do clube é insuficiente.'
                    ], Response::HTTP_BAD_REQUEST);
                }

            } return response()->json([
                'success' => false,
                'error' => 'Os dados não batem com o banco de dados.'
            ], Response::HTTP_BAD_REQUEST);

        } else {
            return response()->json([
                'success' => false,
                'error' => 'Você deve enviar os parâmetros necessários para salvar: clube_id, recurso_id e valor_consumo.'
            ], Response::HTTP_CONFLICT);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Club $club)
    {
        //
    }
}
