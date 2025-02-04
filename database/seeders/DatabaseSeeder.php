<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\AccessLevel;
use App\Models\ProductCategory;
use App\Models\ProductStatus;
use App\Models\Province;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $acess_levels = AccessLevel::count();
        if($acess_levels == 0){
            /* AccessLevel::factory(3)->create(); */
            AccessLevel::create(['access' => 'Administrador']);
            AccessLevel::create(['access' => 'Produtor']);
            AccessLevel::create(['access' => 'Comprador']);
        }

        $provinces = Province::count();
        if ($provinces == 0) {
            /* Province::factory(21)->create(); */
            Province::create(['name' => 'Bengo']);
            Province::create(['name' => 'Benguela']);
            Province::create(['name' => 'Bié']);
            Province::create(['name' => 'Cabinda']);
            Province::create(['name' => 'Cunene']);
            Province::create(['name' => 'Huambo']);
            Province::create(['name' => 'Huíla']);
            Province::create(['name' => 'Cuando']);
            Province::create(['name' => 'Cubango']);
            Province::create(['name' => 'Kwanza Norte']);
            Province::create(['name' => 'Kwanza Sul']);
            Province::create(['name' => 'Luanda']);
            Province::create(['name' => 'Lunda Norte']);
            Province::create(['name' => 'Lunda Sul']);
            Province::create(['name' => 'Malange']);
            Province::create(['name' => 'Moxico']);
            Province::create(['name' => 'Namibe']);
            Province::create(['name' => 'Uíge']);
            Province::create(['name' => 'Zaire']);
            Province::create(['name' => 'Moxico Leste']);
            Province::create(['name' => 'Icolo e Bengo']);
        }

        $users = User::count();
        if ($users == 0) {
            User::factory(1)->create();
        }

        $product_categories = ProductCategory::count();
        if ($product_categories == 0) {
            /* ProductCategory::factory(11)->create(); */
            ProductCategory::create(['name' => 'Grãos e Cereais']);
            ProductCategory::create(['name' => 'Frutas']);
            ProductCategory::create(['name' => 'Hortaliças e Vegetais']);
            ProductCategory::create(['name' => 'Leguminosas']);
            ProductCategory::create(['name' => 'Raízes e Tubérculos']);
            ProductCategory::create(['name' => 'Ervas e Temperos']);
            ProductCategory::create(['name' => 'Flores e Plantas Ornamentais']);
            ProductCategory::create(['name' => 'Produtos de Origem Animal']);
            ProductCategory::create(['name' => 'Sementes e Mudas']);
            ProductCategory::create(['name' => 'Insumos Agrícolas']);
            ProductCategory::create(['name' => 'Outro']);
        }

        $product_status = ProductStatus::count();
        if ($product_status == 0) {
            /* ProductStatus::factory(5)->create(); */
            ProductStatus::create(['status' => 'Disponível']);
            ProductStatus::create(['status' => 'Indisponível']);
            ProductStatus::create(['status' => 'Pendente']);
            ProductStatus::create(['status' => 'Inativo']);
            ProductStatus::create(['status' => 'Esgotado']);
        }

    }
}
