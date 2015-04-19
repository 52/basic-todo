<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use \Auth;
use App\Task;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;

class TasksController extends Controller {

	/**
	 * Show the form for creating a new task.
	 *
	 * @param Project $project
	 * @return Response
	 */
	public function create(Project $project)
	{
		return view('tasks.create', compact('project'));
	}

	/**
	 * Store a newly created task in storage.
	 *
	 * @param Project $project
	 * @return Response
	 */
	public function store(Project $project, TaskRequest $request)
	{
		return redirect()->route('projects.show', [$project->slug]);
	}

	/**
	 * Display the specified task.
	 *
	 * @param Project $project
	 * @param Tasks $task
	 * @return Response
	 */
	public function show(Project $project, Task $task)
	{
		$project->hasTask($task->id);
		return view('tasks.show', compact('project', 'task'));
	}

	/**
	 * Show the form for editing the specified task.
	 *
	 * @param Project $project
	 * @param Tasks $task
	 * @return Response
	 */
	public function edit(Project $project, Task $task)
	{
		$project->hasTask($task->id);
		return view('tasks.edit', compact('project', 'task'));
	}

	/**
	 * Update the specified task in storage.
	 *
	 * @param Project $project
	 * @param Tasks $task
	 * @param TaskRequest $request
	 * @return Response
	 */
	public function update(Project $project, Task $task, TaskRequest $request)
	{
		$project->hasTask($task->id);

		$taskInfo = $request->all();

		if(array_key_exists('completed', $taskInfo)){
			$taskInfo['completed'] = true;
		} else {
			$taskInfo['completed'] = false;
		}

		$task->update($taskInfo);

		return redirect()->route('projects.show', [$project->slug]);
	}

	/**
	 * Remove the specified task from storage.
	 *
	 * @param Project $project
	 * @param Tasks $task
	 * @return Response
	 */
	public function destroy(Project $project, Task $task)
	{
		$project->hasTask($task->id);

		$task->delete();
		return redirect()->route('projects.show', [$project->slug]);
	}

	/**
	 * Mark a task as completed
	 *
	 * @param  Project $project
	 * @param  Task    $task
	 * @return Response
	 */
	public function complete(Project $project, Task $task)
	{
		$project->hasTask($task->id);

		$task->completed = true;
		$task->save();
		return redirect()->route('projects.show', [$project->slug]);
	}
}
