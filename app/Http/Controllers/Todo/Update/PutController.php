<?php

namespace App\Http\Controllers\Todo\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Todo\UpdateRequest;
use App\Models\Todo;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PutController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UpdateRequest $request)
    {
        $edit = (int) $request->route('edit');
        $todoId = (int) $request->route('todoId');
        $todo = Todo::where('id', $todoId)->firstOrFail();
        if ($edit) {
            $todo->task = $request->todo();
            $todo->deadline = $request->deadline();
            $todo->save();
            return redirect()
                //  ->route('todo.update.index', ['todoId' => $todo->id]) -- causes infinite loop
                ->route('todo.index')
                ->with('feedback.success', "編集結果で更新しました"); // where we can see it?
        } else {
            $todo->is_done = 1;
            $todo->save();
            return redirect()
                ->route('todo.index')
                ->with('feedback.success', "完了しました");   // where we can see it?
        }
    }
}
