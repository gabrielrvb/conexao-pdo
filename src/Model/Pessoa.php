<?php 
namespace App\Model;
class Pessoa{
    public $nome;
    public $tel;
    function __construct(string $nome, string $tel){
        $this->nome = $nome;  
        $this->tel = $tel;
    }
}