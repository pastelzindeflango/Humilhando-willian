<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    public function run(): void
    {
        Plan::create([
            'name' => 'Basic',
            'description' => 'Acesso aos conteúdos básicos',
            'price' => 9.99,
        ]);

        Plan::create([
            'name' => 'Pro',
            'description' => 'Acesso completo, materiais extras e certificado',
            'price' => 29.99,
        ]);
    }
}
