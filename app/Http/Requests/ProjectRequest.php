<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProjectRequest extends Request {

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
		$rules = [
			'name' => 'required'
		];

		switch($this->method()) {

			// unique slug when creating new project
			case 'POST':
				$rules['slug'] = 'required|unique:projects';
				break;

			// unique slug when editing a project
			case 'PUT':
			case 'PATCH':
				$rules['slug'] = 'required|unique:projects,slug,' . $this->projects->id;
				// $rules['slug'] = 'required|unique:projects';
				break;
			default:
				break;
		}

		// dd($rules);
		return $rules;
	}

}
