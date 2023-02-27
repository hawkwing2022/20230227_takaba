@extends('layouts.default')
<style>
.return_btn {
  border-color: #6d7170;
  color: #6d7170;
}

.search_form{
  margin-bottom: 25px;
  justify-content: space-between;
  display: flex;
}

.search_content {
  width: 75%;
  padding: 5px;
  border-radius: 5px;
  border: solid 1px #ccc;
  font-size: 14px;
}

.search_btn {
  border-color: #dc70fa;
  color: #dc70fa;
}

.select-tag {
  padding: 5px;
  border-radius: 5px;
  border: 1px solid #ccc;
  font-size: 14px;
}
</style>
@section('container')
@section('card')
@section('card_header')
<p class="title">タスク検索</p>
@section('auth_info')
@if(Auth::check())
<p class="login_info">{{'「'.$user->name.'」でログイン中'}}<p>
@else
  <?php
  header("Location:/register");
  ?>
@endif
<form class="logout" action="/logout" method="POST">
  @csrf
<button class="btn logout_btn">ログアウト</button>
</form>
@endsection
@endsection
@error('task')
<tr>
  <td>{{$message}}</td>
</tr>
@enderror
@section('todo')
<form class="search_form" action="/search" method="POST">
  @csrf
  <input class="search_content" type="text" name="task" />
  <select class="select-tag" name="tag_id">
    @foreach($tags as $tag)
    <option value="{{$tag->id}}">{{$tag->tag}}</option>
    @endforeach
  </select>
  <button class="btn search_btn" name="search_btn" type="submit" value="検索">検索</button>
</form>
<table>
  <tr class="table-title">
    <th>作成日</th>
    <th>タスク名</th>
    <th>更新</th>
    <th>削除</th>
  </tr>
  @if (isset($todo))
  @foreach ($todos as $todo)
  <tr>
    <td>{{$todo->created_at}}</td>
    <form action="/modify" method="POST">
      @csrf
      <input type="hidden" name="id" value="{{$todo->id}}">
      <td><input class="task_column" type="text" name="task" value="{{$todo->task}}"></td>
      <td>
        <select class="select-tag" name="tag_id">
          @foreach ($tags as $tag)
          <option value="{{ $tag->id }}" @if($todo->tag_id === $tag->id) selected @endif>{{$tag->tag}}</option>
          @endforeach
        </select>
      </td>
      <td><button class="btn modify_btn" type="submit">更新</button></td>
    </form>
      <form action="/delete" method="POST">
      @csrf
      <input type="hidden" name="deleted_id" value="{{$todo->id}}">
      <td><button class="btn delete_btn" type="submit">削除</button></td>
    </form>
  </tr>
  @endforeach
  @endif
</table>
<a class="btn return_btn" href="./">戻る</a> 
@endsection
@endsection
@endsection