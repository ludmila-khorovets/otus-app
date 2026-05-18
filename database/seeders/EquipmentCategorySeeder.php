<?php

namespace Database\Seeders;

use App\Models\EquipmentCategory;
use Illuminate\Database\Seeder;

class EquipmentCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Импульсный свет',
            'Постоянный свет',
            'Светомодификаторы (Насадки)',
            'Спецэффекты (Дым, ветер)',
            'Реквизит и мебель',
            'Камеры и объективы'
        ];

        foreach ($categories as $categoryName) {
            EquipmentCategory::create([
                'name' => $categoryName
            ]);
        }
    }
}
