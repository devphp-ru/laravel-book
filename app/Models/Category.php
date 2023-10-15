<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Category
 *
 * @mixin Builder
 * @package App\Models
 */
class Category extends BaseModel
{
    use HasFactory, Sluggable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [
		'slug',
		'title',
	];

	/** @var string  */
	public const IS_ACTIVE = 'Y';

	/**
	 * Return the sluggable configuration array for this model.
	 *
	 * @return array
	 */
	public function sluggable(): array
	{
		return [
			'slug' => [
				'source' => 'title'
			]
		];
	}

	/**
	 * Получить книги принадлежащие категории
	 *
	 * @return HasMany
	 */
	public function books(): HasMany
	{
		return $this->hasMany(Book::class);
	}

	/**
	 * Диапазон запроса, включающий только активные категории
	 *
	 * @param Builder $builder
	 * @return Builder
	 */
	public function scopeIsActive(Builder $builder): Builder
	{
		return $builder->where('is_active', self::IS_ACTIVE);
	}

}
