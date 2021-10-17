<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaundryListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laundry_lists', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('status')->default(0)->comment(' 0=Pending, 1 = ongoing,2= ready,3= claimed  ');
            $table->string('queue')->default(1);
            $table->string('total_amount');
            $table->string('pay_status');
            $table->string('amount_tendered');
            $table->string('amount_change');
            $table->string('remarks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laundry_lists');
    }
}
