<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todo;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $todoId = (int) $request->route('todoId');
        $todo = Todo::where('id', $todoId)->firstOrFail();
        $todo->delete();
        return redirect()
            ->route('todo.index')
            ->with('feed ack.success', "削除しました");
    }
}
