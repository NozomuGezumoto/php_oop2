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
</head>
<body>
<header class="px-5 bg-primary">
        <nav class="navbar navbar-dark">
            <a href="index.php" class="navbar-brand">Pronunciation Check</a>
            <div class="justify-content-end">
                <span class="text-light">
                    Nozomu
                </span>
            </div>
        </nav>
    </header>
    <main class="container py-5">
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
                <div class="py-2 col-md-3 col-10">
                    <button type="submit" class="col-12 btn btn-primary">ADD</button>
                </div>
            </form>
        </section>
        <section class="mt-5">
  <table class="table table-hover">
    <thead>
        <tr class="bg-primary text-light">
            <th class=>Word</th>
            <th>Symbol</th>
            <th>Sound</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
      <tbody>
      <?php foreach ($tasks as $task):?>
        <tr>
            <td><?php echo h($task['word']); ?></td>
            <td><?php echo h($task['symbol']); ?></td>
            <td><?php echo h($task['sound']); ?></td>
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

</body>
</html>