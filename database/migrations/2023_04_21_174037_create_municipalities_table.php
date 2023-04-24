<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('municipalities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('region_id');
            $table->float('sustainability')->nullable();
            $table->foreign('region_id')->references('id')->on('regions');
            $table->timestamps();
        });

        $regions = \Illuminate\Support\Facades\Config::get('athens.paths');
        foreach ($regions as $municipality)
        {
            $region = \App\Models\Region::query()->where('name', '=', 'Attiki')->first();
            $temp = new \App\Models\Municipality();
            $temp->fill([
                'name' => $municipality,
                'region_id' =>  $region->id,
                'sustainability' => mt_rand(0,500)/100
            ]);
            $temp->save();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('municipalities');
    }
};
