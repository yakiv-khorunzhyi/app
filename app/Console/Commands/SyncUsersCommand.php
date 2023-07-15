<?php

namespace App\Console\Commands;

use App\Services\UserService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SyncUsersCommand extends Command
{
    protected $signature = 'users:sync';

    protected $description = 'Sync users from JSONPlaceholder API';

    protected string $url = 'https://jsonplaceholder.typicode.com/users';

    protected UserService $service;

    public function __construct(UserService $service)
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
                    'name'  => $post['name'],
                    'email' => $post['email'],
                ]);
            }

            $this->info('Users synchronized successfully!');
        } else {
            $this->error('Failed to fetch users from the API.');
        }
    }
}
