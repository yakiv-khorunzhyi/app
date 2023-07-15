<?php

namespace App\Repositories;

use App\Exceptions\NotFoundException;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class BaseRepository
{
    protected string $model = Model::class;

    public function getModel(): string
    {
        return $this->model;
    }

    ////////////////////////////////////////////////////////////////////////////////

    public function getAll(array $columns = ['*']): Collection
    {
        return $this->model::all($columns);
    }

    public function findById(int $id): ?Post
    {
        return $this->model::find($id);
    }
}
