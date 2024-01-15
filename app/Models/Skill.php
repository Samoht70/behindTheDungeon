<?php

namespace App\Models;

use App\Trait\CalculatesModifier;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Skill
 *
 * @property string $id
 * @property string $name
 * @property string $ability_id
 * @property-read \App\Models\Ability|null $ability
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Character> $characters
 * @property-read int|null $characters_count
 * @method static \Illuminate\Database\Eloquent\Builder|Skill newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Skill newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Skill query()
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereAbilityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereName($value)
 * @mixin \Eloquent
 */
class Skill extends Model
{
    use HasFactory, HasUuids;

    public $timestamps = false;

    public function ability() {
        return $this->belongsTo(Ability::class);
    }

    // Many-to-many polymorphic relationships
    public function characters()
    {
        return $this->morphToMany(Character::class, 'charactable');
    }

    public function modifierSkill(Ability $ability, $hero)
    {
        $modifier = $ability->modifierAbility();

        if ($this->pivot->other_modifier_skill && $this->pivot->is_proficient) {
            return $modifier + $this->pivot->other_modifier_skill + $hero->proficiency_bonus;
        } elseif ($this->pivot->other_modifier_skill) {
            return $modifier + $this->pivot->other_modifier_skill;
        } elseif ($this->pivot->is_proficient) {
            return $modifier + $hero->proficiency_bonus;
        }
        return $modifier;
    }
}
