<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository;
use App\Repositories\UserRepository;
use Illuminate\View\View;

class CommentController extends Controller
{
    public function __construct(protected UserRepository $userRepository, protected PostRepository $postRepository) {}

    public function getCommentsByUser(int $id): View
    {
        return view('comment.index', [
            'comments' => $this->userRepository->getComments($id),
        ]);
    }

    public function getCommentsByPost(int $id): View
    {
        return view('comment.index', [
            'comments' => $this->postRepository->getComments($id),
        ]);
    }
}
