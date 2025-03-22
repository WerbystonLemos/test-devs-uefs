<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *     title="API de Usuários",
 *     version="1.0.0",
 *     description="API para gerenciamento de usuários",
 *     @OA\Contact(
 *         email="suporte@example.com"
 *     ),
 *     @OA\License(
 *         name="MIT",
 *         url="https://opensource.org/licenses/MIT"
 *     )
 * )
 *
 * @OA\Server(
 *     url="http://localhost:8000/api",
 *     description="Servidor local"
 * )
 *
 * @OA\Schema(
 *     schema="User",
 *     type="object",
 *     @OA\Property(property="id", type="integer"),
 *     @OA\Property(property="name", type="string"),
 *     @OA\Property(property="email", type="string", format="email"),
 *     @OA\Property(property="date_birth", type="string", format="date")
 * )
 *
 * @OA\Schema(
 *     schema="UserRequest",
 *     type="object",
 *     required={"name", "email", "date_birth"},
 *     @OA\Property(property="name", type="string"),
 *     @OA\Property(property="email", type="string", format="email"),
 *     @OA\Property(property="date_birth", type="string", format="date")
 * )
 *
 * @OA\Schema(
 *     schema="Tag",
 *     type="object",
 *     @OA\Property(property="id", type="integer"),
 *     @OA\Property(property="name", type="string")
 * )
 *
 * @OA\Schema(
 *     schema="TagRequest",
 *     type="object",
 *     required={"name"},
 *     @OA\Property(property="name", type="string")
 * )
 *
 * @OA\Schema(
 *     schema="Post",
 *     type="object",
 *     @OA\Property(property="id", type="integer"),
 *     @OA\Property(property="title", type="string"),
 *     @OA\Property(property="content", type="string"),
 *     @OA\Property(property="user_id", type="integer")
 * )
 *
 * @OA\Schema(
 *     schema="PostRequest",
 *     type="object",
 *     required={"title", "content", "user_id"},
 *     @OA\Property(property="title", type="string"),
 *     @OA\Property(property="content", type="string"),
 *     @OA\Property(property="user_id", type="integer")
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
