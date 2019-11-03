<?php
require_once('Models/Todo.php');
//入力されたデータを変数taskに保存
// $task = $_POST['task'];
$id = $_POST['id'];
$word = $_POST['word'];
$symbol = $_POST['symbol'];
$sound = $_POST['sound'];
var_dump($id);
var_dump($word);
var_dump($symbol);
var_dump($sound);
// var_dump($id);
//Todoクラスをインスタンス化
$todo = New Todo;
//Todoクラスのcreateメソッドを実行
$todo->update($word,$symbol,$sound,$id);
//index.phpに戻る
header('Location: index.php');