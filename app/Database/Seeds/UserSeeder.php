<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        // insert 1 data
        $data = [
            'name_user' => 'Afriandi',
            'email_user' => 'afriandi@gmail.com',
            'password_user' => password_hash('12345', PASSWORD_BCRYPT),
        ];
        $this->db->table('users')->insert($data);

        // insert banyak data
        $data = [
            [
                'name_user' => 'Afri',
                'email_user' => 'afri@gmail.com',
                'password_user' => password_hash('12345', PASSWORD_BCRYPT),
            ],
            [
                'name_user' => 'Andi',
                'email_user' => 'andi@gmail.com',
                'password_user' => password_hash('12345', PASSWORD_BCRYPT),
            ],
        ];
        $this->db->table('users')->insertBatch($data);
    }
}
