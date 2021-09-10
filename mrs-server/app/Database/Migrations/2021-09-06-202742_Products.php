<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Products extends Migration
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
			'productName'       => [
				'type'       => 'VARCHAR',
				'constraint' => '60',
			],
			'stock'       => [
				'type'       => 'INT',
			],
			'imageUrl'       => [
				'type'       => 'TEXT',
			],
			'description' => [
				'type' => 'TEXT',
			],
			'price' => [
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
		$this->forge->createTable('products');
	}

	public function down()
	{
		$this->forge->dropTable('products');
	}
}
