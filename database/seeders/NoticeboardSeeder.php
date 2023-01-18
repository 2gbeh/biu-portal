<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use SchemaHelper;

class NoticeboardSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'user_id' => 1,
            'subject' => 'Welcome to BIU Portal',
            'message' => 'Thank you for activating your BIU Portal account. Kindly visit <b>`My Profile`</b> page to update your account bio and password immediately.',
            'recipients' => null,
        ];

        SchemaHelper::insert('noticeboard', $data);
    }
}
