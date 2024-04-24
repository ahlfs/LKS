<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Rating extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_rating' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_user' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'id_movie' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'message' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'rating' => [
                'type' => 'INT',
                'constraint' => 10,
            ],
            
        ]);
        $this->forge->addKey('id_rating', true);
        $this->forge->createTable('rating');
    }

    public function down()
    {
        $this->forge->dropTable('rating');
    }
}
