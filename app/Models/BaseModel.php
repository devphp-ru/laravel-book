<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseModel
 *
 * @mixin Builder
 * @package App\Models
 */
class BaseModel extends Model
{
    use HasFactory;
}
