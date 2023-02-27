@extends('layouts.default')
<style>
.task_search_btn {
  display: inline-block;
  border-color: #cdf119;
  color: #cdf119;
  text-decoration: none;
  margin-bottom: 10px;
}
.add_form{
  margin-bottom: 25px;
  justify-content: space-between;
  display: flex;
}
.add_content {
  width: 75%;
  padding: 5px;
  border-radius: 5px;
  border: solid 1px #ccc;
  font-size: 14px;
}
.add_btn {
  border-color: #dc70fa;
  color: #dc70fa;
}
.task_column {
  width: 90%;
  padding: 5px;
  border: solid 1px #ccc;
  border-radius: 5px;
  font-size: 14px;
}
.select-tag {
  padding: 5px;
  border-radius: 5px;
  border: 1px solid #ccc;
  font-size: 14px;
}
.modify_btn {
  border-color: #fa9770;
  color: #fa9770;
}
.delete_btn {
  border-color: #71fadc;
  color: #71fadc;
}
</style>
@section('container')
@section('card')
@section('card_header')
<p class="title">Todo List</p>
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
<a class="btn task_search_btn" href="./find">タスク検索</a>
@error('task')
<tr>
  <td>{{$message}}</td>
</tr>
@enderror
@section('todo')
<form class="add_form" action="/add" method="POST">
  @csrf
  @if($user!=null)
  <input type="hidden" name="user_id" value="{{$user->id}}" />
  @else
  <?php
  header("Location:/register");
  ?>
  @endif
  <input class="add_content" type="text" name="task" />
  <select class="select-tag" name="tag_id" required>
    @foreach ($tags as $tag)
    <option value="{{$tag->id}}">{{$tag->tag}}</option>
    @endforeach
  </select>
  <button class="btn add_btn" name="add_button" type="submit" value="追加">追加</button>
</form>
<table>
  <tr class="table-title">
    <th>作成日</th>
    <th>タスク名</th>
    <th>タグ</th>
    <th>更新</th>
    <th>削除</th>
  </tr>
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
</table>
@endsection
@endsection
@endsection
