<?php

namespace App\Http\Controllers;
use App\Http\Requests\TodoRequest;
use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    //
    public function index()
    {
        $todos=Todo::all();
        return view('todos.index',['todos'=>$todos]);
    }
    public function create()
    {
        return view('todos.create');
    }
    //  public function store(TodoRequest $request)
    // {
    //     $request->validated();
    //     Todo::create([
    //         'title' => $request->title,
    //         'description' =>$request->description,
    //         'is_completed' =>0

    //     ]);
    //     $request->session()->flash('alert-success','Todo Completed Sucessfully');

    //     return to_route('todos.index');
    // }
             public function store(TodoRequest $request)
            {
                $request->validate([
                    'title' => 'required',
                    'description' => 'required',
                ]);

                Todo::create([
                    'title' => $request->title,
                    'description' => $request->description,
                    'is_completed' => 0,
                ]);

                $request->session()->flash('alert-success', 'Todo Completed Successfully');

                return redirect()->route('todos.index');
            }
            public function show($id)
            {
                $todos = Todo::find($id);

                if (!$todos) {
                    $request->session()->flash('alert-success', 'Unable to Locate Todo');
                    return redirect()->route('todos.index')->withErrors([
                        'error' => 'Unable to locate the Todo'
                    ]);
                }

                return view('todos.show', ['todos' => $todos]);
            }
            public function edit($id)
            {
                 $todos = Todo::find($id);

                if (!$todos) {
                    $request->session()->flash('alert-success', 'Unable to Locate Todo');
                    return redirect()->route('todos.index')->withErrors([
                        'error' => 'Unable to locate the Todo'
                    ]);
                }

                return view('todos.edit', ['todos' => $todos]);

            }
            public function update(TodoRequest $request)
            {

                $todos=Todo::find($request->todos_id);
                 if (!$todos) {
                    $request->session()->flash('alert-success', 'Unable to Locate Todo');
                    return redirect()->route('todos.index')->withErrors([
                        'error' => 'Unable to locate the Todo'
                    ]);
                }
                $todos->update([
                    'title'=>$request->title,
                    'description'=>$request->description,
                    'is_completed'=>$request->is_completed
                ]);
                $request->session()->flash('alert-info','Todo Updated Sucessfuly');
                return redirect()->route('todos.index');
            }
            public function destroy(Request $request)
            {
                $todos=Todo::find($request->todos_id);
                 if (!$todos) {
                    $request->session()->flash('alert-success', 'Unable to Locate Todo');
                    return redirect()->route('todos.index')->withErrors([
                        'error' => 'Unable to locate the Todo'
                    ]);
                }
                $todos->delete();
                $request->session()->flash('alert-info','Todo Deleted Sucessfuly');
                return redirect()->route('todos.index');
            }
}
