<?php

require_once('controllers/BaseController.php');
require_once('models/Task.php');

class TodoController extends BaseController
{
    function __construct()
    {
        $this->folder = 'todo';
    }

    public function index()
    {
        $tasks = Task::all();
        $data = array('tasks' => $tasks);
        $this->render('index', $data);
    }

    public function add()
    {
        $this->render('add');
    }

    public function store()
    {
        $task = $_POST['task'];
        $date = $_POST['date'];
        Task::store($task, $date);
        header('Location: /');
    }

    public function edit()
    {
        $task = Task::find($_GET['id']);
        $data = array('task' => $task);
        $this->render('edit', $data);
    }

    public function update()
    {
        $id = $_GET['id'];
        $task = $_POST['task'];
        $date = $_POST['date'] == "" ? null : $_POST['date'];
        Task::update($id, $task, $date);
        header('Location: /');
    }

    public function delete()
    {
        Task::delete($_GET['id']);
        header('Location: /');
    }

    public function error()
    {
        var_dump("Error");
        exit;
    }

}