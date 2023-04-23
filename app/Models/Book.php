<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

/**
 * Class Book
 * @package App\Models
 * @mixin Builder
 */
class Book extends Model
{
    use HasFactory, Sluggable;

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
	 * @return BelongsTo
	 */
	public function author(): BelongsTo
	{
		return $this->belongsTo(Author::class);
	}

	/**
	 * @return BelongsTo
	 */
	public function category(): BelongsTo
	{
		return $this->belongsTo(Category::class);
	}

	/**
	 * @return HasMany
	 */
	public function comments(): HasMany
	{
		return $this->hasMany(Comment::class);
	}

	/**
	 * @return string
	 */
	public function hortDescription(): string
	{
		return mb_substr($this->description, 0, 80) . '...';
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
