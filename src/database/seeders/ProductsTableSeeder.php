<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;


class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userIds = DB::table('users')->pluck('id');

        $products = [
            [
                'user_id' => $userIds->random(),
                'category_id' => ['1', '12', '5'],
                'name' => '腕時計',
                'brand' => 'テストブランド',
                'content' => 'スタイリッシュなデザインのメンズ腕時計',
                'condition' => '良好',
                'price' => '15000',
                'image' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Armani+Mens+Clock.jpg',
                'sold_out' => false,
            ],
            [
                'user_id' => $userIds->random(),
                'category_id' => '2',
                'name' => 'HDD',
                'brand' => 'テストブランド',
                'content' => '高速で信頼性の高いハードデ ィスク',
                'condition' => '目立った傷や汚れなし',
                'price' => '5000',
                'image' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/HDD+Hard+Disk.jpg',
                'sold_out' => false,
            ],
            [
                'user_id' => $userIds->random(),
                'category_id' => '10',
                'name' => '玉ねぎ3束',
                'brand' => 'テストブランド',
                'content' => '新鮮な玉ねぎ3束のセット',
                'condition' => 'やや傷や汚れあり',
                'price' => '300',
                'image' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/iLoveIMG+d.jpg',
                'sold_out' => false,
            ],
            [
                'user_id' => $userIds->random(),
                'category_id' => ['1', '5'],
                'name' => '革靴',
                'brand' => 'テストブランド',
                'content' => 'クラシックなデザインの革靴',
                'condition' => '状態が悪い',
                'price' => '4000',
                'image' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Leather+Shoes+Product+Photo.jpg',
                'sold_out' => false,
            ],
            [
                'user_id' => $userIds->random(),
                'category_id' => '2',
                'name' => 'ノートPC',
                'brand' => 'テストブランド',
                'content' => '高性能なノートパソコン',
                'condition' => '良好',
                'price' => '45000',
                'image' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Living+Room+Laptop.jpg',
                'sold_out' => false,
            ],
            [
                'user_id' => $userIds->random(),
                'category_id' => '13',
                'name' => 'マイク',
                'brand' => 'テストブランド',
                'content' => '高音質のレコーディング用マイク',
                'condition' => '目立った傷や汚れなし',
                'price' => '8000',
                'image' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Music+Mic+4632231.jpg',
                'sold_out' => false,
            ],
            [
                'user_id' => $userIds->random(),
                'category_id' => ['1', '4'],
                'name' => 'ショルダーバッグ',
                'brand' => 'テストブランド',
                'content' => 'おしゃれなショルダーバッグ',
                'condition' => 'やや傷や汚れあり',
                'price' => '3500',
                'image' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Purse+fashion+pocket.jpg',
                'sold_out' => false,
            ],
            [
                'user_id' => $userIds->random(),
                'category_id' => '10',
                'name' => 'タンブラー',
                'brand' => 'テストブランド',
                'content' => '使いやすいタンブラー',
                'condition' => '状態が悪い',
                'price' => '500',
                'image' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Tumbler+souvenir.jpg',
                'sold_out' => false,
            ],
            [
                'user_id' => $userIds->random(),
                'category_id' => '10',
                'name' => 'コーヒーミル',
                'brand' => 'テストブランド',
                'content' => '手動のコーヒーミル',
                'condition' => '良好',
                'price' => '4000',
                'image' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Waitress+with+Coffee+Grinder.jpg',
                'sold_out' => false,
            ],
            [
                'user_id' => $userIds->random(),
                'category_id' => '6',
                'name' => 'メイクセット',
                'brand' => 'テストブランド',
                'content' => '便利なメイクアップセット',
                'condition' => '目立った傷や汚れなし',
                'price' => '2500',
                'image' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/%E5%A4%96%E5%87%BA%E3%83%A1%E3%82%A4%E3%82%AF%E3%82%A2%E3%83%83%E3%83%95%E3%82%9A%E3%82%BB%E3%83%83%E3%83%88.jpg',
                'sold_out' => false,
            ],
        ];

        foreach ($products as $productData) {
            $productId = DB::table('products')->insertGetId([
                'user_id' => $productData['user_id'],
                'category_id' => is_array($productData['category_id']) ? $productData['category_id'][0] : $productData['category_id'],
                'name' => $productData['name'],
                'brand' => $productData['brand'],
                'content' => $productData['content'],
                'condition' => $productData['condition'],
                'price' => $productData['price'],
                'image' => $productData['image'],
                'sold_out' => $productData['sold_out'],
            ]);

            $categoryIds = (array) $productData['category_id'];
            foreach ($categoryIds as $categoryId) {
                DB::table('category_product')->insert([
                    'product_id' => $productId,
                    'category_id' => $categoryId,
                ]);
            }
        }
    }
}