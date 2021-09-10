<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
class UserController extends ResourceController
{
	protected $modelName = 'App\Models\UsersModel';
	protected $format = 'json';

	public function __construct(){
		$this->validation = \Config\Services::validation();
	}

	/**
	 * Return an array of resource objects, themselves in array format
	 *
	 * @return mixed
	 */
	
	public function index()
	{
	  return $this->respond($this->model->findAll());	
	}

	/**
	 * Return the properties of a resource object
	 *
	 * @return mixed
	 */
	public function show($id = null)
	{
		//
	}

	/**
	 * Return a new resource object, with default properties
	 *
	 * @return mixed
	 */
	public function new()
	{
		//
	}

	/**
	 * Create a new resource object, from "posted" parameters
	 *
	 * @return mixed
	 */
	public function create()
	{
		$data = $this->request->getPost();
		$validate = $this->validation->run($data, 'register');
		$errors = $this->validation->getErrors();

		if ($errors){
			return $this->fail($errors);
		}

		$user = new \App\Entities\UsersEntities();
		$user->fill($data);
		$user->created_at = date('Y-m-d H:i:s');

		if($this->model->save($user))
		{
			return $this->respondCreated($user,"Created user has been successfully");
		}

	}

	/**
	 * Return the editable properties of a resource object
	 *
	 * @return mixed
	 */
	public function edit($id = null)
	{
		//
	}

	/**
	 * Add or update a model resource, from "posted" properties
	 *
	 * @return mixed
	 */
	public function update($id = null)
	{
		//
	}

	/**
	 * Delete the designated resource object from the model
	 *
	 * @return mixed
	 */
	public function delete($id = null)
	{
		//
	}
}
