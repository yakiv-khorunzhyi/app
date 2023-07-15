<?php

namespace App\Console\Commands;

use App\Services\PostService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SyncPostsCommand extends Command
{
    protected $signature = 'posts:sync';

    protected $description = 'Sync posts from JSONPlaceholder API';

    protected string $url = 'https://jsonplaceholder.typicode.com/posts';

    protected PostService $service;

    public function __construct(PostService $service)
    {
        parent::__construct();
        $this->service = $service;
    }

    public function handle(): void
    {
        $response = Http::get($this->url);

        if ($response->successful()) {
            foreach ($response->json() as $post) {
                $this->service->create([
                    'title'   => $post['title'],
                    'body'    => $post['body'],
                    'user_id' => $post['userId'],
                ]);
            }

            $this->info('Posts synchronized successfully!');
        } else {
            $this->error('Failed to fetch posts from the API.');
        }
    }
}
