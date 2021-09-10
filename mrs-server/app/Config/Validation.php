<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
	public $register = [
		'username' => [
			'rules' => 'required'
		],
		'email' => [
			'rules' => 'required|is_unique[users.email]'
		],
		'password' => [
			'rules' => 'required'
		],
		'role' => [
			'rules' => 'required'
		],
		'address' => [
			'rules' => 'required'
		],
	];

	public $addProduct = [
		'productName' => [
			'rules' => 'required|is_unique[users.email]'
		],
		'stock' => [
			'rules' => 'required'
		],
		'imageUrl' => [
			'rules' => 'required'
		],
		'description' => [
			'rules' => 'required'
		],
		'price' => [
			'rules' => 'required'
		],
	];

	public $updateProduct = [
		'productName' => [
			'rules' => 'required'
		],
		'stock' => [
			'rules' => 'required'
		],
		'imageUrl' => [
			'rules' => 'required'
		],
		'description' => [
			'rules' => 'required'
		],
		'price' => [
			'rules' => 'required'
		],
	];

	public $login = [
		'email' => [
			'rules' => 'required'
		],
		'password' => [
			'rules' => 'required'
		],
	];
}
