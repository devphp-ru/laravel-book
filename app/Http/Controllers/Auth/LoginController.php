<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\AuthenticationService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LoginController extends Controller
{
	/** @var AuthenticationService  */
	private AuthenticationService $service;

	public function __construct(AuthenticationService $service)
	{
		$this->service = $service;
	}

	/**
	 * Показать форму входа
	 *
	 * @return View
	 */
    public function showLoginForm(): View
	{
		return view('auth.login');
	}

	/**
	 * Аутентификация пользователя
	 *
	 * @param LoginRequest $request
	 * @return RedirectResponse
	 */
	public function login(LoginRequest $request): RedirectResponse
	{
		if ($this->service->checkUser($request)) {
			return redirect()
				->route('site.index')
				->with(['success' => 'Вы вошли в систему.']);
		} elseif ($this->service->checkAdmin($request)) {
			return redirect()
				->route('admin.index')
				->with(['success' => 'Вы вошли в систему.']);
		}

		return back()->withErrors(['error' => 'Неверный логин/пароль.']);
	}
}
