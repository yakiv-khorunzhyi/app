<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int     $id
 * @property string  $body
 * @property string  $name
 * @property string  $email
 * @property int     $post_id
 * @property ?string $created_at
 * @property ?string $updated_at
 * @property ?string $deleted_at
 * @method create(array $data)
 */
class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'body',
        'name',
        'email',
        'post_id',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
