<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function store()
    {
        $request = request();

        $this->validate($request, [
            'title' => 'required|min:5|unique:todos',
            'description' => 'required|max:255'
        ]);

        $todo = new Todo;
        $todo->title = $request->title;
        $todo->user_id = auth()->user()->id;
        $todo->description = $request->description;

        $todo->save();
        
        return redirect('/home');
    }

    public function destroy($id)
    {
        Todo::destroy($id);

        return redirect('/home');
    }
}
