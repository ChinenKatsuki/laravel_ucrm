<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id(); 
            //foreignId,constrained,onUpdate　purchasesテーブルにcustomer_idを登録でき、
            //かつcustomersテーブルに存在しているidしか登録できない外部キー制約も設定されている状態
            //また、customersが更新された際に、customerに紐づくpurchasesも一緒に更新される
            $table->foreignId('customer_id')->constrained()->onUpdate('cascade');
            $table->boolean('status');
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
        Schema::dropIfExists('purchases');
    }
};
