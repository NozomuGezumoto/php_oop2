<?php
require_once('Models/Todo.php');
$id = $_GET['id'];
//Todoクラスをインスタンス化
$todo = New Todo;
//Todoクラスのdeleteメソッドを実行
$todo->delete($id);
//index.phpに戻る
header('Location: index.php');