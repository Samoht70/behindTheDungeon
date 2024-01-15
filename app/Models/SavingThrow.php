<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SavingThrow
 *
 * @property string $id
 * @property string $name
 * @property string $ability_id
 * @property-read Ability|null $ability
 * @property-read Collection<int, Character> $characters
 * @property-read int|null $characters_count
 * @method static Builder|SavingThrow newModelQuery()
 * @method static Builder|SavingThrow newQuery()
 * @method static Builder|SavingThrow query()
 * @method static Builder|SavingThrow whereAbilityId($value)
 * @method static Builder|SavingThrow whereId($value)
 * @method static Builder|SavingThrow whereName($value)
 * @mixin Eloquent
 */
class SavingThrow extends Model
{
    use HasFactory, HasUuids;

    public $timestamps = false;

    public function characters()
    {
        return $this->morphToMany(Character::class, 'charactable');
    }

    public function ability() {
        return $this->belongsTo(Ability::class);
    }

    public function modifierSavingThrow($ability, $hero) {
        $modifier = $ability->modifierAbility();

        if ($this->pivot->other_modifier_throw && $this->pivot->is_proficient) {
            return $modifier + $this->pivot->other_modifier_throw + $hero->proficiency_bonus;
        } elseif ($this->pivot->other_modifier_skill) {
            return $modifier + $this->pivot->other_modifier_throw;
        } elseif ($this->pivot->is_proficient) {
            return $modifier + $hero->proficiency_bonus;
        }

        return $modifier;
    }
}
