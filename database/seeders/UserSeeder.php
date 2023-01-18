<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use SchemaHelper;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $data = $this->factory();

        $data_users = $data_roles = $data_profiles = [];
        foreach ($data as $i => $e) {
            // users
            $e['password'] = User::password();
            $e['uuid'] = User::uuid();
            array_push($data_users, $e);

            // user_roles
            array_push($data_roles, [
                'user_id' => $i + 1,
                'privilege_role_id' => $i + 1,
            ]);

            // user_profiles
            $names = explode(' ', $e['name']);
            $photos = ['etugbeh.png', 'momokha.jpg'];
            array_push($data_profiles, [
                'user_id' => $i + 1,
                'photo' => isset($photos[$i]) ? $photos[$i] : null,
                'surname' => $names[0],
                'first_name' => $names[1] ?? $names[0][0],
                'sex' => 'M',
                'email' => $e['email'],
            ]);
        }

        SchemaHelper::insertMultiple('users', $data_users);
        SchemaHelper::insertMultiple('user_roles', $data_roles);
        SchemaHelper::insertMultiple('user_profiles', $data_profiles);
    }

    public function factory(): array
    {
        $data = [
            [
                'auth' => 'STAFF',
                'name' => 'Webmaster T',
                'email' => 'webmaster@test.com',
                'email_verified_at' => now(),
                'email_subscribed_at' => now(),
                'password_changed_at' => now(),
            ],
            [
                'auth' => 'STAFF',
                // 'name' => 'Super Admin',
                // 'email' => 'super@test.com',
                'name' => 'Manny Omokha',
                'email' => 'momokha@biu.edu.ng',
                'email_verified_at' => now(),
            ],
            [
                'auth' => 'STAFF',
                'name' => 'Administrator',
                'email' => 'admin@test.com',
                'email_subscribed_at' => now(),
            ],
            [
                'auth' => 'STAFF',
                'name' => 'Academic Planning',
                'email' => 'academics@test.com',
            ],
            [
                'auth' => 'STAFF',
                'name' => 'Admission Officer',
                'email' => 'admission@test.com',
            ],
            [
                'auth' => 'APPLICANT',
                'name' => 'Dear Applicant',
                'email' => 'applicant@test.com',
            ],
        ];

        return $data;
    }
}
