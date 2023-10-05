<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained()->onDelete('cascade');
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');
            $table->dateTime('check_in');
            $table->dateTime('check_out')->nullable();            
            $table->decimal('bill_amount', 10, 2)->nullable();
            $table->decimal('package_amount', 10, 2)->nullable();
            $table->string('advance_type')->nullable();
            $table->decimal('advance_payment', 10, 2)->nullable();
            $table->integer('number_of_people')->nullable();
            $table->string('status')->defalut('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
