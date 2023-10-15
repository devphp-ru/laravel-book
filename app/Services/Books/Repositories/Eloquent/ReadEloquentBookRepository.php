<?php

namespace App\Services\Books\Repositories\Eloquent;

use App\Models\Book;
use App\Services\Books\Repositories\ReadBookRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class ReadEloquentBookRepository
 *
 * @package App\Services\Books\Repositories\Eloquent
 */
class ReadEloquentBookRepository implements ReadBookRepositoryInterface
{
	/** @var Book  */
	private Book $book;

	/**
	 * ReadEloquentBookRepository constructor.
	 *
	 * @param Book $book
	 */
	public function __construct(Book $book)
	{
		$this->book = $book;
	}

	/**
	 * Получить модель из хранилища по ID
	 *
	 * @param int $id
	 * @return Book
	 */
	public function getById(int $id): Book
	{
		return $this->book->find($id);
	}

	/**
	 * Получить модель из хранилища по Slug
	 *
	 * @param string $slug
	 * @return Book
	 */
	public function getBySlug(string $slug): Book
	{
		return $this->book->where('slug', '=', $slug)->first();
	}

	/**
	 * Получить коллекции моделей из хранилища
	 *
	 * @return Collection
	 */
	public function findAll(): Collection
	{
		return $this->book->orderByDesc('id')->get();
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
		$builder = $this->book::with('category', 'author');

		$result = $builder
			->orderByDesc('id')
			->paginate($perPage)
			->withQueryString();

		return $result;
	}

}
