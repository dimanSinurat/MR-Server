<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'            => 'VARCHAR',
				'constraint'     => 255,
				'unsigned'       => false,
				'auto_increment' => false,
			],
			'username'       => [
				'type'       => 'VARCHAR',
				'constraint' => '50',
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => '70',
			],
			'password' => [
				'type' => 'TEXT'
			],
			'address' => [
				'type' => 'TEXT',
			],
			'role' => [
				'type' => 'VARCHAR',
				'constraint' => '12',
			],
			'created_at' => [
				'type' => 'DATETIME',
			],
			'updated_at' => [
				'type' => 'DATETIME',
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('users');
	}

	public function down()
	{
		$this->forge->dropTable('users');
	}
}
