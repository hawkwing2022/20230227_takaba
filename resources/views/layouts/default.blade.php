<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="reset.css" />
  <title>Todo List</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      vertical-align: baseline;
    }

    .btn {
    border: solid 2px;
    text-align: center;
    font-size: 12px;
    background-color: #FFF;
    padding: 8px 16px;
    font-weight: bold;
    border-radius: 5px;
    }

    .logout_btn {
      border-color: #ff0000;
      color: #ff0000;
      display: inline;
    }

    .auth_info {
      display: flex;
      justify-content: space-between;
    }

    body {
      line-height: 1;
    }

    .container {
      background-color:#2d197c;
      height: 100vh;
      width: 100vw;
      position: relative;
    }

    .card {
      background-color: #fff;
      width: 50vw;
      padding: 30px;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%,-50%);
      border-radius: 10px;
    }

    .card_header{
      display: flex;
      justify-content: space-between;
    }

    .title {
      font-weight: bold;
      font-size: 24px;
      margin-bottom: 15px;
      display: inline-block;
    }


    table {
      text-align: center;
      width: 100%;
    }

    tr {
      height: 50px;
    }

  </style>
</head>
<body>
  <div class="container">
    @yield('container')
    <div class="card">
      @yield('card')
      <div class="card_header">
        @yield('card_header')
        <div class="auth_info">
          @yield('auth_info')
        </div>
      </div>
        <div class="todo">
          @yield('todo')
        </div>
    </div>
  </div>
</body>
</html>