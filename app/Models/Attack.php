<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Attack
 *
 * @property string $id
 * @property string $name
 * @property string|null $description
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Character> $characters
 * @property-read int|null $characters_count
 * @method static \Illuminate\Database\Eloquent\Builder|Attack newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Attack newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Attack query()
 * @method static \Illuminate\Database\Eloquent\Builder|Attack whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attack whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attack whereName($value)
 * @mixin \Eloquent
 */
class Attack extends Model
{
    use HasFactory, HasUuids;
    public $timestamps = false;

    protected $fillable = [
      'name', 'description'
    ];

    public function characters() {
        return $this->belongsToMany(Character::class);
    }
}
