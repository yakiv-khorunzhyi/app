<?php

namespace App\Services;

use App\Repositories\CommentRepository;

class CommentService extends BaseService
{
    public function __construct(CommentRepository $repository)
    {
        parent::__construct($repository);
    }
}
