<?php

class Db
{
	private static $conn;

	public static function getInstance(){
		if( is_null( self::$conn ) ){
			self::$conn = new PDO("mysql:host=localhost; dbname=IMD", "root", "root");
		}
		return self::$conn;
	}
}

?>