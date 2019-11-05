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
        `<a class="text-danger" href="delete.php? id=${data['id']}">DELETE</a>` +
        `</td>`+
        `</tr>`
      );
    }).fail((error) => {

    })
  });
})