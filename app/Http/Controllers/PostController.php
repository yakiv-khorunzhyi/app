<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\CreateRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Repositories\PostRepository;
use App\Services\PostService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PostController extends Controller
{
    public function __construct(protected PostService $service, protected PostRepository $repository)
    {
    }

    public function index(): View
    {
        return view('post.index', [
            'posts' => $this->repository->getAll(),
        ]);
    }

    public function create(): View
    {
        return view('post.create');
    }

    public function store(CreateRequest $request): RedirectResponse
    {
        $this->service->create($request->validated());

        return Redirect::route('posts.index');
    }

    public function edit(string $id): View
    {
        return view('post.edit', [
            'post' => $this->repository->findById($id),
        ]);
    }

    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $this->service->update($request->validated(), $id);

        return Redirect::route('posts.index');
    }

    public function destroy(string $id): RedirectResponse
    {
        $this->service->destroy($id);

        return Redirect::route('posts.index');
    }

    public function show(Request $request): View
    {
        return view('post.index', [
            'posts' => $this->repository->searchByTitleAndBody($request->get('search')),
        ]);
    }
}
