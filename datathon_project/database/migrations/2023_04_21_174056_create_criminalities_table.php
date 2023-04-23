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
        Schema::create('criminalities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('region_id');
            $table->integer('year');
            $table->integer('homicide'); // ΑΝΘΡΩΠΟΚΤΟΝΙΑ
            $table->integer('break_in'); // ΔΙΑΡΡΗΞΗ
            $table->integer('joyriding'); // ΚΛΟΠΗ ΑΥΤΟΚΙΝΗΤΟΥ
            $table->integer('heist'); // ΛΗΣΤΕΙΑ
            $table->timestamps();
            $table->foreign('region_id')->references('id')->on('regions');
        });

        $data = \Illuminate\Support\Facades\File::get('criminality.json');
        $data = json_decode($data);
        //dump($data);
        foreach($data as $item){
            $regionID = \App\Models\Region::query()->where('name', '=', $item->region_name)->first()->id;
            $criminality = new \App\Models\Criminality();
            $criminality->fill([
                'region_id' => $regionID,
                'year' => $item->year,
                'homicide' => $item->homicide,
                'break_in' => $item->break_in,
                'joyriding' => $item->joyriding,
                'heist' => $item->heist,
            ]);

            $criminality->save();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('criminalities');
    }
};
