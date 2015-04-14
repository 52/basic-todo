<?php

use Illuminate\Database\Seeder;
use App\Project;

class ProjectsTableSeeder extends Seeder {

	/**
	 * Populate projects table with sample data
	 * @return void
	 */
	public function run()
	{
		// Wipe out the table clean before populating with new sample data
		DB::table('projects')->delete();

		$projects = array(
			['name' => 'Be a superman', 'slug' => 'be-a-superman'],
			['name' => 'Become a crazy cat lady ', 'slug' => 'become-a-crazy-cat-lady']
		);

		foreach ($projects as $project) {
			Project::create($project);
		}
	}
}
