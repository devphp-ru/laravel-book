<?php

namespace App\Http\Controllers;

use App\Services\Books\BookServiceInterface;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class SiteController
 *
 * @package App\Http\Controllers
 */
class SiteController extends Controller
{
	/** @var BookServiceInterface  */
	private BookServiceInterface $readBookService;

	/**
	 * SiteController constructor.
	 *
	 * @param BookServiceInterface $bookService
	 */
	public function __construct(BookServiceInterface $bookService)
	{
		$this->readBookService = $bookService;
	}

	/**
	 * Показать главную страницу
	 *
	 * @param Request $request
	 * @return View
	 */
    public function index(Request $request): View
	{
		$books = $this->readBookService->getAllWithPaginate($request, 10);

		return view('sites.index', [
			'paginator' => $books,
		]);
	}

}
