<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;

class MineralResourceDataSystemControllerTest extends TestCase
{
  public function test_index(): void
  {
    $response = $this->get('/api/mrds');

    $response->assertStatus(200);
    $response->assertJsonStructure([
      'current_page',
      'data' => [],
      'first_page_url',
      'from',
      'last_page',
      'last_page_url',
      'links' => [],
      'next_page_url',
      'path',
      'per_page',
      'prev_page_url',
      'to',
      'total'
    ]);
    $response->assertJsonIsObject();
  }

  public function test_show(): void
  {
    $response = $this->get('/api/mrds/1');

    $response->assertStatus(200);
    $response->assertJsonStructure([
      'id',
      'created_at',
      'updated_at',
      'dep_id',
      'url',
      'mrds_id',
      'mas_id',
      'site_name',
      'latitude',
      'longitude',
      'region',
      'country',
      'state',
      'county',
      'com_type',
      'commod1',
      'commod2',
      'commod3',
      'oper_type',
      'dep_type',
      'prod_size',
      'dev_stat',
      'ore',
      'gangue',
      'other_matl',
      'orebody_fm',
      'work_type',
      'model',
      'alteration',
      'conc_proc',
      'names',
      'ore_ctrl',
      'reporter',
      'hrock_unit',
      'hrock_type',
      'arock_unit',
      'arock_type',
      'structure',
      'tectonic',
      'ref',
      'yfp_ba',
      'yr_fst_prd',
      'ylp_ba',
      'yr_lst_prd',
      'dy_ba',
      'disc_yr',
      'prod_yrs',
      'discr',
      'score'
    ]);
    $response->assertJsonIsObject();
  }
}
