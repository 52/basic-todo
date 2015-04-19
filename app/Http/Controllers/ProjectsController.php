<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Task;
use App\Project;
use App\Http\Requests\ProjectRequest;

use \Auth;

class ProjectsController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a listing of projects.
	 *
	 * @return Response
	 */
	public function index()
	{
		$projects = Auth::user()->projects;
		return view('projects.index', compact('projects'));
	}

	/**
	 * Show the form for creating a new project.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('projects.create');
	}

	/**
	 * Store a newly created project in storage.
	 *
	 * @param ProjectRequest $request
	 * @return Response
	 */
	public function store(ProjectRequest $request)
	{
		return redirect('projects');
	}

	/**
	 * Display the specified project.
	 *
	 * @param  Project  $project
	 * @return Response
	 */
	public function show(Project $project)
	{
		return view('projects.show', compact('project'));
	}

	/**
	 * Show the form for editing the specified project.
	 *
	 * @param  Project  $project
	 * @return Response
	 */
	public function edit(Project $project)
	{
		return view('projects.edit', compact('project'));
	}

	/**
	 * Update the specified project in storage.
	 *
	 * @param  Project $project
	 * @param  ProjectRequest $request
	 * @return Response
	 */
	public function update(Project $project, ProjectRequest $request)
	{
		Auth::user()->projects()->update($request->all());
		return redirect('projects');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  Project $project
	 * @return Response
	 */
	public function destroy(Project $project)
	{
		$project->delete();
		return redirect()->route('projects.index');
	}

}
