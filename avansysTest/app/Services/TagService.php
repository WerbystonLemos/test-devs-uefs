<?php

namespace App\Services;

use App\Models\Tag;

class TagService
{
    public function getAllTags()
    {
        return Tag::all();
    }

    public function getTagById($id)
    {
        $data = Tag::find($id);

        if(!isset($data->id))
        {
            return response()->json([
                'message' => 'Tag não encontrada!',
            ], 404);
        }
        else
        {
            return $data;
        }
    }

    public function createTag($request)
    {
        try
        {
            $validateData = $request->validate([
                'name' => 'required|string',
            ]);

            Tag::create($validateData);

            return response()->json([
                'message' => 'Tag criada com sucesso!',
            ], 200);
        }
        catch(\Exception $erro)
        {
            return response()->json([
                'message'   => 'Erro ao criar tag!',
                'error'     => $erro->getMessage(),
            ], 500);
        }
    }

    public function updateTag($request, $id)
    {
        try
        {
            $validateData = $request->validate([
                'name' => 'required|string',
            ]);

            $tagId = Tag::find($id);

            if($tagId)
            {
                $tagId->update($validateData);

                return response()->json([
                    'message' => 'Tag atualizada com sucesso!',
                ], 200);
            }
            else
            {
                return response()->json([
                    'message' => 'Erro ao atualizar Tag!',
                    'error' => 'Tag não encontrada!',
                ], 404);
            }
        }
        catch(\Exception $erro)
        {
            return response()->json([
                'message'   => 'Erro ao atualizar tag!',
                'error'     => $erro->getMessage(),
            ], 500);
        }
    }

    public function deleteTag($id)
    {
        $isDeleted = Tag::destroy($id);

        if($isDeleted)
        {
            return response()->json([
                'message' => 'Tag deletada com sucesso!',
            ], 200);
        }
        else
        {
            return response()->json([
                'message' => 'Erro ao deletar Tag!',
                'error' => 'Tag não encontrada!',
            ], 404);
        }
    }

}
