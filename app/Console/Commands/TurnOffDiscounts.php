<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Discount;
use App\Models\Products;

class TurnOffDiscounts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:turn-off-discounts';

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

        $discounts = Discount::where('type', 'category-discount')
            ->where('active', 1)
            ->whereDate('date_end', $today)
            ->get();


        foreach ($discounts as $discount) {
            $params = $discount->params;

            if (!isset($params['category'], $params['discount'])) {
                continue;
            }

            $categories = $params['category'];

            Products::whereIn('parent', $categories)
                ->update(['discount' => 0]);
        }

    }
}
