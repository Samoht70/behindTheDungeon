<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Subrace
 *
 * @property string $id
 * @property string|null $name
 * @property string $description
 * @property int $is_after
 * @property string $race_id
 * @property-read Collection<int, Character> $characters
 * @property-read int|null $characters_count
 * @property-read Race|null $race
 * @method static Builder|Subrace newModelQuery()
 * @method static Builder|Subrace newQuery()
 * @method static Builder|Subrace query()
 * @method static Builder|Subrace whereDescription($value)
 * @method static Builder|Subrace whereId($value)
 * @method static Builder|Subrace whereIsAfter($value)
 * @method static Builder|Subrace whereName($value)
 * @method static Builder|Subrace whereRaceId($value)
 * @mixin Eloquent
 */
class Subrace extends Model
{
    use HasFactory, HasUuids;
    public $timestamps = false;

    protected $fillable = [
      'name', 'description', 'is_after', 'race_id'
    ];

    protected $appends = [
        'full_name'
    ];

    public function race()
    {
        return $this->belongsTo(Race::class);
    }
    public function characters()
    {
        return $this->hasMany(Character::class);
    }

    public function fullName(): Attribute {
        return Attribute::get(
            fn () => $this->is_after ? "{$this->race->name} $this->name" : "$this->name {$this->race->name}"
        );
    }
}
