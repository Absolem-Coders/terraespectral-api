<?php

namespace App\Http\Controllers;

use App\Models\MineralResourceDataSystem;

class MineralResourceDataSystemController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $page = request()->get('page', 1);
    $perPage = request()->get('per_page', 25);

    $mineralResourceDataSystems = MineralResourceDataSystem::paginate($perPage, ['*'], 'page', $page);

    return response()->json($mineralResourceDataSystems);
  }

  /**
   * Display the specified resource.
   */
  public function show()
  {
    $mineralResourceDataSystem = MineralResourceDataSystem::query()->find(request()->route('id'));

    return response()->json($mineralResourceDataSystem);
  }
}
