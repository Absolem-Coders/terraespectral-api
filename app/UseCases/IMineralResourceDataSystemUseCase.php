<?php

namespace App\UseCases;

use App\Http\Requests\PaginateRequest;
use App\Http\Requests\SearchMineralResourceDataSystemRequest;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;

interface IMineralResourceDataSystemUseCase
{
  /**
   * Display a listing of the resource.
   *
   * @param PaginateRequest $request
   * @return LengthAwarePaginator
   */
  public function all(PaginateRequest $request): LengthAwarePaginator;

  /**
   * Display the specified resource.
   *
   * @param int $id
   * @return Builder[]|Collection|Model|null $entity
   */
  public function find(int $id): Collection|Model|null|array;

  /**
   * Search for a resource.
   *
   * @param SearchMineralResourceDataSystemRequest $request
   * @return LengthAwarePaginator
   */
  public function search(SearchMineralResourceDataSystemRequest $request): LengthAwarePaginator;

  /**
   * List all inputs for select.
   *
   * @return array
   */
  public function listInputs(): array;
}
