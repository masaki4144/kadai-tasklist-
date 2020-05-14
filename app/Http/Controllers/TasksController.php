<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;    // 追加

class TasksController extends Controller
{
    // getでmessages/にアクセスされた場合の「一覧表示処理」
    public function index()
    {
        $tasks = Task::all();

        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     // getでmessages/createにアクセスされた場合の「新規登録画面表示処理」
    public function create()
    {
        $tasklist = new Task;

        return view('tasks.create', [
            'tasklist' => $tasklist,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // postでmessages/にアクセスされた場合の「新規登録処理」
    public function store(Request $request)
    {
        $this->validate($request, [
            'status' => 'required|max:10',
            'content' => 'required|max:191',
        ]);
        
        $tasklist = new Task;
        $tasklist->status = $request->status;
        $tasklist->content = $request->content;
        $tasklist->save();

        return redirect('/');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      // getでmessages/idにアクセスされた場合の「取得表示処理」
    public function show($id)
    {
        $tasklist = Task::find($id);

        return view('tasks.show', [
            'tasklist' => $tasklist,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tasklist = Task::find($id);

        return view('tasks.edit', [
            'tasklist' => $tasklist,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'required|max:10',
            'content' => 'required|max:191',
        ]);

        
        $tasklist = Task::find($id);
        $tasklist->status = $request->status; 
        $tasklist->content = $request->content;
        $tasklist->save();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tasklist = Task::find($id);
        $tasklist->delete();

        return redirect('/');
    }
}
