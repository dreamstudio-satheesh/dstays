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
            $table->decimal('tarrif_per_day', 10, 2)->nullable();
            $table->decimal('total_tarrif', 10, 2)->nullable(); 
            $table->string('advance_type')->nullable();
            $table->string('group_type')->nullable();
            $table->decimal('advance_payment', 10, 2)->nullable();
            $table->integer('number_of_adults')->nullable();
            $table->integer('number_of_kids')->nullable();
            $table->decimal('gst', 10, 2)->nullable();            
            $table->enum('booking_type', ['Rent', 'Package']); 
            $table->string('booking_status')->defalut('confirmed');
            $table->text('remarks')->nullable(); 
            $table->timestamps();
            
        });

        DB::statement("ALTER TABLE bookings AUTO_INCREMENT = 1001;");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
