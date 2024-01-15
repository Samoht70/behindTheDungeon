<?php

namespace App\Models;

use App\Trait\CalculatesModifier;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Ability
 *
 * @property string $id
 * @property string $name
 * @property string $slug
 * @property string $color
 * @property string $icon
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Character> $characters
 * @property-read int|null $characters_count
 * @property-read \App\Models\SavingThrow|null $savingThrow
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Skill> $skills
 * @property-read int|null $skills_count
 * @method static \Illuminate\Database\Eloquent\Builder|Ability newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ability newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ability query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ability whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ability whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ability whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ability whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ability whereSlug($value)
 * @mixin \Eloquent
 */
class Ability extends Model
{
    use HasFactory, HasUuids;

    public $timestamps = false;

    protected $fillable = [
        'charactable_id',
    ];

    protected $appends = [
        'modifier_ability'
    ];

    // One-to-many polymorphic relationships
    public function skills()
    {
        return $this->hasMany(Skill::class);
    }

    // One-to-one relationships
    public function savingThrow()
    {
        return $this->hasOne(SavingThrow::class);
    }

    // Many-to-many polymorphic relationships
    public function characters()
    {
        return $this->morphToMany(Character::class, 'charactable');
    }

    public function modifierAbility(): Attribute
    {
        $modifier = round(
            ($this->pivot->ability_value - 10) / 2,
            mode: $this->pivot->ability_value >= 10 ? PHP_ROUND_HALF_DOWN : PHP_ROUND_HALF_UP
        ) + $this->pivot->other_modifier_ability ?? 0;

        return Attribute::get(
            fn() => $modifier
        );
    }
}
