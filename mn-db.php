<?php
/**
 * This file contains MySQL database abstraction class
 *
 * This file does NOT contain database authorization configurations. 
 * Configuration for MySQL databse is in mn-config.php
 *
 * @package  menu
 * @author  horvo
 */

class mndb{
	/** Query counter */
	public $num_queries = 0;

	/** Last query made */
	var $last_query;

	/** Result fo last query made */
	var $last_result;

	/** MySQL result */
	protected $result;

	/** Saved query history */
	var $queries;

	/** Database username */
	protected $dbuser;

	/** Database password */
	protected $dbpassword;

	/** Database host */
	protected $dbhost;

	/** Database handle */
	protected $dbh;

	/**
	 * Constructor of the class.
	 * 
	 * @param string $dbuser     MySQL database user
	 * @param string $dbpassword MySQL database password
	 * @param string $dbname     MySQL database name
	 * @param string $dbhost     MySQL database host 
	 */
	
	public function __construct( $dbuser, $dbpassword, $dbname, $dbhost){
		register_shutdown_function( array($this, '__destruct') );

		$this->dbuser = $dbuser;
		$this->dbpassword = $dbpassword;
		$this->dbname = $dbname;
		$this->dbhost = $dbhost;

		$this->db_connect();
	}
}
?>