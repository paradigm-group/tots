<?php

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
* Simple string encryption class
*/
class Encryption
{
	/**
     * encrytion method
     * @var string
     */
	private static $encrypt_method;

	/**
     * secret key
     * @var string
     */
    private static $secret_key;

    /**
     * secret iv
     * @var string
     */
    private static $secret_iv;

    function __construct($method, $key, $iv)
    {
        self::$encrypt_method = $method;
        self::$secret_key = $key;
        self::$secret_iv = $iv;
    }

    /**
     * Encrypts a string
     *
     * @param string $raw_string the string to encrypt
     *
     * @author Jonny Frodsham
     */
	public static function encryption($raw_string)
	{
		$encrypted_string = openssl_encrypt($raw_string, self::$encrypt_method, self::get_openssl_key(), 0, self::get_openssl_iv());
        return $encrypted_string = base64_encode($encrypted_string);
	}

	/**
     * Decrypts a string
     *
     * @param string $encrypted_string the string to decrypt
     *
     * @author Jonny Frodsham
     */
	public static function decryption($encrypted_string)
    {
        return openssl_decrypt(base64_decode($encrypted_string), self::$encrypt_method, self::get_openssl_key(), 0, self::get_openssl_iv());
    }

    /**
     * Returns a hashed open ssl key
     *
     * @author Jonny Frodsham
     */
    public static function get_openssl_key()
	{
		return hash('sha256', self::$secret_key);
	}

	/**
     * Returns a hashed open ssl iv
     *
     * @author Jonny Frodsham
     */
	public static function get_openssl_iv()
	{
		return substr(hash('sha256', self::$secret_iv), 0, 16);
	}

}
