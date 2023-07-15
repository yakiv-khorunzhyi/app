<?php

namespace App\Services;

use App\Repositories\BaseRepository;

class BaseService
{
    public function __construct(protected BaseRepository $repository) {}

    public function getRepository(): BaseRepository
    {
        return $this->repository;
    }

    public function create(array $data): void
    {
        $this->repository->getModel()::create($data);
    }

    public function update(array $data, int $id): void
    {
        $this->repository->findById($id)->update($data);
    }

    public function destroy(int $id): void
    {
        $this->repository->findById($id)->delete();
    }
}
