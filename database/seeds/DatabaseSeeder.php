<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        // Create initial API key
        DB::connection('flarum')->table('api_keys')->insert([
            'id' => config('flarum.api_key'),
        ]);
    }
}
