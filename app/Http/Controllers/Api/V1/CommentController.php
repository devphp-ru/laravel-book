<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CommentController extends Controller
{
	/**
	 * @param Request $request
	 * @return JsonResponse
	 */
    public function __invoke(Request $request): JsonResponse
	{
		$item = new Comment();

		$result = $item->create($request->only($item->getFillable()));

		if (!$result) {
			return response()->json([
				'status' => false,
				'message' => 'Ошибка сохранения.',
			])->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY);
		}

		return response()->json([
			'status' => true,
			'item' => $result,
			'message' => 'Успешно сохранено.',
		])->setStatusCode(Response::HTTP_OK);
	}
}
