<?php

class Task
{
    public $id;
    public $task;
    public $date;

    function __construct($id, $task, $date)
    {
        $this->id = $id;
        $this->task = $task;
        $this->date = $date;
    }

    static function all()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM todo_list');

        foreach ($req->fetchAll() as $item) {
            $list[] = new Task($item['id'], $item['task'], $item['date'] );
        }

        return $list;
    }

    static function find($id)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM todo_list WHERE id = :id');
        $req->execute(array('id' => $id));

        $item = $req->fetch();
        if (isset($item['id'])) {
            return new Task($item['id'], $item['task'], $item['date']);
        }
        return null;
    }

    static function store($task, $date)
    {
        $db = DB::getInstance();
        $req = $db->prepare("INSERT INTO todo_list (task, date) VALUES ('$task','$date')");
        $req->execute();
        return true;
    }

    static function update($id, $task, $date)
    {
        $db = DB::getInstance();
        $req = $db->prepare("UPDATE todo_list SET task='$task', date='$date' WHERE id='$id'");
        $req->execute();
        return true;
    }

    static function delete($id)
    {
        $db = DB::getInstance();
        $req = $db->prepare('DELETE FROM todo_list WHERE id = :id');
        $req->execute(array('id' => $id));
        return true;
    }
}