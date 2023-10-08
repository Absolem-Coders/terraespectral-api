<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('mineral_resource_data_systems', function (Blueprint $table) {
      $table->id();
      $table->timestamps();

      $table->text('dep_id')->nullable();
      $table->text('url')->nullable()->unique();
      $table->text('mrds_id')->nullable();
      $table->text('mas_id')->nullable();
      $table->text('site_name')->nullable();
      $table->double('latitude')->nullable();
      $table->double('longitude')->nullable();
      $table->text('region')->nullable();
      $table->text('country')->nullable();
      $table->text('state')->nullable();
      $table->text('county')->nullable();
      $table->text('com_type')->nullable();
      $table->text('commod')->nullable();
      $table->text('commod1')->nullable();
      $table->text('commod2')->nullable();
      $table->text('commod3')->nullable();
      $table->text('oper_type')->nullable();
      $table->text('dep_type')->nullable();
      $table->text('prod_size')->nullable();
      $table->text('dev_stat')->nullable();
      $table->text('ore')->nullable();
      $table->text('gangue')->nullable();
      $table->text('other_matl')->nullable();
      $table->text('orebody_fm')->nullable();
      $table->text('work_type')->nullable();
      $table->text('model')->nullable();
      $table->text('alteration')->nullable();
      $table->text('conc_proc')->nullable();
      $table->text('names')->nullable();
      $table->text('ore_ctrl')->nullable();
      $table->text('reporter')->nullable();
      $table->text('hrock_unit')->nullable();
      $table->text('hrock_type')->nullable();
      $table->text('arock_unit')->nullable();
      $table->text('arock_type')->nullable();
      $table->text('structure')->nullable();
      $table->text('tectonic')->nullable();
      $table->text('ref')->nullable();
      $table->text('yfp_ba')->nullable();
      $table->text('yr_fst_prd')->nullable();
      $table->text('ylp_ba')->nullable();
      $table->text('yr_lst_prd')->nullable();
      $table->text('dy_ba')->nullable();
      $table->text('disc_yr')->nullable();
      $table->text('prod_yrs')->nullable();
      $table->text('discr')->nullable();
      $table->text('score')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('mineral_resource_data_systems');
  }
};
