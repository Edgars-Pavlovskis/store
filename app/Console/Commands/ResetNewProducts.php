<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Products;
use Carbon\Carbon;

class ResetNewProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:reset-new-products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset products status NEW for products older than 3 weeks';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $twoWeeksAgo = Carbon::now()->subWeeks(3);

        Products::where('created_at', '<', $twoWeeksAgo)
            ->where('new', 1)
            ->update(['new' => 0]);
    }
}
