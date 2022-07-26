<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Todo\CreateRequest;
use App\Models\Todo;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(CreateRequest $request)
    {
        $todo = new Todo;
        $todo->task = $request->todo();
        $todo->deadline = $request->deadline();
        $todo->save();
        return redirect()->route('todo.index');
    }
}
