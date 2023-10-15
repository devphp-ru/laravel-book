<?php

namespace App\Services\Books;

use App\Models\BaseModel;

/**
 * Interface BookServiceInterface
 *
 * @package App\Services\Books
 */
interface BookServiceInterface
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
