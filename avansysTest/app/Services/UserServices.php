<?php

namespace App\Services;

use App\Models\User;

class UserServices
{
    public function getAllUsers()
    {
        return User::all();
    }

    public function getUserById($id)
    {
        $data = User::find($id);

        if(!isset($data->id))
        {
            return response()->json([
                'message' => 'Usuário não encontrado!',
            ], 404);
        }

        return $data;
    }

    public function createuser($request)
    {
        try
        {
            $validateData = $request->validate([
                'name'       => 'required|string',
                'email'      => 'required|email',
                'date_birth' => 'required|date',
            ]);

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

    public function updateUser($request, $id)
    {
        try
        {
            $validateData = $request->validate([
                'name'          => 'string',
                'email'         => 'email',
                'date_birth'    => 'date',
            ]);

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

    public function deleteUser($id)
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
