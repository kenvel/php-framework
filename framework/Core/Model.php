<?php


namespace Framework\Core;

/**
 * Class Model
 * @package Framework\Core
 */
abstract class Model
{
    /**
     * @var \Envms\FluentPDO\Query
     */
    public $db;
    /**
     * @var
     */
    protected $table;

    /**
     * Model constructor.
     */
    public function __construct(){
        //$this->db = $GLOBALS['di']->get('db');
        $this->db = new \Envms\FluentPDO\Query($GLOBALS['pdo']);
    }

    /**
     * @return mixed
     */
    public function table(){
        return $this->table;
    }

    /**
     * @return \Envms\FluentPDO\Queries\Select
     * @throws \Envms\FluentPDO\Exception
     */
    public function all(){
        return $this->select('id >?', '0');
    }

    /**
     * @param $key
     * @param $value
     * @return \Envms\FluentPDO\Queries\Select
     * @throws \Envms\FluentPDO\Exception
     */
    public function select($key, $value){
        $result = [];
        $res = $this->db->from($this->table)->where($key, $value);
        foreach ( $res as $re ) {
            array_push($result, $re);
        }
        return $result;
    }

    /**
     * @param array $values
     * @return bool|int
     * @throws \Envms\FluentPDO\Exception
     */
    public function insert(array $values){
        return $this->db->insertInto($this->table)->values($values)->execute();
    }

    /**
     * @param array $values
     * @return bool|int|\PDOStatement
     * @throws \Envms\FluentPDO\Exception
     */
    public function update(array $values){
        $id = $values['id'];
        return $this->db->update($this->table)->set($values)->where('id', $id)->execute();
    }

    /**
     * @param $id
     * @return bool
     * @throws \Envms\FluentPDO\Exception
     */
    public function delete($id){
        return $this->db->deleteFrom($this->table)->where('id', $id)->execute();
    }
}