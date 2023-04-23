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
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('region')->nullable();
            $table->string('management')->nullable();
            $table->string('district')->nullable();
            $table->string('municipality')->nullable();
            $table->string('commune')->nullable();
            $table->string('school')->nullable();
            $table->string('type')->nullable();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('zip_code')->nullable();
            $table->timestamps();
        });

        $data = \Illuminate\Support\Facades\File::get('schools.json');
        $data = json_decode($data, true);
        foreach($data as $item){
            $school = new \App\Models\School();
            $school->fill([
                'region' => $item['region'] ?? null,
                'management' => $item['management'] ?? null,
                'district' => $item['district'] ?? null,
                'municipality'=> $item['municipality'] ?? null,
                'commune'=> $item['commune'] ?? null,
                'school'=> $item['school'] ?? null,
                'type'=> $item['type'] ?? null,
                'name'=> $item['name'] ?? null,
                'phone'=> $item['phone'] ?? null,
                'fax'=> $item['fax'] ?? null,
                'email'=> $item['email'] ?? null,
                'address'=> $item['address'] ?? null,
                'zip_code'=> $item['zip_code'] ?? null,
            ]);
            $school->save();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schools');
    }
};
