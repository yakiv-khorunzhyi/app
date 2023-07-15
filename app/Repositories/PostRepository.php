<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Support\Collection;

class PostRepository extends BaseRepository
{
    protected string $model = Post::class;

    public function getComments(int $postId): Collection
    {
        return $this->getModel()::find($postId)->comments;
    }

    public function searchByTitleAndBody(string $value): Collection
    {
        return $this->getModel()::where('title', 'LIKE', "%$value%")
                    ->orWhere('body', 'LIKE', "%$value%")
                    ->get();
    }
}
