<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBioDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bio_data', function (Blueprint $table) {
            $table->id();
            $table->string('position');
            $table->string('name');
            $table->string('no_ktp');
            $table->string('ttl');
            $table->enum('gender', ['L', 'P']);
            $table->string('religion');
            $table->string('blood')->default('-');
            $table->string('status');
            $table->text('address_ktp')->nullable();
            $table->text('address')->nullable();
            $table->string('email');
            $table->string('no_telp');
            $table->string('close_person')->nullable();
            $table->boolean('can_work_all_company')->default(false);
            $table->string('expected_salary')->nullable();
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
        Schema::dropIfExists('bio_data');
    }
}
