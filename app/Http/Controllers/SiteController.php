<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\View\View;

class SiteController extends Controller
{
	/**
	 * @return View
	 */
    public function index(): View
	{
		$books = Book::with('author')->orderByDesc('id')->paginate(10);

		return view('sites.index', [
			'paginator' => $books,
		]);
	}
}
