<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class LogoutController
 *
 * @package App\Http\Controllers\Auth
 */
class LogoutController extends Controller
{
	/**
	 * Log the user out of the application.
	 *
	 * @param Request $request
	 * @return RedirectResponse|JsonResponse
	 */
	public function logout(Request $request): RedirectResponse|JsonResponse
	{
		$this->guard()->logout();

		$request->session()->invalidate();
		$request->session()->regenerateToken();

		return $request->wantsJson()
			? new JsonResponse([], 204)
			: redirect('/');
	}

	/**
	 * Get the guard to be used during authentication.
	 *
	 * @return StatefulGuard
	 */
	protected function guard(): StatefulGuard
	{
		return Auth::guard();
	}

}
