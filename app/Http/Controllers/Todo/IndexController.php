<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todo;

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
        // orderBy('deadline', 'ASC')->get()
        $todos = Todo::orderBy('created_at', 'DESC')->get();
        return view('todo.index')
            ->with('name', 'Powered by laravel9')
            ->with('todos', $todos);
    }
}
