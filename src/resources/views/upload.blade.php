<!-- エラーメッセージ。なければ表示しない -->
@if ($errors->any())
<ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

<!-- フォーム -->
<form action="{{ url('upload') }}" method="POST" enctype="multipart/form-data">




    <label for="photo">画像ファイル:</label>
    <input type="file" class="form-control" name="file">
    <br>
    <br>
    コメント:<br>
    <textarea name="comment" rows="4" cols="40"></textarea>
    <br>
    <hr>
    {{ csrf_field() }}
    <button class="btn btn-success"> Upload </button>
</form>
