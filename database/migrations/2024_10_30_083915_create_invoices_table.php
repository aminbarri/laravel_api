<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Customer;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id'); // Ensure this is the correct foreign key
            $table->integer('amount');
            $table->string('status');
            $table->dateTime('billed_date');
            $table->dateTime('paid_date')->nullable();
            
            $table->timestamps();
        
            // Define foreign key constraint
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
