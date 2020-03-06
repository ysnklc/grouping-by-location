<?php

use Illuminate\Database\Seeder;

class SubscriberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 50; $i++) {

            App\Subscriber::create([
                'first_name' => 'First Name ' . $i,
                'last_name'  => 'Last Name ' . $i,
                'mail'       => 'email_' . $i . '@test.com',
                'phone'      => 'phone_' . $i,
            ]);
        }
    }
}
