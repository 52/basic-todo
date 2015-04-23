<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {

	// Fillable fields
	protected $fillable = ['name', 'slug', 'user_id'];

	/**
	 * Relationship: A project belongs to one specific user only
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user()
	{
		return $this->belongsTo('App\User');
	}

	/**
	 * Relationship: A project can have many tasks
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function tasks()
	{
		return $this->hasMany('App\Task');
	}

	/**
	 * Check if a task belongs to this project or not, if not: throw an exception
	 *
	 * @param  interger  $task_id
	 * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
	 */
	public function hasTask($task_id)
	{
		$this->tasks()->findOrFail($task_id);
	}

	/**
	 * get status of the current project
	 *
	 * @return String
	 */
	public function getStatus()
	{
		$status = '';
		if(count($this->tasks) == 0) {
			$status = "Your project doesn't have any task.";
		} else {
			$status = "Your project has " . $this->tasks()->completed()->count() .
					  " completed task(s) and " . $this->tasks()->incompleted()->count() . " task(s) left.";
		}

		return $status;
	}
}
