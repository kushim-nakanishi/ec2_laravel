<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
public function index(int $id)
{
    // すべてのフォルダを取得する
    $folders = Folder::all();

    // 選ばれたフォルダを取得する
    $current_folder = Folder::find($id);

    // 選ばれたフォルダに紐づくタスクを取得する
    // $tasks = Task::where('folder_id', $current_folder->id)->get();
    $tasks = $current_folder->tasks()->get();
    
    return view('todo', [
        'folders' => $folders,
        'current_folder_id' => $current_folder->id,
        'tasks' => $tasks,
    ]);
}
/**
 * GET /folders/{id}/tasks/create
 */
public function showCreateForm(int $id)
{
    return view('tasks/create', [
        'folder_id' => $id
    ]);
}
}
