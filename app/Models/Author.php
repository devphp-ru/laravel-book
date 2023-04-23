<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Author
 * @package App\Models
 * @mixin Builder
 */
class Author extends Model
{
    use HasFactory;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [
		'name'
	];

	/**
	 * @return HasMany
	 */
	public function books(): HasMany
	{
		return $this->hasMany(Book::class);
	}
}
