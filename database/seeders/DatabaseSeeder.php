<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\Purchase;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            ItemSeeder::class
        ]);
        Customer::factory(100)->create();
        $items = \App\Models\Item::all();
        //Purchaseを登録時 中間テーブルにも同時に登録する (1件の購入情報に1件~3件の商品情報を登録とする)
        //each・・1件ずつ処理
        //attach・・中間テーブルに情報登録 外部キー以外で中間テーブルに情報追加するには第2引数に書く
        Purchase::factory(100)->create()
        ->each(function(Purchase $purchase) use ($items){
            $purchase->items()->attach(
                $items->random(rand(1,3))->pluck('id')->toArray(),
                // 1~3個のitemをpurchaseにランダムに紐づけ
                ['quantity' => rand(1, 5) ]
            );
        });
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
