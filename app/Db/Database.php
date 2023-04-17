<?php 

//queryBuilder -> depois ver oq é isso

namespace App\Db;
use \PDO;
use PDOException;

class Database{
    const HOST = '127.0.0.1';
    const username = 'root';
    const db_name = 'vagas_emprego';
    const pass = '';
    private $table;

    // instancia de conexao com bd
    private $connection;

    public function __construct($table = null)
    {
        $this->table = $table;
        $this->setConnection();
    }

    private function setConnection(){
        try {
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::db_name,self::username,self::pass);

            //configurando isso aqui para o PDO travar a query caso tenha algum erro, pq geralmente ele lança só um warning
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('ERROR: '.$e->getMessage());
        }
    }

    // metodo responsavel por executar queries dentro do bd
    public function execute($query, $params = []){
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        } catch (PDOException $e) {
            die('ERROR: '.$e->getMessage());
        }
    }

    //query dinamica
    public function insert($values){
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?'); //depois ver esse metodo, ele é interessante

        $query = 'INSERT INTO '.$this->table.'('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';
        $this->execute($query, array_values($values));

        //retorna o id que foi inserido
        return $this->connection->lastInsertId();
    }

    public function select($where = null, $order = null, $limit = null, $fields = '*'){
        //dados da query
        $where = !empty($where) ? 'WHERE'.$where : '';
        $order = !empty($order) ? 'ORDER BY'.$order : '';
        $limit = !empty($limit) ? 'LIMIT'.$limit : '';

        //monta query
        $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;

        //executa a query
        return $this->execute($query);
    }

    public function update($where, $values){
        //dados da query
        $fields = array_keys($values);


        $query = 'UPDATE '.$this->table.' SET '.implode('=?,',$fields).'=? WHERE '.$where;

        //executar a query
        $this->execute($query, array_values($values));
        return true;
    }

    public function delete($where){
        $query = 'DELETE FROM '.$this->table.' WHERE '.$where;
        // echo "<pre>";print_r($query);exit;
        $this->execute($query);
        return true;
    }
}