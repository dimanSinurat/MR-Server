<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Orders extends Migration
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
			'userID'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'status' => [
				'type' => 'VARCHAR',
				'constraint' => '10'
			],
			'grandTotal' => [
				'type' => 'DOUBLE'
			],
			'created_at' => [
				'type' => 'DATETIME',
			],
			'updated_at' => [
				'type' => 'DATETIME',
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('orders');
	}

	public function down()
	{
		$this->forge->dropTable('orders');
	}
}
