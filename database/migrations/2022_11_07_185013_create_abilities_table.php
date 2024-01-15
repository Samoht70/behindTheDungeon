<?php

use App\Models\Ability;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abilities', function (Blueprint $table) {
            $table->uuid('id')->primary()->default(Str::uuid());
            $table->string('name', 191);
            $table->string('slug', 191);
            $table->unsignedInteger('order');
            $table->string('color', 191);
            $table->string('icon', 191);
        });
        Ability::insert([
            'id' => Str::uuid(),
            'name' => 'Force',
            'slug' => 'force',
            'order' => 1,
            'color' => '#ca8a04',
            'icon' => 'fa-fist-raised'
        ]);
        Ability::insert([
            'id' => Str::uuid(),
            'name' => 'Dextérité',
            'slug' => 'dexterite',
            'order' => 2,
            'color' => '#65a30d',
            'icon' => 'fa-dice'
        ]);
        Ability::insert([
            'id' => Str::uuid(),
            'name' => 'Constitution',
            'slug' => 'constitution',
            'order' => 3,
            'color' => '#2563eb',
            'icon' => 'fa-male'
        ]);
        Ability::insert([
            'id' => Str::uuid(),
            'name' => 'Intelligence',
            'slug' => 'intelligence',
            'order' => 4,
            'color' => '#dc2626',
            'icon' => 'fa-brain'
        ]);
        Ability::insert([
            'id' => Str::uuid(),
            'name' => 'Sagesse',
            'slug' => 'sagesse',
            'order' => 5,
            'color' => '#c026d3',
            'icon' => 'fa-book'
        ]);
        Ability::insert([
            'id' => Str::uuid(),
            'name' => 'Charisme',
            'slug' => 'charisme',
            'order' => 6,
            'color' => '#fbbf24',
            'icon' => 'fa-bolt'
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abilities');
    }
};
