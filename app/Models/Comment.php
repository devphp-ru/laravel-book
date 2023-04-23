<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Comment
 * @package App\Models
 * @mixin Builder
 */
class Comment extends Model
{
    use HasFactory;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [
		'book_id',
		'user_id',
		'username',
		'comment',
	];

	/**
	 * @return BelongsTo
	 */
	public function book(): BelongsTo
	{
		return $this->belongsTo(Book::class);
	}
}
