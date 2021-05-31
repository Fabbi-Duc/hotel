<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableServiceServiceVoucherHousewareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_voucher_coupon_houseware', function (Blueprint $table) {
            $table->id();
            $table->integer('enter_coupon_houseware_id');
            $table->integer('houseware_id');
            $table->integer('quantity');
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
        Schema::dropIfExists('service_voucher_coupon_houseware');
    }
}
