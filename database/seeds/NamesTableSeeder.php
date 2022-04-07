<?php

use Illuminate\Database\Seeder;

class NamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i<= 100; $i++) {
            DB::table('names')->insert([
                'self' => 'test self' . $i,
                'title' => 'test title' . $i,
                'content' => 'test content' . $i
                ]);
        }
    }
}
