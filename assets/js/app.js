// jQuery確認の為
// $(function () {
//   $('.text-light').on('click', function () {
//     alert('クリックされました');
//   })
// })
$(function () {
  $('#add-button').on('click', function(e){
    // alert('addがクリックさレたよ');

    //formタグの送信を無効化する(二重投稿を防ぐ為)
    e.preventDefault();

    //入力されたタスク名を取得
    let taskName = $('#input-task').val();
    //ajax開始
    $.ajax({
      //キー(決まった文言): 値
      url: 'create.php',
      type: 'POST',
      dataType: 'json',
      data: {
        task: taskName
      }

    }).done((data) => {
// console.log(data);
//prependtbodyの先頭に挿入
      // $('tbody').prepend(`<p>${data['name']}</p>`);
      $('tbody').prepend(
        `<tr>`+
        `<td>${data['name']}</td>`+
        `<td>${data['due_date']}</td>`+
        `<td>NOT YET</td>`+
        `<td>` +
        `<a class="text-success" href="edit.php? id=${data['id']}">EDIT</a>` +
        `</td>` +
        `<td>` +
        `<a data-id="${data['id']}" class="text-danger delete-button" href="delete.php? id=${data['id']}">DELETE</a>` +
        `</td>`+
        `</tr>`
      );
    }).fail((error) => {
      console.log(error);
    })
  });

  //削除のボタンがクリックされた時の処理
  // $(function () {
    // クラスが主役
    // $('.delete-button').on('click', function(e)
    //documennt 画面が表示されている全体
    $(document).on('click','.delete-button', function(e){
      // alert('addがクリックさレたよ');
      //formタグの送信を無効化する(二重投稿を防ぐ
      e.preventDefault();
      //削除対象のIDを取得
      // $(this)今イベントが実測されている本体
      let selectedId = $(this).data('id');
      // alert(selectedId);

    //   let taskName = $('#input-task').val();
    // //ajax開始
    $.ajax({
      //キー(決まった文言): 値
      url: 'delete.php',
      type: 'GET',
      dataType: 'json',
      data: {
        id: selectedId
      }
    }).done((data) => {
      // $(data).fadeOut(2000, function(){
        console.log(data);
      })
    }).fail((error) => {
      console.log(error);
    })
});