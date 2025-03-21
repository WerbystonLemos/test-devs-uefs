<?php

namespace App\Services;

use App\Models\Post;

class PostServices
{
    public function getAllPosts()
    {
        return Post::all();
    }

    public function getPostById($id)
    {
        $data = Post::find($id);

        if(!isset($data->id))
        {
            return response()->json([
                'message' => 'Post não encontrado!',
            ], 404);
        }

        return $data;
    }

    public function createPost($request)
    {
        try
        {
            $validateData = $request->validate([
                'title'     => 'string|required',
                'user_id'   => 'integer|required',
                'tag_id'    => 'integer',
                'content'   => 'string|required',
            ]);

            Post::create($validateData);

            return response()->json([
                'message'   => 'Post criando com sucesso!',
                'data'      => $validateData,
            ], 200);
        }
        catch (\Exception $erro)
        {
            return response()->json([
                'message' => 'Erro ao criar post!',
                'error'   => $erro->getMessage(),
            ], 500);
        }
    }

    public function updatePost($request, $id)
    {
        try
        {
            $validateData = $request->validate([
                'title'     => 'string',
                'user_id'   => 'integer',
                'tag_id'    => 'integer',
                'content'   => 'string',
            ]);

            $post = Post::find($id);

            if($post)
            {
                $post->update($validateData);
                return response()->json([
                    'message'   => 'Post atualizado com sucesso!',
                    'data'      => $validateData,
                ], 200);
            }
            else
            {
                return response()->json([
                    'message'   => 'Post não encontrado!',
                    'data'      => $validateData,
                ], 404);
            }
        }
        catch(\Exception $erro)
        {
            return response()->json([
                'message'   => 'Erro ao atualizar post!',
                'error'     => $erro->getMessage()
            ], 500);
        }
    }

    public function deletePost($id)
    {
        $isDeleted = Post::destroy($id);

        try
        {
            if($isDeleted)
            {
                return response()->json([
                    'message'   => 'Post deletado com sucesso!',
                ], 200);
            }
            else
            {
                return response()->json([
                    'message'   => 'Erro ao deletar post!',
                    'error'     => 'Post não encontrado!',
                ], 404);
            }
        }
        catch( \Exception $erro)
        {
            return response()->json([
                'message'   => 'Erro ao deletar post!',
                'error'     => $erro->getMessage(),
            ], 500);
        }
    }

}
