<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Define the data for the admin user
        $data = [
            'email' => 'admin@example.com',
            // password_hash() creates a secure one-way hash of the password
            'password_hash' => password_hash('admin123*', PASSWORD_DEFAULT),
        ];

        // Using the query builder to insert the data
        $this->db->table('users')->insert($data);
    }
}
