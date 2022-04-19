<?php
class Data
{

    public function __construct()
    {
    }

    public static function secuData($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
