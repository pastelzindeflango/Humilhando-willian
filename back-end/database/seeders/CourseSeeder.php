<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Plan;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $basic = Plan::where('name', 'Basic')->first();
        $pro = Plan::where('name', 'Pro')->first();

        if ($basic) {
            Course::create([
                'plan_id' => $basic->id,
                'title' => 'Introdução ao Projeto',
                'description' => 'Conceitos básicos e primeiros passos',
                'duration_minutes' => 30,
            ]);

            Course::create([
                'plan_id' => $basic->id,
                'title' => 'Boas práticas',
                'description' => 'Boas práticas iniciais para desenvolvimento',
                'duration_minutes' => 45,
            ]);
        }

        if ($pro) {
            Course::create([
                'plan_id' => $pro->id,
                'title' => 'Arquitetura Avançada',
                'description' => 'Padrões e arquitetura para projetos maiores',
                'duration_minutes' => 120,
            ]);

            Course::create([
                'plan_id' => $pro->id,
                'title' => 'Deploy e Monitoramento',
                'description' => 'Como colocar seu sistema em produção e monitorar',
                'duration_minutes' => 90,
            ]);
        }
    }
}
