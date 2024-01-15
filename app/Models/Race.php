<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Race
 *
 * @property string $id
 * @property string $name
 * @property string $description
 * @property string $example_surname
 * @property-read \App\Models\Subrace|null $subRace
 * @method static \Illuminate\Database\Eloquent\Builder|Race newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Race newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Race query()
 * @method static \Illuminate\Database\Eloquent\Builder|Race whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Race whereExampleSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Race whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Race whereName($value)
 * @mixin \Eloquent
 */
class Race extends Model
{
    use HasFactory, HasUuids;
    public $timestamps = false;

    protected $fillable = [
      'name', 'description', 'example_surname'
    ];

    public function subRace() {
        return $this->hasOne(Subrace::class);
    }
}
