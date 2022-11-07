<?php

namespace App\Persistence;


class ConnectionFactory{
    

    private $_user = "root";
    private $_password = "";
    private $_host = "localhost";
    private $_conn;
    private $_dbname="cursoesp32";
    public function getInstance()
    {
        try
        {
            if(!isset($this->_conn)){
                $this->_conn = new \PDO("mysql:host=localhost;dbname=cursoesp32", $this->_user, $this->_password);
                
                print("<br> Conexão estabelicida <br>");
                return $this->_conn;
            } else{
                return $this->_conn;
                print("<br> Conexão já estabelicida antes <br>");
            }
 
        } catch(\PDOException $e){
            echo 'ERROR: ' . $e->getMessage();
        }
    }
}