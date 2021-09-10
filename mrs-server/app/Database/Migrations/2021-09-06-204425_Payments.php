<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Payments extends Migration
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
			'transactionID'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'total' => [
				'type' => 'DOUBLE',
			],
			'paymentStruct' => [
				'type' => 'TEXT'
			],
			'accountBank' => [
				'type' => 'VARCHAR',
				'constraint' => '50',
			],
			'accountNumber' => [
				'type' => 'INT',
			],
			'accountOwner' => [
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
		$this->forge->createTable('payments');
	}

	public function down()
	{
		$this->forge->dropTable('payments');
	}
}
