<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MineralResourceDataSystem extends Model
{
  use HasFactory;

  protected $fillable = [
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
  ];
}
