<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Attributes;
use App\Models\ProductsAttribute;

class UpdateAttributesActiveStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-attributes:update-active';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the active status of attributes based on associated products';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Fetch all attributes
        $attributes = Attributes::all();

        // Loop through each attribute
        foreach ($attributes as $attribute) {
            // Check if there are any products associated with this attribute
            $hasProducts = ProductsAttribute::where('attributes_id', $attribute->id)->exists();

            // Update the active field based on whether products exist or not
            $attribute->active = $hasProducts ? true : false;

            // Save the updated attribute
            $attribute->save();
        }
    }
}
