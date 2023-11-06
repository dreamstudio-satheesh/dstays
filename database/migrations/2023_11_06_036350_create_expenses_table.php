<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('description')->nullable(); // Description of the expense
            $table->decimal('amount', 8, 2); // Amount of the expense with 8 digits in total and 2 after the decimal point
            $table->unsignedBigInteger('category_id')->nullable(); // relation to an expense_categories table
            $table->date('expense_date'); // Date of the expense
            $table->unsignedBigInteger('user_id'); // relation to a users table
            $table->unsignedBigInteger('property_id')->nullable();
            $table->timestamps(); // created_at and updated_at timestamps

            // Foreign key constraint
            $table
                ->foreign('category_id')
                ->references('id')
                ->on('expense_categories')
                ->onDelete('set null');
            $table
                ->foreign('property_id')
                ->references('id')
                ->on('properties')
                ->onDelete('set null');

            // Foreign key constraint (if you have a users table and want to relate expenses to users)
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
