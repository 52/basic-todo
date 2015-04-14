<?php

use Illuminate\Database\Seeder;
use App\Task;

class TasksTableSeeder extends Seeder {

	public function run()
	{
		// Wipe out the table clean before populating with new sample data
		DB::table('tasks')->delete();

		$tasks = array(
			[
				'project_id'  => 1,
				'name'        => 'Wear a cape',
				'slug'        => 'wear-a-cape',
				'completed'   => false,
				'description' => 'The very first step to become a superman. Better be a red cape.'
			],

			[
				'project_id'  => 1,
				'name'        => 'Do good things',
				'slug'        => 'do-good-things',
				'completed'   => false,
				'description' => "Do good things for other people and never ask for anything in return."
			],

			[
				'project_id'  => 2,
				'name'        => 'Buy cats',
				'slug'        => 'buy-cats',
				'completed'   => false,
				'description' => "Buy cats. A lot of cats. Or you can rescue them from shelters."
			],

			[
				'project_id'  => 2,
				'name'        => 'Growing old',
				'slug'        => 'growing-old',
				'completed'   => false,
				'description' => "Growing old with your cats"
			],

			[
				'project_id'  => 2,
				'name'        => "Yelling 'Get off my lawn!' at kids",
				'slug'        => 'yell-at-kids',
				'completed'   => false,
				'description' => "Just to be more dramatic."
			]
		);

		foreach ($tasks as $task) {
			Task::create($task);
		}
	}
}