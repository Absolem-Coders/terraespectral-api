<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchMineralResourceDataSystemRequest;
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
    $sort = request()->get('sort', 'id');
    $order = request()->get('order', 'asc');

    $mineralResourceDataSystems = MineralResourceDataSystem::query()
      ->orderBy($sort, $order)
      ->paginate($perPage, ['*'], 'page', $page);

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

  public function search(SearchMineralResourceDataSystemRequest $request)
  {
    $page = $request->get('page', 1);
    $perPage = $request->get('per_page', 25);
    $sort = $request->get('sort', 'id');
    $order = $request->get('order', 'asc');

    $mineralResourceDataSystems = MineralResourceDataSystem::query()
      ->when($request->has('latitude'), function ($query) use ($request) {
        $query->where('latitude', 'like', $request->get('latitude') . '%');
      })
      ->when($request->has('longitude'), function ($query) use ($request) {
        $query->where('longitude', 'like', $request->get('longitude') . '%');
      })
      ->when($request->has('ore'), function ($query) use ($request) {
        $query->where('ore', 'like', '%' . $request->get('ore') . '%');
      })
      ->when($request->has('score'), function ($query) use ($request) {
        $query->where('score', 'like', '%' . $request->get('score') . '%');
      })
      ->when($request->has('disc_yr'), function ($query) use ($request) {
        $query->where('disc_yr', 'like', '%' . $request->get('disc_yr') . '%');
      })
      ->when($request->has('reporter'), function ($query) use ($request) {
        $query->where('reporter', 'like', '%' . $request->get('reporter') . '%');
      })
      ->when($request->has('region'), function ($query) use ($request) {
        $query->where('region', 'like', '%' . $request->get('region') . '%');
      })
      ->when($request->has('country'), function ($query) use ($request) {
        $query->where('country', 'like', '%' . $request->get('country') . '%');
      })
      ->when($request->has('state'), function ($query) use ($request) {
        $query->where('state', 'like', '%' . $request->get('state') . '%');
      })
      ->when($request->has('county'), function ($query) use ($request) {
        $query->where('county', 'like', '%' . $request->get('county') . '%');
      })
      ->when($request->has('oper_type'), function ($query) use ($request) {
        $query->where('oper_type', 'like', '%' . $request->get('oper_type') . '%');
      })
      ->orderBy($sort, $order)
      ->paginate($perPage, ['*'], 'page', $page);

    return response()->json($mineralResourceDataSystems);
  }

  public function list()
  {
    $ores = MineralResourceDataSystem::query()
      ->select('ore')
      ->distinct()
      ->get();

    $ores = $ores->map(function ($ore) {
      $splitOre = explode(',', $ore->ore);
      $splitOre = array_map('trim', $splitOre);
      return array_filter($splitOre);
    });

    $ores = $ores->flatten()->unique()->values();

    $countries = MineralResourceDataSystem::query()
      ->select('country')
      ->distinct()
      ->get();

    $countries = $countries->groupBy('country')->keys()->unique()->values();
    $countries = array_map('trim', $countries->toArray());
    $countries = array_filter($countries);
    $countries = array_values($countries);

    $regions = MineralResourceDataSystem::query()
      ->select('region')
      ->distinct()
      ->get();

    $regions = $regions->groupBy('region')->keys()->unique()->values();
    $regions = array_map('trim', $regions->toArray());
    $regions = array_filter($regions);
    $regions = array_values($regions);

    $states = MineralResourceDataSystem::query()
      ->select('state')
      ->distinct()
      ->get();

    $states = $states->groupBy('state')->keys()->unique()->values();
    $states = array_map('trim', $states->toArray());
    $states = array_filter($states);
    $states = array_values($states);

    $counties = MineralResourceDataSystem::query()
      ->select('county')
      ->distinct()
      ->get();

    $counties = $counties->groupBy('county')->keys()->unique()->values();
    $counties = array_map('trim', $counties->toArray());
    $counties = array_filter($counties);
    $counties = array_values($counties);

    $operTypes = MineralResourceDataSystem::query()
      ->select('oper_type')
      ->distinct()
      ->get();

    $operTypes = $operTypes->groupBy('oper_type')->keys()->unique()->values();
    $operTypes = array_map('trim', $operTypes->toArray());
    $operTypes = array_filter($operTypes);
    $operTypes = array_values($operTypes);

    $response = [
      'ores' => $ores,
      'countries' => $countries,
      'regions' => $regions,
      'states' => $states,
      'counties' => $counties,
      'operTypes' => $operTypes
    ];

    return response()->json($response);
  }
}
