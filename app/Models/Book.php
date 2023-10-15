<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

/**
 * Class Book
 *
 * @mixin Builder
 * @package App\Models
 */
class Book extends BaseModel
{
    use Sluggable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [
		'category_id',
		'author_id',
		'slug',
		'title',
		'description',
		'rating',
		'cover',
	];

	/** @var int  */
	private const MIN_LENGTH_TEXT = 80;

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
	 * Получить автора книги
	 *
	 * @return BelongsTo
	 */
	public function author(): BelongsTo
	{
		return $this->belongsTo(Author::class);
	}

	/**
	 * Получить категорию книги
	 *
	 * @return BelongsTo
	 */
	public function category(): BelongsTo
	{
		return $this->belongsTo(Category::class);
	}

	/**
	 * Получить комментарии книги
	 *
	 * @return HasMany
	 */
	public function comments(): HasMany
	{
		return $this->hasMany(Comment::class);
	}

	/**
	 * Получить короткое описание книги
	 *
	 * @return string
	 */
	public function hortDescription(): string
	{
		return \mb_substr($this->description, 0, self::MIN_LENGTH_TEXT) . '...';
	}

	/**
	 * Сохранить изображение
	 *
	 * @param FormRequest $request
	 * @param string|null $image
	 * @return string|null
	 */
	public function uploadImage(FormRequest $request, string $image = null): ?string
	{
		if ($request->has('file')) {
			if ($image) {
				Storage::delete($image);
			}

			return $request->file('file')->store('covers', 'public');
		}

		return $image;
	}

	/**
	 * Получить путь изображения
	 *
	 * @return string|null
	 */
	public function getImage(): ?string
	{
		return preg_match('#^covers#', $this->cover) ? asset("storage/{$this->cover}") : $this->cover;
	}

}
