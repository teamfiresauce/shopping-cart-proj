<?php

class ShippingController {

	public $table = 'shipping';
	public $db;

	public function __construct($db) {
		$this->db = $db;
	}

	// GET ALL SHIPPING
	public function getAllShipping()
	{
		$result = $this->db->getAll($this->table);

		return $result;
	}

	// GET ALL SHIPPING
	public function getShippingById( $shipping )
	{
		$result = $this->db->getById($this->table, $shipping);

		return $result;
	}

	// CREATE SHIPPING
	public function createShipping($shipping)
	{
		$result = $this->db->create($this->table, $shipping);

		return $result;
	}

	// UPDATE SHIPPING
	public function updateShipping($shipping)
	{
		$id = $shipping['id'];
		unset($shipping['id']);
		$result = $this->db->update($this->table, $id, $shipping);

		return $result;
	}


	// DELETE SHIPPING
	public function deleteShipping($shipping)
	{
		$result = $this->db->delete($this->table, $shipping['id']);

		return $result;
	}
}