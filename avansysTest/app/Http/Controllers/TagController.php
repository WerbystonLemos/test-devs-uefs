<?php

namespace App\Http\Controllers;

use App\Services\TagService;
use Illuminate\Http\Request;

/**
 * @OA\Tag(
 *     name="Tag",
 *     description="Operações relacionadas a tags"
 * )
 */
class TagController extends Controller
{
    protected $tagService;

    public function __construct()
    {
        $this->tagService = new TagService();
    }
    /**
     * Display a listing of the resource.
     *
     * @OA\Get(
     *     path="/tag",
     *     summary="Listar todas as tags",
     *     tags={"Tag"},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de tags",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Tag")
     *         )
     *     )
     * )
     */
    public function index()
    {
        return $this->tagService->getAllTags();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @OA\Post(
     *     path="/tag",
     *     summary="Criar uma nova tag",
     *     tags={"Tag"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/TagRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Tag criada com sucesso"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Erro de validação"
     *     )
     * )
     */
    public function store(Request $request)
    {
        return $this->tagService->createTag($request);
    }

    /**
     * Display the specified resource.
     *
     * @OA\Get(
     *     path="/tag/{id}",
     *     summary="Obter uma tag pelo ID",
     *     tags={"Tag"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Detalhes da tag"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Tag não encontrada"
     *     )
     * )
     */
    public function show(string $id)
    {
        return $this->tagService->getTagById($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @OA\Put(
     *     path="/tag/{id}",
     *     summary="Atualizar uma tag",
     *     tags={"Tag"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/TagRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Tag atualizada com sucesso"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Tag não encontrada"
     *     )
     * )
     */
    public function update(Request $request, string $id)
    {
        return $this->tagService->updateTag($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @OA\Delete(
     *     path="/tag/{id}",
     *     summary="Deletar uma tag",
     *     tags={"Tag"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Tag deletada com sucesso"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Tag não encontrada"
     *     )
     * )
     */
    public function destroy(string $id)
    {
        return $this->tagService->deleteTag($id);
    }
}
