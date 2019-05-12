<?php
namespace Framework\Core\Database;

use PDO;

/**
 * Database connection class
 */
class Connection
{
    /**
     * DB connection link
     */
	private $link;

    /**
     * store settings for default bases
     */
    private $default_tables = [];

    /**
     * Connection constructor.
     * @param $db_host
     * @param $db_name
     * @param $db_charset
     * @param $db_user
     * @param $db_password
     */
    public function __construct($db_host, $db_name, $db_charset, $db_user, $db_password){
        $this->loadingDefaultTables();
        $this->connect($db_host, $db_name, $db_charset, $db_user, $db_password);
    }

    private function loadingDefaultTables(){
        $default_tables = glob(__DIR__ . '\DefaultTables\*.php');
        if(!count($default_tables)) return;
        foreach ($default_tables as $table){
            array_push($this->default_tables, require_once $table);
        }
    }

    /**
     * DB connection
     * @param $db_host
     * @param $db_name
     * @param $db_charset
     * @param $db_user
     * @param $db_password
     * @return $this
     */
    private function connect($db_host, $db_name, $db_charset, $db_user, $db_password){

    	$db = 'mysql:host=' . $db_host . 
    		  ';dbname=' 	. $db_name .
    		  ';charset=' 	. $db_charset;

    	$this->link = new PDO($db, $db_user, $db_password);

    	$GLOBALS['pdo'] = $this->link;

    	return $this;
    }

    /**
     * Exequte sql query
     * @param string $sql
     * @return mixed
     */
    public function execute(string $sql){
    	$sql = $this->link->prepare($sql);
    	return $sql->execute();
    }

    /**
     * @param string $sql
     * @return mixed
     */
    public function query(string $sql){
    	$sql = $this->link->prepare($sql);
    	$sql->execute();
    	return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Checking for table exist
     */
    public function checkTables(){
        if(! count($this->default_tables) ) return;

        foreach ($this->default_tables as $table) {
            if( empty($this->query( 'SELECT 1 FROM ' . $table['name'] . ' LIMIT 1' )) ){
                $this->createTable($table['create']);
            }
        }
    }

    /**
     * @param $data
     */
    private function createTable($data){
        $this->execute($data['table']);

        foreach ($data['settings'] as $setting) {
            $this->execute($setting);
        }
    }
}