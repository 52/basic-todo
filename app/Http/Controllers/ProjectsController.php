<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use \Auth;
use App\Task;
use App\Project;
use Illuminate\Support\Str;
use App\Http\Requests\ProjectRequest;

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
		$new_project = $request->all();
		$new_project['slug'] = $this->generateSlug($new_project['name']);

		Auth::user()->projects()->create($new_project);

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
		$project->update($request->all());
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

	/**
	 * Helper function to generate new slug
	 *
	 * @param  String $name
	 * @return String
	 */
	private function generateSlug($name)
	{
		// create new slug
		$new_slug = Str::slug($name);

		// get all slugs with similar pattern: slug-[number]
		$slugs = Project::whereRaw("slug REGEXP '^{$new_slug}(-[0-9]*)?$'")->lists('slug');

		// if already exist slugs with the same pattern as the new slug
		if(count($slugs) !== 0){

			// extract the number part from slugs
			$slug_numbers = array_map(
				function($slug) use ($new_slug){
					return intval(str_replace($new_slug . '-', '', $slug));
				},
				$slugs
			);

			// generate new slug with new number
			$new_slug .=  '-' . (max($slug_numbers) + 1);
		}

		return $new_slug;
	}

}
