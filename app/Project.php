<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {

	// Fillable fields
	protected $fillable = ['name', 'slug'];

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
}
