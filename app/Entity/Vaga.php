<?php

namespace App\Entity;

use App\Db\Database;
use \PDO;

class Vaga{
    public $id;
    public $title;
    public $description;
    public $status;
    public $date;

    public function register(){
        //definir a data
        $this->date = date('Y-m-d H:i:s');

        //inserir a vaga no banco
        $obDatabase = new Database('vagas');
        $this->id = $obDatabase->insert([
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'date' => $this->date,
        ]);

        // echo "<pre>";
        // var_dump($this);exit;

        //atribuir o id da vaga na instancia

        //retornar sucesso
    }

    public function edit(){
        return (new Database('vagas'))->update(
            'id = '.$this->id,[
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            ]);
    }

    public function delete(){
        return (new Database('vagas'))->delete('id = '.$this->id);
    }

    public static function getVagas($where = null, $order = null, $limit = null){
        return (new Database('vagas'))->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    public static function getVaga($id){
        return (new Database('vagas'))->select(" id = $id")->fetchObject(self::class);
    }

}