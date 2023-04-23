<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminBookController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return View
	 */
	public function index(): View
	{
		$authors = Book::orderByDesc('id')->paginate(10);

		return view('admin.books.index', [
			'paginator' => $authors,
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return View
	 */
	public function create(): View
	{
		$categories = Category::get()->pluck('title', 'id');
		$authors = Author::get()->pluck('name', 'id');

		return view('admin.books.create', [
			'categories' => $categories,
			'authors' => $authors,
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  StoreBookRequest  $request
	 * @return RedirectResponse
	 */
	public function store(StoreBookRequest $request): RedirectResponse
	{
		$item = new Book();
		$result = $item::create($request->only($item->getFillable()));

		if (!$result) {
			return back()->withErrors(['errors' => 'Ошибка сохранения']);
		}

		return redirect()
			->route('books.index')
			->with(['success' => 'Успешно сохранено.']);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  Book $book
	 * @return View
	 */
	public function edit(Book $book): View
	{
		$categories = Category::get()->pluck('title', 'id');
		$authors = Author::get()->pluck('name', 'id');

		return view('admin.books.edit', [
			'item' => $book,
			'categories' => $categories,
			'authors' => $authors,
		]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  UpdateBookRequest $request
	 * @param  Book $book
	 * @return RedirectResponse
	 */
	public function update(UpdateBookRequest $request, Book $book): RedirectResponse
	{
		if ($request->hasFile('file')) {
			$request->offsetSet('cover', $book->uploadImage($request, $book->cover));
		}

		$result = $book->update($request->only($book->getFillable()));

		if (!$result) {
			return back()->withErrors(['errors' => 'Ошибка сохранинея'])->withInput();
		}

		return redirect()
			->route('books.index')
			->with(['success' => 'Успешно сохранено.']);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  Book $book
	 * @return RedirectResponse
	 */
	public function destroy(Book $book): RedirectResponse
	{
		$result = $book->delete();

		if (!$result) {
			return back()->withErrors(['errors' => 'Ошибка удаления.']);
		}

		return redirect()
			->route('books.index')
			->with(['success' => 'Успешно удалено.']);
	}
}
