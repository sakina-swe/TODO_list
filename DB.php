<?php

class DB {
    public $pdo;
    public function __construct() {
        $this->pdo = new PDO('mysql:host=localhost;dbname=todo_list_db', 'root', '1234');
    }

    public function insert(): void
    {
        $query = "INSERT INTO todo_list (todos, status) VALUES (:todos, :status)";

        $status = 0;
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':todos', $_POST['todo']);
        $stmt->bindParam(':status', $status, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function fetch(): false|array
    {
        $query = "SELECT * FROM todo_list";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function update($status = 0): void
    {
        $query = "UPDATE todo_list SET status = :status";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':status', $status, PDO::PARAM_INT);
        $stmt->execute();
    }
}