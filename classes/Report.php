<?php 
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php'); 
 ?>
 <?php
 
  class Report{
  	private $database;
	private $formatm;
	public function __construct(){

		$this->database=new Database();
		$this->formatm=new Format();	
	}
	public function getMonthStatic($year){
      $query="SELECT date , SUM(price) as Year FROM cus_order WHERE date LIKE '%$year%' GROUP BY  date"; 
		$result=$this->database->select($query);
		
			return $result;
	}
	public function getYearStatic(){
     $query = "SELECT * FROM year"; 
	$result=$this->database->select($query);
		
			return $result;
	}
	public function getAllSaleStatic(){
		$query="SELECT productName , SUM(quantity) as number FROM cus_order GROUP BY  productName"; 
		$result=$this->database->select($query);
		
			return $result;
	}
	public function getOrderPrint($cusId){
		$query="SELECT co.*,us.* 
		FROM cus_order AS co,users AS us 
		WHERE co.userId=us.userId AND co.userId='$cusId'"; 
	   $result=$this->database->select($query);
		return $result;
	}
  } 
  ?>