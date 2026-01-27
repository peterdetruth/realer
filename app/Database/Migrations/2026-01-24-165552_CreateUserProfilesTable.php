<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserProfilesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
            ],
            'first_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'middle_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'last_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'date_of_birth' => [
                'type' => 'DATE',
            ],
            'gender' => [
                'type'       => 'ENUM',
                'constraint' => ['male', 'female'],
            ],
            'phone' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
            ],
            'country' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'default'    => 'Kenya',
            ],
            'document_type' => [
                'type'       => 'ENUM',
                'constraint' => ['id', 'passport'],
            ],
            'document_number' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'home_county_id' => [
                'type'     => 'INT',
                'unsigned' => true,
            ],
            'home_constituency_id' => [
                'type'     => 'INT',
                'unsigned' => true,
            ],
            'home_ward_id' => [
                'type'     => 'INT',
                'unsigned' => true,
            ],
            'is_pwd' => [
                'type'       => 'ENUM',
                'constraint' => ['yes', 'no'],
                'default'    => 'no',
            ],
            'disability_type' => [
                'type'       => 'ENUM',
                'constraint' => ['physical', 'visual', 'hearing', 'memory', 'other'],
                'null'       => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('home_county_id', 'counties', 'id');
        $this->forge->addForeignKey('home_constituency_id', 'constituencies', 'id');
        $this->forge->addForeignKey('home_ward_id', 'wards', 'id');

        $this->forge->createTable('user_profiles');
    }

    public function down()
    {
        $this->forge->dropTable('user_profiles');
    }
}
