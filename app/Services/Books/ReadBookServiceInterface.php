<?php

namespace App\Services\Books;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Interface ReadBookServiceInterface
 *
 * @package App\Services\Books
 */
interface ReadBookServiceInterface extends BookServiceInterface
{
	/**
	 * Получить коллекцию моделей из хранилища
	 *
	 * @return Collection
	 */
	public function findAll(): Collection;

	/**
	 * Получить коллекцию моделей из хранилища с пагинацией
	 *
	 * @param Request $request
	 * @param int $perPage
	 * @return LengthAwarePaginator
	 */
	public function getAllWithPaginate(Request $request, int $perPage): LengthAwarePaginator;

}
