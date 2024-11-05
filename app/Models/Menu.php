<?php
namespace App\Models;

use CodeIgniter\Model;

class Menu extends Model
{
	function  __construct(){
        parent::__construct();
        
        $session = \Config\Services::session();
        $uri = new \CodeIgniter\HTTP\URI();
        helper('form');
        helper('cookie');
        $email = \Config\Services::email();
    }
	public function dropdown(){
		$this->db = \Config\Database::connect();
		$this->db->select('*,sms_company.name');
		$this->db->from('sms_product');
		$this->db->join('sms_company','sms_company.id=sms_product.company_name','inner');
		$query = $this->db->get();
		return $query->result();
	}
	public function menu_all(){
		$this->db = \Config\Database::connect();
		$this->db->select('*');
		$this->db->from('sms_company');
		$query = $this->db->get();
		return $query->result();

	}
}