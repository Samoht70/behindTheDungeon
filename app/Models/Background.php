<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Background
 *
 * @property string $id
 * @property string $name
 * @property string $description
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Character> $characters
 * @property-read int|null $characters_count
 * @method static \Illuminate\Database\Eloquent\Builder|Background newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Background newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Background query()
 * @method static \Illuminate\Database\Eloquent\Builder|Background whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Background whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Background whereName($value)
 * @mixin \Eloquent
 */
class Background extends Model
{
    use HasFactory, HasUuids;
    public $timestamps = false;

    protected $fillable = [
      'name', 'description'
    ];

    public function characters() {
        return $this->hasMany(Character::class);
    }
}
