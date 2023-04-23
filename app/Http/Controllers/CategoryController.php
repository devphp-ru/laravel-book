<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\View\View;

class CategoryController extends Controller
{
	/**
	 * @param string $slug
	 * @return View
	 */
    public function show(string $slug): View
	{
		$categories = Category::get();

		$category = $categories->filter(function ($value) use ($slug) {
			if ($value->slug === $slug) {
				return true;
			}

			return null;
		})->first();

		$books = Book::with('author', 'category')->where('category_id', function ($query) use ($slug) {
			$query->select('id')->from('categories')->where('slug', $slug)->value('id');
		})->orderByDesc('id')->paginate(10);

		return view('categories.show', [
			'title' => 'Категория: ' . $category->title,
			'paginator' => $books,
		]);
	}

	/**
	 * @param int $authorId
	 * @return View
	 */
	public function author(int $authorId): View
	{
		$books = Book::with('author', 'category')->where('author_id', function ($query) use ($authorId) {
			$query->select('id')->from('authors')->where('id', $authorId)->value('id');
		})->orderByDesc('id')->paginate(10);

		return view('categories.show', [
			'title' => 'Автор: ' . $books[0]->author->name,
			'paginator' => $books,
		]);
	}

	/**
	 * @param string $slug
	 * @return View
	 */
	public function single(string $slug): View
	{
		$book = Book::with('author', 'category', 'comments')->where('slug', $slug)->first();

		return view('categories.single', [
			'item' => $book,
		]);
	}
}
