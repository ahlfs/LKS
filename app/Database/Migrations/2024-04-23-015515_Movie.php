<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Movie extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_movie' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'synopsis' => [
                'type' => 'TEXT',
            ],
            'poster' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'trailer' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'genre' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'release_year' => [
                'type' => 'INT',
                'constraint' => 4,
            ],
            'runtime' => [
                'type' => 'INT',
                'constraint' => 10,
            ],
            'cast' => [
                'type' => 'TEXT',
            ],
            'age' => [
                'type' => 'INT',
                'constraint' => 10,
            ],

            

        ]);
        $this->forge->addKey('id_movie', true);
        $this->forge->createTable('movie');
    }

    public function down()
    {
        $this->forge->dropTable('movie');
    }
}
