<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Collection;

class UserRepository extends BaseRepository
{
    protected string $model = User::class;

    public function getComments(int $postId): Collection
    {
        $user = $this->getModel()::with('posts.comments')->find($postId);

        return $user->posts->flatMap->comments;
    }
}
