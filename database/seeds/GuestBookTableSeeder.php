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
        $numberOfData = (int)config('constants.fakerData');
        factory(App\GuestMessage::class, $numberOfData)->create();
    }
}
