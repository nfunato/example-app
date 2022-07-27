<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,
            user_scalable=no, maximum-scale=1.0, minimum-scale=1.0">
    <title>Todo管理</title>
</head>

<body>

    <h1>Todo管理</h1>
    <p>{{ $name }}</p>
    <hr style="margin-left:0; width: 50%;" />
    <div>
        <p>新規タスク</p>
        <form action="{{ route('todo.create') }}" method="post">
            @csrf
            <label for="todo-content">タスク入力</label>
            <span>100文字まで</span>
            <textarea id="todo-content" type="text" name="todo" placeholder="タスクを入力"></textarea>
            <button type="submit">追加</button>
            @error('todo')
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </form>
    </div>
    <hr style="margin-left:0; width: 50%;" />
    <div>
        <p>タスクリスト</p>
        @foreach ($todos as $todo)
        <p>{{ $todo->task }}</p>
        @endforeach
    </div>

</body>

</html>