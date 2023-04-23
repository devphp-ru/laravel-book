<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
	 * @return \Illuminate\Contracts\Auth\StatefulGuard
	 */
	protected function guard()
	{
		return Auth::guard();
	}
}
