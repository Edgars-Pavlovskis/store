<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TurnOnBanners extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:turn-on-banners';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = Carbon::today();
        // Set active=1 for inactive banners where date_start is today
        DB::table('banners')
        ->where('active', 0)
        ->whereDate('date_start', $today)
        ->update(['active' => 1]);
    }
}
