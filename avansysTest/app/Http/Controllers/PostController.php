<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PostServices;

/**
 * @OA\Tag(
 *  name="Post",
 *  description="Operações relacionadas a posts"
 * )
 */
class PostController extends Controller
{
    protected $postServices;

    public function __construct()
    {
        $this->postServices = new PostServices();
    }

    /**
     * Display a listing of the resource.
     *
     * @OA\Get(
     *     path="/post",
     *     summary="Listar todos os posts",
     *     tags={"Post"},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de posts",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Post")
     *         )
     *     )
     * )
     *
     */
    public function index()
    {
        return $this->postServices->getAllPosts();
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
     *
     * @OA\Post(
     *     path="/post",
     *     summary="Criar um novo post",
     *     tags={"Post"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/PostRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Post criado com sucesso"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Erro de validação"
     *     )
     * )
     */
    public function store(Request $request)
    {
        return $this->postServices->createPost($request);
    }

    /**
     * Display the specified resource.
     *
     * @OA\Get(
     *     path="/post/{id}",
     *     summary="Obter um post pelo ID",
     *     tags={"Post"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Detalhes do post"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Post não encontrado"
     *     )
     * )
     */
    public function show(string $id)
    {
        return $this->postServices->getPostById($id);
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
     *
     * @OA\Put(
     *     path="/post/{id}",
     *     summary="Atualizar um post",
     *     tags={"Post"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/PostRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Post atualizado com sucesso"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Post não encontrado"
     *     )
     * )
     */
    public function update(Request $request, string $id)
    {
        return $this->postServices->updatePost($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @OA\Delete(
     *     path="/post/{id}",
     *     summary="Deletar um post",
     *     tags={"Post"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Post deletado com sucesso"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Post não encontrado"
     *     )
     * )
     */
    public function destroy(string $id)
    {
        return $this->postServices->deletePost($id);
    }
}
