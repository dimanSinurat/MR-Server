<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'users';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = false;
	protected $insertID             = 0;
	protected $returnType           = 'App\Entities\UsersEntities';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['id', 'username', 'email', 'password', 'address', 'role', 'created_at', 'updated_at'];

	// Dates
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';

	// Validation
	protected $validationRules      = [
		'username'     => 'required',
		'email'        => 'required|valid_email|is_unique[users.email]',
		'password'     => 'required',
		'address'			 => 'required',
		'role'			   => 'required'
	];
	protected $validationMessages   = [
		'email'        => [
			'is_unique' => 'Sorry. That email has already been taken. Please choose another.'
		]
	];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = [];
	protected $afterInsert          = [];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];
}
