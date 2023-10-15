<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Services\Books\BookServiceInterface;
use App\Services\Books\Commands\CommandQueryBookHandler;
use App\Services\Books\ReadBookService;
use App\Services\Books\Repositories\Eloquent\ReadEloquentBookRepository;
use Tests\TestCase;

/**
 * Class BookTest
 *
 * @package Tests\Feature
 */
class BookTest extends TestCase
{
	/**
	 * Получить одну модель из хранилища по ID
	 * Тест проверяющий состояние
	 */
	public function testGetOneBookById(): void
	{
		// Arrange Подготовка
		$readBookService = $this->createReadBookService();
		$id = 1;

		// Act Действие
		$book = $readBookService->getById($id);

		// Assert Проверка
		$this->assertResultTest($book);
	}

	/**
	 * Получить одну модель из хранилища по Slug
	 * Тест проверяющий состояние
	 */
	public function testGetOneBookBySlug(): void
	{
		// Arrange
		$readBookService = $this->createReadBookService();
		$slug = 'kniga-1';

		// Act
		$book = $readBookService->getBySlug($slug);

		// Assert
		$this->assertResultTest($book);
	}

	/**
	 * Фабричный метод создания сервиса категории
	 * Выделение общего кода инициализации в приватные фабричные методы
	 *
	 * @return BookServiceInterface
	 */
	private function createReadBookService(): BookServiceInterface
	{
		$book = new Book();
		$readEloquentBookRepository = new ReadEloquentBookRepository($book);
		$commandQuery = new CommandQueryBookHandler($readEloquentBookRepository);
		$readBookService = new ReadBookService($commandQuery);

		return $readBookService;
	}

	/**
	 * Проверить результаты теста
	 * Вспомогательный метод в тестовой проверке
	 *
	 * @param Book $book
	 */
	private function assertResultTest(Book $book): void
	{
		$this->assertEquals(1, $book->id);
		$this->assertEquals(2, $book->category_id);
		$this->assertEquals(25, $book->author_id);
		$this->assertEquals('kniga-1', $book->slug);
		$this->assertEquals('Книга 1', $book->title);
		$this->assertEquals('book description', $book->description);
		$this->assertEquals(15, $book->rating);
		$this->assertEquals('https://via.placeholder.com/180x250', $book->cover);
	}

}
