<?php

namespace App\Repositories;

use App\Http\Requests\SearchMineralResourceDataSystemRequest;
use App\Models\MineralResourceDataSystem;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class MineralResourceDataSystemRepository implements IMineralResourceDataSystemRepository
{

  /**
   * @inheritDoc
   */
  public function all(int $page, int $perPage, string $sortBy, string $thenBy, string $order): LengthAwarePaginator
  {
    return MineralResourceDataSystem::query()
      ->orderBy($sortBy, $order)
      ->orderBy($thenBy, $order)
      ->paginate($perPage, ['*'], 'page', $page);
  }

  /**
   * @inheritDoc
   */
  public function find(int $id): Collection|Model|null|array
  {
    return MineralResourceDataSystem::query()->find($id);
  }

  /**
   * @inheritDoc
   */
  public function search(SearchMineralResourceDataSystemRequest $request): LengthAwarePaginator
  {
    $page = $request->get('page', 1);
    $perPage = $request->get('per_page', 25);
    $sortBy = $request->get('sort_by', 'id');
    $thenBy = $request->get('then_by', 'created_at');
    $order = $request->get('order', 'asc');

    return MineralResourceDataSystem::query()
      ->when($request->has('latitude') && $request->has('longitude'), function ($query) use ($request) {
        $latitude = $request->get('latitude');
        $longitude = $request->get('longitude');

        return $query->where('latitude', '>=', $latitude - 0.5)
          ->where('latitude', '<=', $latitude + 0.5)
          ->where('longitude', '>=', $longitude - 0.5)
          ->where('longitude', '<=', $longitude + 0.5);
      })
      ->when($request->has('ore'), function ($query) use ($request) {
        return $query->where('ore', 'ilike', '%' . $request->get('ore') . '%');
      })
      ->when($request->has('country'), function ($query) use ($request) {
        return $query->where('country', 'ilike', '%' . $request->get('country') . '%');
      })
      ->when($request->has('score'), function ($query) use ($request) {
        return $query->where('score', 'ilike', '%' . $request->get('score') . '%');
      })
      ->when($request->has('disc_yr'), function ($query) use ($request) {
        return $query->where('disc_yr', 'ilike', '%' . $request->get('disc_yr') . '%');
      })
      ->when($request->has('reporter'), function ($query) use ($request) {
        return $query->where('reporter', 'ilike', '%' . $request->get('reporter') . '%');
      })
      ->when($request->has('region'), function ($query) use ($request) {
        return $query->where('region', 'ilike', '%' . $request->get('region') . '%');
      })
      ->when($request->has('state'), function ($query) use ($request) {
        return $query->where('state', 'ilike', '%' . $request->get('state') . '%');
      })
      ->when($request->has('county'), function ($query) use ($request) {
        return $query->where('county', 'ilike', '%' . $request->get('county') . '%');
      })
      ->when($request->has('oper_type'), function ($query) use ($request) {
        return $query->where('oper_type', 'ilike', '%' . $request->get('oper_type') . '%');
      })
      ->orderBy($sortBy, $order)
      ->orderBy($thenBy, $order)
      ->paginate($perPage, ['*'], 'page', $page);
  }

  /**
   * @inheritDoc
   */
  public function listInputs(): array
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

    sort($countries);

    $operTypes = MineralResourceDataSystem::query()
      ->select('oper_type')
      ->distinct()
      ->get();

    $operTypes = $operTypes->groupBy('oper_type')->keys()->unique()->values();
    $operTypes = array_map('trim', $operTypes->toArray());
    $operTypes = array_filter($operTypes);
    $operTypes = array_values($operTypes);

    sort($operTypes);

    return [
      'ores' => $ores->sort()->values(),
      'countries' => $countries,
      'oper_types' => $operTypes
    ];
  }
}
