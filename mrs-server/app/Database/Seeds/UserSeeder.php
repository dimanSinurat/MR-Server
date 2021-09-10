<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UserSeeder extends Seeder
{
        public function run()
        {
                $time = Time::now('Asia/Jakarta', 'id_ID');
                $data = [
                  [
                    'id' => uniqid().$time->getTimestamp(),
                    'username'    => 'yadiman aprianto',
                    'email' => 'yadiman@gmail.com',
                    'password' => password_hash('admin', PASSWORD_BCRYPT),
                    'address' => 'Jatiwaringin, Pondok Gede Bekasi',
                    'role' => 'customer',
                    'created_at' => Time::now('Asia/Jakarta', 'id_ID'),
                    'updated_at' => Time::now('Asia/Jakarta', 'id_ID'),
                  ],
                  [
                    'id' => uniqid().$time->getTimestamp(),
                    'username'    => 'Henry yeriko',
                    'email' => 'henryn@gmail.com',
                    'password' => password_hash('admin', PASSWORD_BCRYPT),
                    'address' => 'Pamulang, Tangerang Selatan',
                    'role' => 'admin',
                    'created_at' => Time::now('Asia/Jakarta', 'id_ID'),
                    'updated_at' => Time::now('Asia/Jakarta', 'id_ID'),
                  ],
                ];

              

                $this->db->table('users')->insertBatch($data);
        }
}