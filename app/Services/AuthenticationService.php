<?php

namespace App\Services;

use App\Services\Contracts\Authentication;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * Class AuthenticationService
 *
 * @package App\Services
 */
class AuthenticationService implements Authentication
{
	/** @var string  */
	private const GUARD_USER = 'web';

	/** @var string  */
	private const GUARD_ADMIN = 'admin';

	/**
	 * Аутентификация пользователя
	 *
	 * @param FormRequest $request
	 * @return bool
	 */
	public function checkUser(FormRequest $request): bool
	{
		return $this->authentication($request, self::GUARD_USER);
	}

	/**
	 * Аутентификация админа
	 *
	 * @param FormRequest $request
	 * @return bool
	 */
	public function checkAdmin(FormRequest $request): bool
	{
		return $this->authentication($request, self::GUARD_ADMIN);
	}

	/**
	 * Антентификация пользователя (user, admin)
	 *
	 * @param FormRequest $request
	 * @param string $guard
	 * @return bool
	 */
	private function authentication(FormRequest $request, string $guard): bool
	{
		if (Auth::guard($guard)->attempt($request->only('email', 'password'))) {
			if (Auth::guard($guard)->check()) {
				$request->session()->regenerate();

				return true;
			}
		}

		return false;
	}

}
