<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {

	protected $fillable = [
		'name',
		'slug',
		'description',
		'completed'
	];

	public function scopeIncompleted($query)
	{
		$query->whereCompleted('false');
	}

	/**
	 * A task is belongs to one specific project
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function project()
	{
		return $this->belongsTo('App\Project');
	}

}
