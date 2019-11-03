<?php

require_once 'Models/Todo.php';
require_once 'function.php';
// require_once('Models/Todo.php');

//入力されたデータを変数taskに保存
$word = $_POST['word'];

$symbol = $_POST['symbol'];

$sound = $_POST['sound'];

// var_dump('word');

// var_dump('symbol');

// var_dump('sound');

// exit;

$todo = new Todo();

$todo->create($word, $symbol, $sound);

header('Location: index.php');
