<?php

/**
 * Config
 * El objetivo de esta clase es obtener y almacenar valores de configuración
 * Uso típico:
 *    Config::set('database_user', 'blogdb');
 *    $user = Config::get('database_user');
*/

class Config {

	const CONFIG_FILE = 'config.json';
	private static $data = null;

	public static function get($key) {
		self::load();
		return self::$data[$key];
	}

	public static function set($key, $value) {
		self::load();
		self::$data[$key] = $value;
		self::store();
	}

	public static function remove($key) {
		self::load();
		unset(self::$data[$key]);
		self::store();
	}

	private static function store() {
		$json = json_encode(self::$data, JSON_PRETTY_PRINT);
		file_put_contents(self::CONFIG_FILE, $json);
	}

	private static function load() {
		if (null == self::$data) {
			$text = file_get_contents(self::CONFIG_FILE);
			self::$data = json_decode($text, true);
		}
	}

}
