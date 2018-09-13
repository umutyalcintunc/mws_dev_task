<?php

use Illuminate\Database\Seeder;

class ChoicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('choices')->insert([
            'body' => 'Plovdiv',
            'is_correct' => FALSE,
            'question_id' => 1,
        ]);

        DB::table('choices')->insert([
            'body' => 'Varna',
            'is_correct' => FALSE,
            'question_id' => 1,
        ]);

        DB::table('choices')->insert([
            'body' => 'Sofia',
            'is_correct' => TRUE,
            'question_id' => 1,
        ]);

        DB::table('choices')->insert([
            'body' => 'Velingrad',
            'is_correct' => FALSE,
            'question_id' => 1,
        ]);

        DB::table('choices')->insert([
            'body' => 'Boyko Borissov',
            'is_correct' => FALSE,
            'question_id' => 2,
        ]);

        DB::table('choices')->insert([
            'body' => 'Rumen Radev',
            'is_correct' => TRUE,
            'question_id' => 2,
        ]);

        DB::table('choices')->insert([
            'body' => 'Mark Zuckerberg',
            'is_correct' => FALSE,
            'question_id' => 2,
        ]);

        DB::table('choices')->insert([
            'body' => 'Spartacus',
            'is_correct' => FALSE,
            'question_id' => 2,
        ]);
    }
}
