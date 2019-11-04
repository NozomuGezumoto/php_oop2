$('.custom-file-input').on('change',function(){
  $(this).next('.custom-file-label').html($(this)[0].files[0].name);
})

{/* <script type="text/javascript"> */}
var audioElem;

function PlaySound() {
  audioElem = new Audio();
  audioElem.src = "audio/sample.wav";
  audioElem.play();
}
function StopSound(){
  audioElem.pause();
}
// </script>