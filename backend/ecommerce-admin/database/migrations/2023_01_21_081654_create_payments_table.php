<?php

use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Order::class,'order_id')->references('id')->on('orders');
            $table->decimal('amount',10,2);
            $table->string('status');
            $table->string('type');
            $table->timestamps();
            $table->foreignIdFor(User::class,'created_by')->nullable();
            $table->foreignIdFor(User::class,'updated_by')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
