<?php

namespace App\Services\Books\Commands;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Interface CommandQueryInterface
 *
 * @package App\Services\Books\Commands
 */
interface CommandQueryBookInterface extends Command
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
