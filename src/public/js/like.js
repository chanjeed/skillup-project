function onClickBtn(){

  var number = document.querySelector('#likeBtn').value;
  var form = new FormData();
  form.append('number',number);
  alert('like'.concat(number));
  var xhr = new XMLHttpRequest();
  xhr.open('POST','/home.blade.php',true);
  xhr.onload = function(e){
    if (this.status == 200){
      var result = this.response;
      var msg = document.queryelector('#msg');
      msg.textContent = result;
    }
  };
  xhr.send(form);
}
