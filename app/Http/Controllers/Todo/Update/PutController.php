<?php

namespace App\Http\Controllers\Todo\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Todo\UpdateRequest;
use App\Models\Todo;

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
        $todo = Todo::where('id', $request->id())->firstOrFail();
        $todo->task = $request->todo();
        $todo->save();
        return redirect()
            ->route('todo.update.index', ['todoId' => $todo->id])
            ->with('feedback.success', "編集結果で更新しました");
    }
}
