<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailOrder extends Migration
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
			'orderID'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'productID' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'qty' => [
				'type' => 'INT',
			],
			'created_at' => [
				'type' => 'DATETIME',
			],
			'updated_at' => [
				'type' => 'DATETIME',
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('detailOrders');
	}

	public function down()
	{
		$this->forge->dropTable('detailOrders');
	}
}
