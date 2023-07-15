<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class SyncJSONPlaceholderCommand extends Command
{
    protected $signature = 'api:sync';

    protected $description = 'Sync data from JSONPlaceholder API';

    protected array $commands = [
        'Users'    => 'users:sync',
        'Posts'    => 'posts:sync',
        'Comments' => 'comments:sync',
    ];

    public function handle(): void
    {
        $this->output->progressStart(count($this->commands));

        foreach ($this->commands as $name => $command) {
            Artisan::call($command);

            $this->output->progressAdvance();
            $this->info(" {$name} synchronized successfully");
        }
    }
}
