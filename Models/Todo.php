<?php

require_once ('config/dbconnect.php');
// require_once 'config/dbconnect.php';

class Todo
{
    private $table = 'tasks';
    // private $table = 'word';
    // private $table = '';
    // private $table = 'tasks';
    private $db_manager;

    public function __construct()
    {
        $this->db_manager = new DbManager();
        $this->db_manager->connect();
    }
    public function create($word,$symbol,$sound)
    {
        $stmt = $this->db_manager->dbh->prepare('INSERT INTO '.$this->table.' (word, symbol, sound) VALUES (?,?,?)');
        $stmt->execute([$word, $symbol, $sound]);
    }
    public function all()
    {
        $stmt = $this->db_manager->dbh->prepare('SELECT * FROM '.$this->table);
        $stmt->execute();
        $tasks = $stmt->fetchAll();

        return $tasks;
    }
    // editするデータを取得
    // public function get($id)
    // {
    //     $stmt = $this->db_manager->dbh->prepare('SELECT * FROM ' . $this->table . ' WHERE id = ?');
    //     $stmt->execute([$id]);
    //     $task = $stmt->fetch();
    //     return $task;
    // }
    public function get($id)
    {
        $stmt = $this->db_manager->dbh->prepare('SELECT * FROM ' . $this->table . ' WHERE id = ?');
        $stmt->execute([$id]);
        $task = $stmt->fetch();
        return $task;
    }
    public function update($word,$symbol,$sound,$id)
    {
        $stmt = $this->db_manager->dbh->prepare('UPDATE ' .$this->table .' SET word = ?, symbol = ?, sound = ? WHERE id = ?');
        $stmt->execute([$word,$symbol,$sound,$id]);
    }
    public function delete($id)
    {
        $stmt = $this->db_manager->dbh->prepare('DELETE FROM ' . $this->table .' WHERE id = ?');
        $stmt->execute([$id]);
    }
}