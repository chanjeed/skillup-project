
function onClickBtn(){

  var number = document.querySelector('#likeBtn').value;


  $.post('like',{postId:number,username:username},function(data){
    console.log(data);
    alert('like'.concat(number));
    $('#postRequestData').html(data);
  });
}


function onClickBtn2(){

  var number = document.querySelector('#likeBtn').value;
  var form = new FormData();
  form.append('number',number);
  alert('like'.concat(number));
  var xhr = new XMLHttpRequest();
  xhr.open('POST','home.blade.php',true);
  xhr.onload = function(e){
    if (this.status == 200){
      var result = this.response;
      var msg = document.queryelector('#msg');
      msg.textContent = result;
    }
  };
  xhr.send(form);
}
