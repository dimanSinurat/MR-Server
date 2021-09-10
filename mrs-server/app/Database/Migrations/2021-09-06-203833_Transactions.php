<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transactions extends Migration
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
			'orderID' => [
				'type' => 'INT',
			],
			'status' => [
				'type' => 'VARCHAR',
				'constraint' => '50',
			],
			'confirmBy' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'created_at' => [
				'type' => 'DATETIME',
			],
			'updated_at' => [
				'type' => 'DATETIME',
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('transactions');
	}

	public function down()
	{
		$this->forge->dropTable('transactions');
	}
}
