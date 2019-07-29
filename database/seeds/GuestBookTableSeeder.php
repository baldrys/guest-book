<?php

use Illuminate\Database\Seeder;

class GuestBookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\GuestMessage::class, 5)->create();
    }
}
