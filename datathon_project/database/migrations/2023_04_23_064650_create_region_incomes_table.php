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
        Schema::create('region_incomes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('municipality_id');
            $table->integer('year');
            $table->integer('income'); // ΚΑΤΑ ΚΕΦΑΛΗΝ ΕΙΣΟΔΗΜΑ
            $table->timestamps();
            $table->foreign('municipality_id')->references('id')->on('municipalities');
        });

        $data = \Illuminate\Support\Facades\File::get('region_income.json');
        $data = json_decode($data);
        foreach($data as $region_income){
            $municipality = \App\Models\Municipality::query()->where('name', '=', $region_income->municipality)->first();
            $income = new \App\Models\RegionIncome();
            $income->fill([
                'year' => $region_income->year,
                'income' => $region_income->income,
                'municipality_id' => $municipality->id
            ]);
            $income->save();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('region_incomes');
    }
};
