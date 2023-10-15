<?php

namespace App\Services\Books;

use App\Models\Book;
use App\Services\Books\Commands\Command;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class ReadBookService
 *
 * @package App\Services\Books
 */
class ReadBookService implements ReadBookServiceInterface
{
	/** @var Command  */
	private Command $commandQuery;

	/**
	 * ReadBookService constructor.
	 *
	 * @param Command $command
	 */
	public function __construct(Command $command)
	{
		$this->commandQuery = $command;
	}

	/**
	 * Получить модель из хранилища по ID
	 *
	 * @param int $id
	 * @return Book
	 */
	public function getById(int $id): Book
	{
		return $this->commandQuery->getById($id);
	}

	/**
	 * Получить модель из хранилища по Slug
	 *
	 * @param string $slug
	 * @return Book
	 */
	public function getBySlug(string $slug): Book
	{
		return $this->commandQuery->getBySlug($slug);
	}

	/**
	 * Получить коллекцию моделей из хранилища
	 *
	 * @return Collection
	 */
	public function findAll(): Collection
	{
		return $this->commandQuery->findAll();
	}

	/**
	 * Получить коллекцию моделей из хранилища с пагинацией
	 *
	 * @param Request $request
	 * @param int $perPage
	 * @return LengthAwarePaginator
	 */
	public function getAllWithPaginate(Request $request, int $perPage): LengthAwarePaginator
	{
		return $this->commandQuery->getAllWithPaginate($request, $perPage);
	}

}
