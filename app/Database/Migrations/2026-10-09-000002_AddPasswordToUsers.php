<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPasswordToUsers extends Migration
{
    public function up()
    {
        if (! $this->db->fieldExists('password', 'users')) {
            $this->forge->addColumn('users', [
                'password' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                    'default' => '',
                    'after' => 'username',
                ],
            ]);
        }

        $this->db->table('users')
            ->groupStart()
            ->where('password', '')
            ->orWhere('password', null)
            ->groupEnd()
            ->update(['password' => password_hash('Pink1234', PASSWORD_DEFAULT)]);
    }

    public function down()
    {
        if ($this->db->fieldExists('password', 'users')) {
            $this->forge->dropColumn('users', 'password');
        }
    }
}
