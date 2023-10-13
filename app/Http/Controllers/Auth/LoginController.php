<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\AuthenticationService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Class LoginController
 *
 * @package App\Http\Controllers\Auth
 */
class LoginController extends Controller
{
	/** @var AuthenticationService  */
	private AuthenticationService $authenticationService;

	/**
	 * LoginController constructor.
	 *
	 * @param AuthenticationService $authenticationService
	 */
	public function __construct(AuthenticationService $authenticationService)
	{
		$this->authenticationService = $authenticationService;
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
		if ($this->authenticationService->checkUser($request)) {
			return redirect()
				->route('site.index')
				->with(['success' => 'Вы вошли в систему.']);
		} elseif ($this->authenticationService->checkAdmin($request)) {
			return redirect()
				->route('admin.index')
				->with(['success' => 'Вы вошли в систему.']);
		}

		return back()->withErrors(['error' => 'Неверный логин/пароль.']);
	}

}
