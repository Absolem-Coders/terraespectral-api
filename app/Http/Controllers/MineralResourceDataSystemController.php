<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaginateRequest;
use App\Http\Requests\SearchMineralResourceDataSystemRequest;
use App\UseCases\IMineralResourceDataSystemUseCase;
use Illuminate\Http\JsonResponse;

class MineralResourceDataSystemController extends Controller
{
  private readonly IMineralResourceDataSystemUseCase $useCase;

  public function __construct(IMineralResourceDataSystemUseCase $useCase)
  {
    $this->useCase = $useCase;
  }

  /**
   * Display a listing of the resource.
   *
   * @param PaginateRequest $request
   * @return JsonResponse
   */
  public function index(PaginateRequest $request): JsonResponse
  {
    $entities = $this->useCase->all($request);

    return response()->json($entities);
  }

  /**
   * Display the specified resource.
   *
   * @param int $id
   * @return JsonResponse
   */
  public function show(int $id): JsonResponse
  {
    $entity = $this->useCase->find($id);

    return response()->json($entity);
  }

  /**
   * Search for a resource.
   *
   * @param SearchMineralResourceDataSystemRequest $request
   * @return JsonResponse
   */
  public function search(SearchMineralResourceDataSystemRequest $request): JsonResponse
  {
    $entities = $this->useCase->search($request);

    return response()->json($entities);
  }

  /**
   * List all inputs for select.
   *
   * @return JsonResponse
   */
  public function listInputs(): JsonResponse
  {
    $response = $this->useCase->listInputs();

    return response()->json($response);
  }
}
