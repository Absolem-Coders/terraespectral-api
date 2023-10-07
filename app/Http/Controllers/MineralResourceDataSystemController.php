<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMineralResourceDataSystemRequest;
use App\Http\Requests\UpdateMineralResourceDataSystemRequest;
use App\Models\MineralResourceDataSystem;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\LazyCollection;

class MineralResourceDataSystemController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreMineralResourceDataSystemRequest $request): JsonResponse
  {
    $filename = $request->file('file');

    $collection = LazyCollection::make(function () use ($filename) {
      $file = fopen($filename, 'r');
      $keys = $file ? fgetcsv($file) : [];

      while ($line = fgetcsv($file)) {
        yield array_combine($keys, $line);
      }
    });

    $collection->chunk(1000)->each(function ($chunk) {
      MineralResourceDataSystem::insert($chunk->toArray());
    });

    return response()->json($collection);

    //return response()->noContent(201);
  }

  /**
   * Display the specified resource.
   */
  public function show(MineralResourceDataSystem $mineralResourceDataSystem)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateMineralResourceDataSystemRequest $request, MineralResourceDataSystem $mineralResourceDataSystem)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(MineralResourceDataSystem $mineralResourceDataSystem)
  {
    //
  }
}
