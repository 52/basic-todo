<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class TaskRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		$rules = array(
			'name'        => 'required',
			'description' => 'required'
		);

		switch ($this->method()) {

			case 'POST':
				$rules['slug'] = 'required|unique:tasks';
				break;

			case 'PUT':
			case 'PATCH':
				$rules['slug'] = 'required|unique:tasks,slug,' . $this->tasks->id;
				break;

			default:
				break;
		}

		return $rules;
	}

}
