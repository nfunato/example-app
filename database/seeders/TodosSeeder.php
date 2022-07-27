<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Str;
use App\Models\Todo;

class TodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        DB::table('todos')->insert([
            'task' => Str::random(30),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        */
        Todo::factory()->count(10)->create();
    }
}
