
function onClickBtn(){

  var number = document.querySelector('#likeBtn').value;
  var username = document.querySelector('#username').value;
  $.ajaxSetup({
    beforeSend: function(xhr, type) {
        if (!type.crossDomain) {
            xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
        }
    },
});
  $.post('like',{postId:number,username:username},function(data){
    console.log(data);
    alert('like'.concat(number));
    $('#postRequestData').html(data);


  });
}


function onClickBtn2(){

  var number = document.querySelector('#likeBtn').value;
  var username = document.querySelector('#username').value;
  var form = new FormData();
  form.append('number',number);
  alert('like'.concat(number));
  var xhr = new XMLHttpRequest();
  xhr.open('POST','home.blade.php',true);
  xhr.onload = function(e){
    if (this.status == 200){
      var result = this.response;
      var msg = document.queryelector('#postRequestData');
      msg.textContent = result;
    }
  };
  xhr.send(form);
}
