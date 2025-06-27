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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price', 8, 2);
            $table->string('category');
            $table->string('image_url')->nullable();
            $table->boolean('is_available')->default(true);
            $table->timestamps();
        });

          $products = [
            [
                'name' => 'Classic Croissant',
                'description' => 'A traditional flaky butter croissant, perfect for breakfast.',
                'price' => 25000.00,
                'category' => 'Pastries',
                'image_url' => 'https://plus.unsplash.com/premium_photo-1690214491960-d447e38d0bd0?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8Y2FrZXxlbnwwfHwwfHx8MA%3D%3D', // Example URL
                'is_available' => true,
            ],
            [
                'name' => 'Chocolate Lava Cake',
                'description' => 'Rich chocolate cake with a molten chocolate center.',
                'price' => 45000.00,
                'category' => 'Cakes',
                'image_url' => 'https://images.unsplash.com/photo-1588195538326-c5b1e9f80a1b?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8Y2FrZXxlbnwwfHwwfHx8MA%3D%3D', // Example URL
                'is_available' => true,
            ],
            [
                'name' => 'Artisan Sourdough Bread',
                'description' => 'Handcrafted sourdough bread with a crispy crust and soft interior.',
                'price' => 55000.00,
                'category' => 'Breads',
                'image_url' => 'https://images.unsplash.com/photo-1571115177098-24ec42ed204d?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTJ8fGNha2V8ZW58MHx8MHx8fDA%3D', // Example URL
                'is_available' => true,
            ],
            [
                'name' => 'Blueberry Muffin',
                'description' => 'Soft and moist muffin loaded with fresh blueberries.',
                'price' => 20000.00,
                'category' => 'Muffins',
                'image_url' => 'https://images.unsplash.com/photo-1607958996333-41aef7caefaa?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8bXVmZmlufGVufDB8fDB8fHww', // Example URL
                'is_available' => true,
            ],
            [
                'name' => 'Red Velvet Cupcake',
                'description' => 'Velvety red cupcake with cream cheese frosting.',
                'price' => 30000.00,
                'category' => 'Cupcakes',
                'image_url' => 'https://images.unsplash.com/photo-1614707267537-b85aaf00c4b7?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8Q3VwY2FrZXxlbnwwfHwwfHx8MA%3D%3D', // Example URL
                'is_available' => true,
            ],
            [
                'name' => 'Almond Biscotti',
                'description' => 'Crunchy Italian almond biscuits, perfect with coffee.',
                'price' => 18000.00,
                'category' => 'Cookies',
                'image_url' => 'https://plus.unsplash.com/premium_photo-1670895801135-858a7d167ea4?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8Q29va2llc3xlbnwwfHwwfHx8MA%3D%3D', // Example URL
                'is_available' => true,
            ],
        ];

        foreach ($products as $productData) {
            Product::create($productData);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
