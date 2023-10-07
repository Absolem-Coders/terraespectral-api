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

      $table->integer('dep_id')->nullable();
      $table->string('url')->nullable();
      $table->string('mrds_id')->nullable();
      $table->string('mas_id')->nullable();
      $table->string('commod')->nullable();
      $table->string('site_name')->nullable();
      $table->integer('latitude')->nullable();
      $table->integer('longitude')->nullable();
      $table->string('region', 4)->nullable();
      $table->string('country')->nullable();
      $table->string('state')->nullable();
      $table->string('county')->nullable();
      $table->string('com_type')->nullable();
      $table->string('commod1')->nullable();
      $table->string('commod2')->nullable();
      $table->string('commod3')->nullable();
      $table->string('oper_type')->nullable();
      $table->string('dep_type')->nullable();
      $table->string('prod_size')->nullable();
      $table->string('dev_stat')->nullable();
      $table->string('ore')->nullable();
      $table->string('gangue')->nullable();
      $table->string('orebody_fm')->nullable();
      $table->string('work_type')->nullable();
      $table->string('model')->nullable();
      $table->string('alteration')->nullable();
      $table->string('conc_proc')->nullable();
      $table->string('names')->nullable();
      $table->string('reporter')->nullable();
      $table->string('hrock_unit')->nullable();
      $table->string('hrock_type')->nullable();
      $table->string('arock_unit')->nullable();
      $table->string('arock_type')->nullable();
      $table->string('structure')->nullable();
      $table->string('ref')->nullable();
      $table->string('yfp_ba')->nullable();
      $table->string('yr_fst_prd')->nullable();
      $table->string('ylp_ba')->nullable();
      $table->string('yr_lst_prd')->nullable();
      $table->string('dy_ba')->nullable();
      $table->string('disc_yr')->nullable();
      $table->string('prod_yrs')->nullable();
      $table->string('discr')->nullable();
      $table->string('score')->nullable();
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
