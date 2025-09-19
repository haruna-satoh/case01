<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => 1,
            'category_id' => 1,
            'condition' => '良好',
            'name' => '腕時計',
            'brand' => 'Rolax',
            'explain' => 'スタイリッシュなデザインのメンズ腕時計',
            'price' => 15000,
            'image' => 'Armani+Mens+Clock.jpg',
        ];
        DB::table('items')->insert($param);
        $param = [
            'user_id' => 2,
            'category_id' => 2,
            'condition' => '目立った傷や汚れなし',
            'name' => 'HDD',
            'brand' => '西芝',
            'explain' => '高速で信頼性の高いハードディスク',
            'price' => 5000,
            'image' => 'HDD+Hard+Disk.jpg',
        ];
        DB::table('items')->insert($param);
        $param = [
            'user_id' => 1,
            'category_id' => 10,
            'condition' => 'やや傷や汚れあり',
            'name' => '玉ねぎ3束',
            'brand' => 'なし',
            'explain' => '新鮮な玉ねぎ3束セット',
            'price' => 300,
            'image' => 'iLoveIMG+d.jpg',
        ];
        DB::table('items')->insert($param);
        $param = [
            'user_id' => 3,
            'category_id' => 5,
            'condition' => '状態が悪い',
            'name' => '革靴',
            'explain' => 'クラシックなデザインの革靴',
            'price' => 4000,
            'image' => 'Leather+Shoes+Product+Photo.jpg',
        ];
        DB::table('items')->insert($param);
        $param = [
            'user_id' => 4,
            'category_id' => 2,
            'condition' => '良好',
            'name' => 'ノートPC',
            'explain' =>'高性能なノートパソコン',
            'price' => 45000,
            'image' => 'Living+Room+Laptop.jpg',
        ];
        DB::table('items')->insert($param);
        $param = [
            'user_id' => 5,
            'category_id' => 2,
            'condition' => '目立った傷や汚れなし',
            'name' => 'マイク',
            'brand' => 'なし',
            'explain' => '高音質のレコーディング用マイク',
            'price' => 8000,
            'image' => 'Music+Mic+4632231.jpg',
        ];
        DB::table('items')->insert($param);
        $param = [
            'user_id' => 6,
            'category_id' => 4,
            'condition' => 'やや傷や汚れあり',
            'name' => 'ショルダーバッグ',
            'explain' => 'おしゃれなショルダーバッグ',
            'price' =>3500,
            'image' => 'Purse+fashion+pocket.jpg',
        ];
        DB::table('items')->insert($param);
        $param = [
            'user_id' => 7,
            'category_id' => 10,
            'condition' => '状態が悪い',
            'name' => 'タンブラー',
            'brand' => 'なし',
            'explain' => '使いやすいタンブラー',
            'price' => 500,
            'image' => 'Tumbler+souvenir.jpg',
        ];
        DB::table('items')->insert($param);
        $param = [
            'user_id' => 8,
            'category_id' => 10,
            'condition' => '良好',
            'name' => 'コーヒーミル',
            'brand' => 'Starbacks',
            'explain' => '手動のコーヒーミル',
            'price' => 4000,
            'image' => 'Waitress+with+Coffee+Grinder.jpg',
        ];
        DB::table('items')->insert($param);
        $param = [
            'user_id' => 9,
            'category_id' => 4,
            'condition' => '目立った傷や汚れなし',
            'name' => 'メイクセット',
            'explain' => '便利なメイクアップセット',
            'price' => 2500,
            'image' => '外出メイクアップセット.jpg',
        ];
        DB::table('items')->insert($param);
    }
}
