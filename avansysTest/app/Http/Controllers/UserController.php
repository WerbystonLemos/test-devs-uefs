<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
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
        $validateData = $request->validate([
            'name'       => 'required|string',
            'email'      => 'required|email',
            'date_birth' => 'required|date',
        ]);

        try
        {
            User::create($validateData);

            return response()->json([
                'message' => 'Usuário criado com sucesso!',
                'data'    => $validateData,
            ],200);
        }
        catch (\Exception $erro)
        {
            return response()->json([
                'message' => 'Erro ao criar usuário!',
                'error'   => $erro->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'name'          => 'string',
            'email'         => 'email',
            'date_birth'    => 'date',
        ]);

        try
        {
            $user = User::find($id);

            if($user)
            {
                $user->update($validateData);

                return response()->json([
                    'message'   => 'Usuário atualizado com sucesso!',
                    'data'      => $validateData,
                ], 200);
            }
            else
            {
                return response()->json([
                    'message'   => 'Usuário não encontrado!',
                ], 404);
            }
        }
        catch (\Exception $erro)
        {
            return response()->json([
                'message'   => 'Erro ao atualizar usuário!',
                'error'     => $erro->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted  = (User::destroy($id));

        if($deleted)
        {
            return response()->json([
                'message'   => 'Usuário deletado com sucesso!',
            ], 200);
        }
        else
        {
            return response()->json([
                'message'   => 'Usuário não encontrado!',
            ], 404);
        }
    }
}
