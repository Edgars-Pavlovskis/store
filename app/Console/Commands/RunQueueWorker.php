<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RunQueueWorker extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:run-queue-worker';
    //php artisan app:run-queue-worker
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run the queue worker for a short time';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->call('queue:work', [
            '--timeout' => 60, // Maximum time for each job in seconds
            '--stop-when-empty' => true, // Stop when there are no more jobs
        ]);

        return 0;
    }
}
