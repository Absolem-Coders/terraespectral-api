<?php

namespace App\Repositories;

use App\Http\Requests\SearchMineralResourceDataSystemRequest;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;

interface IMineralResourceDataSystemRepository
{
  /**
   * Display a listing of the resource.
   *
   * @param int $page
   * @param int $perPage
   * @param string $sortBy
   * @param string $thenBy
   * @param string $order
   * @return LengthAwarePaginator
   */
  public function all(int $page, int $perPage, string $sortBy, string $thenBy, string $order): LengthAwarePaginator;

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
