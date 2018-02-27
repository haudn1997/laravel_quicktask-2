<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;
use App\Task;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;


class TasksController extends Controller
{
    public function index($lang = 'vn'){

        $lang = ($lang == 'vn') ? 'vn' : 'en';

        Session::put('lang', $lang);
        App::setLocale($lang);

        $tasks = Task::orderBy('created_at', 'asc')->get();

        return view('tasks',['tasks' => $tasks, 'lang' => $lang]);
    }

    public  function store(TaskRequest $taskRequest){

        $task = new Task;
        $task->name = $taskRequest->task;

        if ($task->save()){

            return redirect()->route('lang', ['lang' => Session::get('lang')]);

        }else{

            return back()->with(['msgErr' => trans('msg.errAddTask')]);

        }

    }
    public function destroy(Task $task){
        if ($task->delete()){

            return redirect()->route('lang',['lang' => Session::get('lang')]);

        }else{

            return back()->with(['msgErr' => trans('msg.errDelTask')]);

        }
    }

}

