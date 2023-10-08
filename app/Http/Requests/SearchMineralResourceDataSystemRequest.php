<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SearchMineralResourceDataSystemRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, ValidationRule|array|string>
   */
  public function rules(): array
  {
    return [
      'per_page' => 'integer',
      'page' => 'integer',
      'sort' => 'string',
      'order' => 'string',
      'latitude' => 'string',
      'longitude' => 'string',
      'ore' => 'string',
      'score' => 'string',
      'disc_yr' => 'string',
      'reporter' => 'string',
      'region' => 'string',
      'country' => 'string',
      'state' => 'string',
      'county' => 'string',
      'oper_type' => 'string'
    ];
  }
}
