<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert([
            'body' => 'What is the capital city of Bulgaria?',
        ]);

        DB::table('questions')->insert([
            'body' => 'Who is the president of Bulgaria?',
        ]);
    }
}
