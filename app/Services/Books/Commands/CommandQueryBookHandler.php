<?php

namespace App\Services\Books\Commands;

use App\Models\Book;
use App\Services\Books\Repositories\BookRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class CommandEloquentQueryHandler
 *
 * @package App\Services\Books\Commands
 */
class CommandQueryBookHandler implements CommandQueryBookInterface
{
	/** @var BookRepositoryInterface  */
	private BookRepositoryInterface $bookRepository;

	/**
	 * CommandEloquentQueryHandler constructor.
	 *
	 * @param BookRepositoryInterface $bookRepository
	 */
	public function __construct(BookRepositoryInterface $bookRepository)
	{
		$this->bookRepository = $bookRepository;
	}

	/**
	 * Получить модель из хранилища по ID
	 *
	 * @param int $id
	 * @return Book
	 */
	public function getById(int $id): Book
	{
		return $this->bookRepository->getById($id);
	}

	/**
	 * Получить модель из хранилища по Slug
	 *
	 * @param string $slug
	 * @return Book
	 */
	public function getBySlug(string $slug): Book
	{
		return $this->bookRepository->getBySlug($slug);
	}

	/**
	 * Получить коллекцию моделей из хранилища
	 *
	 * @return Collection
	 */
	public function findAll(): Collection
	{
		return $this->bookRepository->findAll();
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
		return $this->bookRepository->getAllWithPaginate($request, $perPage);
	}

}
