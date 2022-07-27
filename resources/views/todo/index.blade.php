<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
        content="width=device-width, user_scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Todo管理</title>
</head>

<body>

    <h1>Todo管理</h1>
    <p>{{ $name }}</p>
    <hr style="margin-left:0; width: 50%;" />
    <div>
        <p>新規タスク</p>
        @if (session('feedback.success'))
        <p style="color: green">{{ session('feedback.success') }}</p>
        @endif
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
        <!-- <p>{{ $todo->task }}</p> -->
        <details>
            <summary>{{ $todo->task }}</summary>
            <div>
                <a href="{{ route('todo.update.index', ['todoId' => $todo->id]) }}">編集</a>
                <form action="{{ route('todo.delete', ['todoId' => $todo->id]) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit">削除</button>
                </form>
            </div>
        </details>
        @endforeach
    </div>

</body>

</html>