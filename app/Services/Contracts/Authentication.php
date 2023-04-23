<?php

namespace App\Services\Contracts;

use Illuminate\Foundation\Http\FormRequest;

interface Authentication extends Service
{
	/**
	 * аутентификация пользователя
	 *
	 * @param FormRequest $request
	 * @return bool
	 */
	public function checkUser(FormRequest $request): bool;

	/**
	 * аутентификация админа
	 *
	 * @param FormRequest $request
	 * @return bool
	 */
	public function checkAdmin(FormRequest $request): bool;
}
