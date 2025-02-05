<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            // $table->uuid('id')->primary()->default(DB::raw('UUID()'));
            $table->uuid('id')->default(DB::raw('(UUID())'));
            $table->string('name');
            $table->string('slug')->unique();
            $table->timestamp('startAt');
            $table->timestamp('endAt');
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
        Schema::dropIfExists('events');
    }
}
