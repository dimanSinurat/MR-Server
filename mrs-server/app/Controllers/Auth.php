<?php

namespace App\Controllers;

use App\Models\AuthModel;
use CodeIgniter\RESTful\ResourceController;
use Firebase\JWT\JWT;


class Auth extends ResourceController
{
  
	public function __construct(){
		// $this->auth = new AuthModel();
    $this->validation = \Config\Services::validation();
	}

	/**
	 * Return an array of resource objects, themselves in array format
	 *
	 * @return mixed
	 */
	
	public function index()
	{

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

  public function login()
  {
    $data = $this->request->getPost();
    $validate = $this->validation->run($data, 'login');
		$errors = $this->validation->getErrors();
    if ($errors){
			return $this->fail($errors);
		}
    $authModel = new AuthModel();
    $user = $authModel->where('email',$this->request->getPost('email'))->first();

    if(!$user) return $this->failNotFound('Email not found');
    $verify = password_verify($this->request->getPost('password'),$user['password']);
    if(!$verify) return $this->fail('Password is wrong');

    // JWT CONFIG
    $key = getenv("TOKEN_SECRET");
    $payload = array(
        "iat" => 1356999524,
        "nbf" => 1357000000,
        "uid" => $user['id'],
        "email" => $user['email'],
    );
    $token = JWT::encode($payload, $key);
    return $this->respond($token);
  }
}
