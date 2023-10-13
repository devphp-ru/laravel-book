<?php

namespace App\Services\Contracts;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Interface Authentication
 *
 * @package App\Services\Contracts
 */
interface Authentication
{
	/**
	 * Аутентификация пользователя
	 *
	 * @param FormRequest $request
	 * @return bool
	 */
	public function checkUser(FormRequest $request): bool;

	/**
	 * Аутентификация админа
	 *
	 * @param FormRequest $request
	 * @return bool
	 */
	public function checkAdmin(FormRequest $request): bool;

}
