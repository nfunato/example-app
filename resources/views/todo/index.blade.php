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
    <hr style="margin-left:0; width: 70%;" />
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
            <label for="todo-deadline">期限</label>
            <!-- <input id="todo-deadline" type="date" name="deadline" min={{ date('Y-m-d', strtotime('+1 day')) }}> -->
            <input id="todo-deadline" type="date" name="deadline">
            <button type="submit">追加</button>
            @error('todo')
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </form>
    </div>
    <hr style="margin-left:0; width: 70%;" />
    <div>
        <p>タスクリスト</p>
        @foreach ($todos as $todo)
        <!-- <p>{{ $todo->task }}</p> -->
        <details>
            <!-- <summary>{{ $todo->task }}</summary> -->
            @if ($todo->is_done || $todo->deadline && (new DateTime($todo->deadline) < new DateTime())) <summary><del>{{
                    sprintf("%12s%70s", $todo->deadline, $todo->task) }}</del></summary>
                @else
                <summary>{{ sprintf("%12s%70s", $todo->deadline, $todo->task) }}</summary>
                @endif
                <div>
                    <a href="{{ route('todo.update.index', ['todoId' => $todo->id]) }}">編集</a>
                    <form action="{{ route('todo.delete', ['todoId' => $todo->id]) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit">削除</button>
                    </form>
                    <!--
                    <form action="{{ route('todo.update.put', ['todoId' => $todo->id, 'edit' => 0]) }}" method="post">
                        @method('PUT')
                        @csrf
                        <button type="submit">完了</button>
                    </form>
                    -->
                    <a href="{{ route('todo.update.index', ['todoId' => 10]) }}">完了</a>
                </div>
        </details>
        @endforeach
    </div>

</body>

</html>