<?php

namespace App\Services\Books\Repositories;

use App\Models\BaseModel;

/**
 * Interface BookRepositoryInterface
 *
 * @package App\Services\Books\Repositories
 */
interface BookRepositoryInterface
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

