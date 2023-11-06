<?php

namespace Database\Seeders;

use App\Models\ExpenseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ExpenseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Petty Cash', 'Vegetables'];

        foreach ($categories as $category) {
            ExpenseCategory::create(['name' => $category]);
        }
    }
}
