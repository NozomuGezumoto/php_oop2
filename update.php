<?php
require_once('Models/Todo.php');
//入力されたデータを変数taskに保存
$task = $_POST['task'];
$id = $_POST['id'];
// var_dump($task);
// var_dump($id);
//Todoクラスをインスタンス化
$todo = New Todo;
//Todoクラスのcreateメソッドを実行
$todo->update($task, $id);
//index.phpに戻る
header('Location: index.php');