<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use App\Services\UserService;
use Illuminate\View\View;

class UserController extends Controller
{
    public function __construct(protected UserService $service, protected UserRepository $repository) {}

    public function index(): View
    {
        return view('user.index', [
            'users' => $this->repository->getAll(),
        ]);
    }
}
