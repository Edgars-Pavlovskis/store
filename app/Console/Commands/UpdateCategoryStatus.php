<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Categories;
use App\Models\Products;

class UpdateCategoryStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-category-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the active status of categories based on product association and parent category activity.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Get all categories and initialize them as inactive first
        Categories::query()->update(['active' => false]);

        // Get all categories
        $categories = Categories::all();

        // Iterate through each category
        foreach ($categories as $category) {
            // Step 1: Check if any products have a parent equal to the category alias
            $hasProducts = Products::where('parent', $category->alias)->exists();

            if ($hasProducts) {
                // Mark the category and all its parents as active
                $this->activateCategoryAndParents($category);
            } else {
                // Step 2: Check if any active child categories exist
                $this->checkAndActivateCategory($category);
            }
        }
    }



    /**
     * Recursively activate the category and all of its parents.
     */
    private function activateCategoryAndParents($category)
    {
        // Mark the current category as active
        $category->active = true;
        $category->save();

        // Find the parent category, if it exists
        if ($category->parent_alias) {
            $parentCategory = Categories::where('alias', $category->parent_alias)->first();

            // Recursively activate the parent category
            if ($parentCategory && !$parentCategory->active) {
                $this->activateCategoryAndParents($parentCategory);
            }
        }
    }

    /**
     * Check if a category should be activated based on active child categories.
     */
    private function checkAndActivateCategory($category)
    {
        // Check if there are any child categories that are active
        $activeChildExists = Categories::where('parent_alias', $category->alias)
                                       ->where('active', true)
                                       ->exists();

        if ($activeChildExists) {
            // If an active child exists, mark the category and its parents as active
            $this->activateCategoryAndParents($category);
        }
    }


}
