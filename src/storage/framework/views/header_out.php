
<!DOCTYPE html>

<html lang="ja">
<head>
<meta charset="utf-8">
<style>

.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  margin-top:1.5%;
  margin-bottom: 1.5%;
  width: 50%;
}

.column {
  float: left;
  width: 33.00%;
}

.row{
  background-color: dodgerblue;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

</style>
<title>Header</title>
</head>
<body>

  <div class="row">

  <a href="home">
  <div class="column" style="border: 2px solid cyan;"><h2 class="center">Home</h2></div>
  </a>
  <a href="">
  <div class="column" style="border: 2px solid cyan;"><h2 class="center">Login</h2></div>
  </a>
  <a href="upload">
  <div class="column" style="border: 2px solid cyan;"><h2 class="center">Upload</h2></div>
  </a>

  </div>


</body>
