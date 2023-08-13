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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->dateTime("order_date")->nullable(false);
            $table->integer("order_status")->nullable(false);
            $table->string("shipping_address")->nullable(false);
            $table->float("total_amount")->nullable(false);
            $table->string("notes")->nullable();
            $table->timestamps();

            $table->foreignId("customer_id")->constrained()->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
