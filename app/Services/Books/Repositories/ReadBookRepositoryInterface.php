<?php

namespace App\Services\Books\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Interface ReadBookRepositoryInterface
 *
 * @package App\Services\Books\Repositories
 */
interface ReadBookRepositoryInterface extends BookRepositoryInterface
{
	/**
	 * Получить коллекции моделей из хранилища
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
