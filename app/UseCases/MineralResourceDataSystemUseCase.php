<?php

namespace App\UseCases;

use App\Http\Requests\PaginateRequest;
use App\Http\Requests\SearchMineralResourceDataSystemRequest;
use App\Repositories\IMineralResourceDataSystemRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class MineralResourceDataSystemUseCase implements IMineralResourceDataSystemUseCase
{
  private readonly IMineralResourceDataSystemRepository $repository;

  public function __construct(IMineralResourceDataSystemRepository $repository)
  {
    $this->repository = $repository;
  }

  /**
   * @inheritDoc
   */
  public function all(PaginateRequest $request): LengthAwarePaginator
  {
    $page = $request->get('page', 1);
    $perPage = $request->get('per_page', 100);
    $sortBy = $request->get('sort_by', 'id');
    $thenBy = $request->get('then_by', 'created_at');
    $order = $request->get('order', 'asc');

    return $this->repository->all($page, $perPage, $sortBy, $thenBy, $order);
  }

  /**
   * @inheritDoc
   */
  public function find(int $id): Collection|Model|null|array
  {
    return $this->repository->find($id);
  }

  /**
   * @inheritDoc
   */
  public function search(SearchMineralResourceDataSystemRequest $request): LengthAwarePaginator
  {
    return $this->repository->search($request);
  }

  /**
   * @inheritDoc
   */
  public function listInputs(): array
  {
    return $this->repository->listInputs();
  }
}
