<?php
require_once('setting/db.php');
class Pagination
{

    private $db;
    private $limite;
    private $debut;

    public function __construct()
    {
        $this->limite = 5;

        $this->db = new Db_connect();
    }

    public function Current_page()
    {

        return isset($_GET['page']) ? (int)$_GET['page'] : 1;
    }

    public function get_data($debut, $limite)
    {
        $debut = 0;

        if ($this->current_page() > 1) {

            $debut = ($this->current_page() * $this->limite - $this->limite);
        }
    }
}
