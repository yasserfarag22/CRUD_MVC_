<?php
require_once(Libs . 'DB/MysqliDb.php');
class DB
{
    protected $db;


    public function connect()
    {
        $database = new MysqliDb(HOST, USER, PASS, NAME);
        if (!$database->connect()) {
            $this->db = $database;
            return $this->db;
        } else {
            echo "error gffff";
        }
    }
}
