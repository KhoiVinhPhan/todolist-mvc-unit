<?php

class Task
{
    public $id;
    public $title;
    public $start;
    public $end;
    public $status;

    function __construct($id, $title, $start, $end, $status)
    {
        $this->id = $id;
        $this->title = $title;
        $this->start = $start;
        $this->end = $end;
        $this->status = $status;
    }

    static function all()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM todo_list');

        foreach ($req->fetchAll() as $item) {
            $list[] = new Task($item['id'], $item['title'], $item['start'], $item['end'], $item['status']);
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
            return new Task($item['id'], $item['title'], $item['start'], $item['end'], $item['status']);
        }
        return null;
    }

    static function store($title, $start, $end, $status)
    {
        $db = DB::getInstance();
        $req = $db->prepare("INSERT INTO todo_list (title, start, end, status) VALUES ('$title', '$start', '$end', '$status')");
        $req->execute();
        return true;
    }

    static function update($id, $title, $start, $end, $status)
    {
        $db = DB::getInstance();
        $req = $db->prepare("UPDATE todo_list SET title='$title', start='$start', end='$end', status='$status' WHERE id='$id'");
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