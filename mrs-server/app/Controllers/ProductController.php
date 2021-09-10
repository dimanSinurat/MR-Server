<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\I18n\Time;
use Firebase\JWT\JWT;
use CodeIgniter\API\ResponseTrait;

class ProductController extends ResourceController
{
	protected $modelName = 'App\Models\ProductModel';
	protected $format = 'json';
	public $time;
	protected $key;
	protected $token;
	use ResponseTrait;

	public function __construct()
	{
		$this->validation = \Config\Services::validation();
		$this->time = Time::now('Asia/Jakarta', 'id_ID');
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

		// CHECK JWT TOKEN
		$key = getenv('TOKEN_SECRET');
		$header = $this->request->getServer('HTTP_AUTHORIZATION');
		if (!$header) return $this->failUnauthorized('Token Required');
		$token = explode(' ', $header)[1];
		try {
			$decode = JWT::decode($token, $key, ['HS256']);
			$data = $this->request->getPost();
			$validate = $this->validation->run($data, 'addProduct');
			$errors = $this->validation->getErrors();

			if ($errors) {
				return $this->fail($errors);
			}

			$product = new \App\Entities\ProductEntities();
			$product->id = uniqid() . $this->time->getTimestamp();
			$product->fill($data);
			$product->created_at = date('Y-m-d H:i:s');

			if ($this->model->save($product)) {
				return $this->respondCreated($product, "Created product has been successfully");
			}
		} catch (\Throwable $err) {
			return $this->fail('invalid token');
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

		// CHECK JWT TOKEN
		$key = getenv('TOKEN_SECRET');
		$header = $this->request->getServer('HTTP_AUTHORIZATION');
		if (!$header) return $this->failUnauthorized('Token Required');
		$token = explode(' ', $header)[1];

		try {
			$decode = JWT::decode($token, $key, ['HS256']);
			$data = $this->request->getRawInput();
			$data['id'] = $id;
			$validate = $this->validation->run($data, 'updateProduct');
			$errors = $this->validation->getErrors();

			if ($errors) {
				return $this->fail($errors);
			}

			if (!$this->model->findById($id)) {
				return $this->fail('id tidak ditemukan');
			}


			$product = new \App\Entities\ProductEntities();
			$product->id = uniqid() . $this->time->getTimestamp();
			$product->fill($data);
			$product->updated_at = date('Y-m-d H:i:s');

			if ($this->model->save($product)) {
				return $this->respondUpdated($product, "Created product has been successfully");
			}
		} catch (\Throwable $err) {
			return $this->fail('invalid token');
		}
	}

	/**
	 * Delete the designated resource object from the model
	 *
	 * @return mixed
	 */

	public function delete($id = null)

	{
		// CHECK JWT TOKEN
		$key = getenv('TOKEN_SECRET');
		$header = $this->request->getServer('HTTP_AUTHORIZATION');
		if (!$header) return $this->failUnauthorized('Token Required');
		$token = explode(' ', $header)[1];

		try {
			$decode = JWT::decode($token, $key, ['HS256']);
			if (!$this->model->findById($id)) {
				return $this->fail('id tidak ditemukan');
			}
	
			if ($this->model->delete($id)) {
				return $this->respondDeleted(['id' => $id . ' Deleted']);
			}
			
		} catch (\Throwable $err) {
			return $this->fail('invalid token');
		}


		
	}

	public function show($id = null)
	{
		$data =  $this->model->findById($id);

		if ($data) {
			return $this->respond($data);
		}

		return $this->fail('bad request');
	}
}
