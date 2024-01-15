<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Alignment
 *
 * @property string $id
 * @property string $name
 * @property string $abbreviation
 * @property string $description
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Character> $characters
 * @property-read int|null $characters_count
 * @method static \Illuminate\Database\Eloquent\Builder|Alignment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Alignment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Alignment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Alignment whereAbbreviation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Alignment whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Alignment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Alignment whereName($value)
 * @mixin \Eloquent
 */
class Alignment extends Model
{
    use HasFactory, HasUuids;
    public $timestamps = false;

    public function characters() {
        return $this->hasMany(Character::class);
    }
}
