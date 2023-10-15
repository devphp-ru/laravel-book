<?php

namespace App\Services\Books\Commands;

use App\Models\BaseModel;

/**
 * Interface Command
 *
 * @package App\Services\Books\Commands
 */
interface Command
{
	/**
	 * Получить модель из хранилища по ID
	 *
	 * @param int $id
	 * @return BaseModel
	 */
	public function getById(int $id): BaseModel;

	/**
	 * Получить модель из хранилища по Slug
	 *
	 * @param string $slug
	 * @return BaseModel
	 */
	public function getBySlug(string $slug): BaseModel;

}
