<?php

/**
 * Database
 * El objetivo de esta clase es abstraer la conexión de la base de datos, lo que tiene
 * algunas ventajas como despreocuparnos de las credenciales de acceso.
 *
 * Uso típico:
 *     $rows = Database::query("SELECT * FROM `mi_tabla`");
*/

require_once('class/Config.class.php');

class Database {

	private static $connection = null;
	private static $n = 0;

	public static function query($sql) {
		self::connect();
		self::$n++;
		$result =  mysql_query($sql);
		if (mysql_errno()) {
			echo mysql_error();
		}
		return $result;
	}

	public static function getN() {
		return self::$n;
	}

	public static function connect() {
		if (null == self::$connection) {
			self::$connection = mysql_connect(
				Config::get('database_host'),
				Config::get('database_user'),
				Config::get('database_pass')
			);
			mysql_select_db(Config::get('database_name'));
			mysql_query("SET NAMES 'utf8'");
		}
	}
	
}
