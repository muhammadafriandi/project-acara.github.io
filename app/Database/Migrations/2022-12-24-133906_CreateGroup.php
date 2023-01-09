<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateGroup extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_group' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name_group' => [
                'type'       => 'VARCHAR',
                'constraint' => '60',
            ],
            'info_group' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'update_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'delete_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_user', true);
        $this->forge->createTable('groups');
    }

    public function down()
    {
        $this->forge->dropTable('groups');
    }
}
