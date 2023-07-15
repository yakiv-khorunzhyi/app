<?php

namespace App\Console\Commands;

use App\Services\CommentService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SyncCommentsCommand extends Command
{
    protected $signature = 'comments:sync';

    protected $description = 'Sync comments from JSONPlaceholder API';

    protected string $url = 'https://jsonplaceholder.typicode.com/comments';

    protected CommentService $service;

    public function __construct(CommentService $service)
    {
        parent::__construct();
        $this->service = $service;
    }

    public function handle(): void
    {
        $response = Http::get($this->url);

        if ($response->successful()) {
            foreach ($response->json() as $comment) {
                $this->service->create([
                    'name'    => $comment['name'],
                    'email'   => $comment['email'],
                    'post_id' => $comment['postId'],
                    'body'    => $comment['body'],
                ]);
            }

            $this->info('Comments synchronized successfully!');
        } else {
            $this->error('Failed to fetch comments from the API.');
        }
    }
}
