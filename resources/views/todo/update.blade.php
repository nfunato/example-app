<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
        content="width=device-width, user_scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Todo管理(編集/更新)</title>
</head>

<body>
    <!--
    <form name="autoform" action="{{ route('todo.update.put', ['todoId' => $todo->id, 'edit' => 0]) }}" method="post">
        @method('PUT')
        @csrf
        <input type="hidden" name="dummyinput" value="dummy1">
        <script language="JavaScript">
            document.autoform.submit();
        </script>
    </form>
    -->
    <h1>Todo管理(編集/更新)</h1>
    <hr style="margin-left:0; width: 50%;" />
    <div>
        <a href="{{ route('todo.index') }}">&lt;戻る</a>
        <p>編集フォーム</p>
        @if (session('feedback.success'))
        <p style="color: green">{{ session('feedback.success') }}</p>
        @endif
        <form action="{{ route('todo.update.put', ['todoId' => $todo->id, 'edit' => 1]) }}" method="post">
            @method('PUT')
            @csrf
            <label for="todo-content">タスク</label>
            <span>100文字まで</span>
            <textarea id="todo-content" type="text" name="todo" placeholder="タスクを入力">{{ $todo->task }}</textarea>
            <label for="todo-deadline">期限</label>
            <input id="todo-deadline" type="date" name="deadline" value="{{ $todo->deadline }}">
            @error('todo')
            <p style="color: red;">{{ $message }}</p>
            @enderror
            <button type="submit">更新</button>
        </form>
    </div>
</body>

</html>