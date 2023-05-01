<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Projects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('client_id');
            $table->string('directeur_id');
            $table->string('chef_conception_id');
            $table->string('chef_des_id');
            $table->string('chef_dev_id');
            $table->string('chef_test_id');
            $table->string('description');
            $table->string('date_debut');
            $table->string('date_fin');
            $table->string('statut_payement');
            $table->string('statut');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
         Schema::dropIfExists('projects');
    }
}
