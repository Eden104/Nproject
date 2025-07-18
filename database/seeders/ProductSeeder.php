<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductCategory;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $phoneCat = ProductCategory::create([
            'name' => 'Téléphones',
            'slug' => 'telephones',
        ]);
        $accessoriesCat = ProductCategory::create([
            'name' => 'Accessoires',
            'slug' => 'accessoires',
        ]);

        
        Product::create([
            'name' => 'Smartphone XYZ',
            'slug' => 'smartphone-xyz',
            'description' => 'Un smartphone puissant avec écran OLED...',
            'image' => 'public/images/products/smartphone.webp',
            'price' => 499.99,
            'product_category_id' => $phoneCat->id,
        ]);

        Product::create([
            'name' => 'Écouteurs Sans Fil ABC',
            'slug' => 'ecouteurs-sans-fil-abc',
            'description' => 'Écouteurs bluetooth avec réduction de bruit...',
            'image' => 'public/images/products/ecouteur_bluetooth.webp',
            'price' => 79.99,
            'product_category_id' => $accessoriesCat->id,
        ]);
    }
}
