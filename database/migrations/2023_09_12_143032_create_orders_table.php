<?php

use App\Models\Payment;
use App\Models\Status;
use App\Models\User;
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
            $table->date('date');
            $table->longText('customer_address');
            $table->boolean('is_pick_up')->default(false);
            $table->decimal('total_amount', 10, 2)->default(0);
            $table->foreignIdFor(User::class, 'customer_id');
            $table->foreignIdFor(Payment::class);
            $table->foreignIdFor(Status::class);
            $table->timestamps();
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
