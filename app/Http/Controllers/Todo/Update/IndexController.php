<?php

namespace App\Http\Controllers\Todo\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todo;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $todoId = (int)$request->route('todoId');
        $todo = Todo::where('id', $todoId)->firstOrFail();
        // $todo->deadline = $request->deadline();
        // dd($todos);
        return view('todo.update')->with('todo', $todo);
    }
}
