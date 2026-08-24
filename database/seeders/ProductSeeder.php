<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Alcapone Donut',
                'category' => 'Donut',
                'price' => 12000,
                'description' => 'Donut lembut dengan topping cokelat putih dan almond panggang yang menjadi salah satu menu favorit.',
                'image_url' => '1.jpg',
                'is_best_seller' => true,
            ],
            [
                'name' => 'Avocado Dicaprio',
                'category' => 'Donut',
                'price' => 13000,
                'description' => 'Donut premium dengan rasa avocado creamy dan sentuhan cokelat yang manis dan lembut.',
                'image_url' => '2.jpg',
                'is_best_seller' => true,
            ],
            [
                'name' => 'Tiramisu Donut',
                'category' => 'Donut',
                'price' => 13000,
                'description' => 'Perpaduan rasa tiramisu, cream lembut, dan tekstur donut yang cocok untuk pencinta dessert.',
                'image_url' => '3.jpg',
                'is_best_seller' => false,
            ],
            [
                'name' => 'Hot Americano',
                'category' => 'Coffee',
                'price' => 22000,
                'description' => 'Kopi hitam klasik dengan aroma kuat dan rasa bold untuk menemani hari Anda.',
                'image_url' => '4.jpg',
                'is_best_seller' => false,
            ],
            [
                'name' => 'Iced Latte',
                'category' => 'Coffee',
                'price' => 28000,
                'description' => 'Espresso premium dengan susu segar dan es yang memberikan rasa creamy dan menyegarkan.',
                'image_url' => '5.jpg',
                'is_best_seller' => true,
            ],
            [
                'name' => 'Cappuccino',
                'category' => 'Coffee',
                'price' => 27000,
                'description' => 'Kopi dengan foam susu lembut dan rasa seimbang antara espresso dan milk.',
                'image_url' => '6.jpg',
                'is_best_seller' => false,
            ],
            [
                'name' => 'Butter Croissant',
                'category' => 'Bakery',
                'price' => 25000,
                'description' => 'Roti croissant renyah di luar dan lembut di dalam dengan aroma butter yang khas.',
                'image_url' => '7.jpg',
                'is_best_seller' => false,
            ],
            [
                'name' => 'Chocolate Bread',
                'category' => 'Bakery',
                'price' => 18000,
                'description' => 'Roti lembut dengan isian cokelat manis yang cocok untuk camilan ringan.',
                'image_url' => '8.jpg',
                'is_best_seller' => false,
            ],
            [
                'name' => 'Chocolate Frappe',
                'category' => 'Beverage',
                'price' => 32000,
                'description' => 'Minuman cokelat dingin dengan tekstur creamy dan rasa manis yang menyenangkan.',
                'image_url' => '9.jpg',
                'is_best_seller' => true,
            ],
            [
                'name' => 'Matcha Latte',
                'category' => 'Beverage',
                'price' => 30000,
                'description' => 'Minuman matcha creamy dengan rasa lembut, manis, dan aroma green tea yang khas.',
                'image_url' => '10.jpg',
                'is_best_seller' => false,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}