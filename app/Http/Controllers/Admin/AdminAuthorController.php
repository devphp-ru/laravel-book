<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Models\Author;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminAuthorController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$authors = Author::orderByDesc('id')->paginate(10);

		return view('admin.authors.index', [
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
		return view('admin.authors.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  StoreAuthorRequest  $request
	 * @return RedirectResponse
	 */
	public function store(StoreAuthorRequest $request): RedirectResponse
	{
		$item = new Author();
		$result = $item::create($request->only($item->getFillable()));

		if (!$result) {
			return back()->withErrors(['errors' => 'Ошибка сохранения']);
		}

		return redirect()
			->route('authors.index')
			->with(['success' => 'Успешно сохранено.']);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  Author $author
	 * @return View
	 */
	public function edit(Author $author): View
	{
		return view('admin.authors.edit', [
			'item' => $author,
		]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  UpdateAuthorRequest  $request
	 * @param  Author $author
	 * @return RedirectResponse
	 */
	public function update( UpdateAuthorRequest $request, Author $author): RedirectResponse
	{
		$result = $author->update($request->only($author->getFillable()));

		if (!$result) {
			return back()->withErrors(['errors' => 'Ошибка сохранинея'])->withInput();
		}

		return redirect()
			->route('authors.index')
			->with(['success' => 'Успешно сохранено.']);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Author $author
	 * @return RedirectResponse
	 */
	public function destroy(Author $author): RedirectResponse
	{
		if ($author->books->count()) {
			return back()->withErrors(['errors' => 'Нельзя удалить автора у которого есть книги.']);
		}

		$result = $author->delete();

		if (!$result) {
			return back()->withErrors(['errors' => 'Ошибка удаления.']);
		}

		return redirect()
			->route('authors.index')
			->with(['success' => 'Успешно удалено.']);
	}
}
