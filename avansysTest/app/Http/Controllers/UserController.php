<?php

namespace App\Http\Controllers;

use App\Services\UserServices;
use Illuminate\Http\Request;

/**
 * @OA\Tag(
 *     name="User",
 *     description="Operações relacionadas a usuários"
 * )
 */
class UserController extends Controller
{
    protected $userService;

    public function __construct()
    {
        $this->userService = new UserServices();
    }

    /**
     * Display a listing of the resource.
     *
     * @OA\Get(
     *     path="/user",
     *     summary="Listar todos os usuários",
     *     tags={"User"},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de usuários",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/User")
     *         )
     *     )
     * )
     */
    public function index()
    {
        return $this->userService->getAllUsers();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @OA\Post(
     *     path="/user",
     *     summary="Criar um novo usuário",
     *     tags={"User"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/UserRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Usuário criado com sucesso"
     *     )
     * )
     */
    public function store(Request $request)
    {
        return $this->userService->createuser($request);
    }

    /**
     * Display the specified resource.
     *
     * @OA\Get(
     *     path="/user/{id}",
     *     summary="Obter um usuário pelo ID",
     *     tags={"User"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Detalhes do usuário"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Usuário não encontrado"
     *     )
     * )
     */
    public function show(string $id)
    {
        return $this->userService->getUserById($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @OA\Put(
     *     path="/user/{id}",
     *     summary="Atualizar um usuário",
     *     tags={"User"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/UserRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Usuário atualizado com sucesso"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Usuário não encontrado"
     *     )
     * )
     */
    public function update(Request $request, string $id)
    {
        return $this->userService->updateUser($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @OA\Delete(
     *     path="/user/{id}",
     *     summary="Deletar um usuário",
     *     tags={"User"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Usuário deletado com sucesso"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Usuário não encontrado"
     *     )
     * )
     */
    public function destroy(string $id)
    {
        return $this->userService->deleteUser($id);
    }
}
