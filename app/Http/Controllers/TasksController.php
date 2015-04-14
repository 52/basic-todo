<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Project;
use App\Task;

class TasksController extends Controller {

	/**
	 * Display a listing of tasks.
	 *
	 * @param Project $project
	 * @return Response
	 */
	public function index(Project $project)
	{
		//
	}

	/**
	 * Show the form for creating a new task.
	 *
	 * @param Project $project
	 * @return Response
	 */
	public function create(Project $project)
	{
		//
	}

	/**
	 * Store a newly created task in storage.
	 *
	 * @param Project $project
	 * @return Response
	 */
	public function store(Project $project)
	{
		//
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
		//
	}

	/**
	 * Update the specified task in storage.
	 *
	 * @param Project $project
	 * @param Tasks $task
	 * @return Response
	 */
	public function update(Project $project, Task $task)
	{
		//
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
		//
	}

}
