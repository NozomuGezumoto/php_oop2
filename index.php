<?php
    // require_once 'Models/Todo.php';
    require_once 'function.php';
    require_once 'Models/Todo.php';

    //Todoクラスのインスタンス化
    $todo = new Todo();

    //DBからデータを全件取得
    $tasks = $todo->all();

    // echo '<pre>'; 中のコードをそのまま表示
    // var_dump($tasks);
    // exit();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="assets/css/reset.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <link href="https://fonts.googleapis.com/css?family=Jomolhari&display=swap" rel="stylesheet">
</head>
<body>
<header class="px-5 bg-dark">
        <nav class="navbar navbar-dark">
            <a href="index.php" class="navbar-brand">Pronunciation Check</a>
            <div class="justify-content-end">
                <a href="kigou.html" class="text-light">
                    記号
</a>
            </div>
        </nav>
    </header>
    <main class="container py-5">
    <img src="assets/image/sprechenjpg.jpg" class="img-fluid" alt="Responsive image">
        <section>
            <form class="form-row justify-content-center" action="create.php" method="POST">
                <div class="col-12 col-md-4 py-2">
                    <input type="text"
                    class="form-control"
                    placeholder="Word"
                    name="word">
                </div>
                <div class="col-12 col-md-4 py-2">
                    <input type="text" class="form-control" placeholder="Symbol"
                    name="symbol">
                </div>
                <div class="col-12 col-md-4 py-2">
                    <input type="text" class="form-control" placeholder="Sound"
                    name="sound">
                </div>
                <div class="custom-file">
  <input type="file" class="custom-file-input" id="customFile">
  <label class="custom-file-label" for="customFile" data-browse="参照">ファイル選択...</label>
</div>
                <div class="py-2 col-md-3 col-10">
                    <button type="submit" class="col-12 btn btn-dark">ADD</button>
                </div>
            </form>
        </section>
        <section class="mt-5">
  <table class="table table-hover">
    <thead>
        <tr class="bg-dark text-light">
            <th class=>Word</th>
            <th>Symbol</th>
            <th>Sound</th>
            <th>再生</th>
            <th>停止</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
      <tbody>
      <?php foreach ($tasks as $task):?>
        <tr>
            <td class="text"><?php echo h($task['word']); ?></td>
            <td class="text"><?php echo h($task['symbol']); ?></td>
            <td class="text"><?php echo h($task['sound']); ?></td>
            <td><a href="javascript:void(0);" onclick="PlaySound();"><i class="fas fa-play"></i></a></td>
            <td><a href="javascript:void(0);" onclick="StopSound();"><i class="fas fa-stop"></i></a></td>
            <td>
                <a class="text-success" href="edit.php?id=<?php echo h($task['id']); ?>"><i class="far fa-edit"></i></a>
            </td>
            <td>
                <a class="text-danger" href="delete.php?id=<?php echo h($task['id']); ?>"><i class="far fa-trash-alt"></i></a>
            </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
  </table>
        </section>
    </main>
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>