<?php

require_once 'Models/Todo.php';
// require_once('Models/Todo.php');

//入力されたデータを変数taskに保存
$task = $_POST['task'];

$todo = new Todo();
// $todo->create($task);

//新しいタスクを作成( 作成したタスクのIDを取得)
$lastestId = $todo->create($task);


//createページから戻る処理
// header('Location: index.php');

//最新のタスクを取得
$lastestTask = $todo->get($lastestId);

//最新のタスクをjson形式にして通信元に返す
echo json_encode($lastestTask);