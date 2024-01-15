<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Character
 *
 * @property string $id
 * @property string $category_id
 * @property string $subrace_id
 * @property string $background_id
 * @property string $alignment_id
 * @property string $goal_id
 * @property string|null $character_past
 * @property int $passive_wisdom
 * @property int $proficiency_bonus
 * @property int $armor_class
 * @property int $initiative
 * @property string $speed
 * @property int $maximum_hp
 * @property string $hit_dice
 * @property string $equipment
 * @property string $personality_traits
 * @property string $ideals
 * @property string $bonds
 * @property string $flaws
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Ability> $abilities
 * @property-read int|null $abilities_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Adventure> $adventures
 * @property-read int|null $adventures_count
 * @property-read \App\Models\Alignment|null $alignment
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Attack> $attacks
 * @property-read int|null $attacks_count
 * @property-read \App\Models\Background|null $background
 * @property-read \App\Models\Category|null $category
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Coin> $coins
 * @property-read int|null $coins_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Feature> $features
 * @property-read int|null $features_count
 * @property-read \App\Models\Goal|null $goal
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SavingThrow> $savingThrows
 * @property-read int|null $saving_throws_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Skill> $skills
 * @property-read int|null $skills_count
 * @property-read \App\Models\Subrace|null $subrace
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Utility> $utilities
 * @property-read int|null $utilities_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Weapon> $weapons
 * @property-read int|null $weapons_count
 * @method static \Illuminate\Database\Eloquent\Builder|Character newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Character newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Character query()
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereAlignmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereArmorClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereBackgroundId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereBonds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereCharacterPast($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereEquipment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereFlaws($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereGoalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereHitDice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereIdeals($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereInitiative($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereMaximumHp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character wherePassiveWisdom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character wherePersonalityTraits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereProficiencyBonus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereSpeed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereSubraceId($value)
 * @mixin \Eloquent
 */
class Character extends Model
{
    use HasFactory, HasUuids;

    public $timestamps = false;

    protected $fillable = [
        'category_id',
        'background_id',
        'subrace_id',
        'alignment_id',
        'goal_id',
        'passive_wisdom',
        'proficiency_bonus',
        'armor_class',
        'initiative',
        'speed',
        'maximum_hp',
        'hit_dice',
        'personality_traits',
        'ideals',
        'bonds',
        'flaws',
        'character_past',
        'equipment'
    ];

    // One-to-one relationships
    public function goal()
    {
        return $this->belongsTo(Goal::class);
    }

    // Belongs to relationships
    public function subrace()
    {
        return $this->belongsTo(Subrace::class);
    }

    public function alignment()
    {
        return $this->belongsTo(Alignment::class);
    }

    public function background()
    {
        return $this->belongsTo(Background::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Many-to-many relationships
    public function adventures()
    {
        return $this->belongsToMany(Adventure::class);
    }

    public function coins()
    {
        return $this->belongsToMany(Coin::class)
            ->withPivot('quantity');
    }

    public function features()
    {
        return $this->belongsToMany(Feature::class);
    }

    public function attacks()
    {
        return $this->belongsToMany(Attack::class)
            ->withPivot('other_description');
    }

    public function weapons()
    {
        return $this->belongsToMany(Weapon::class);
    }

    public function utilities()
    {
        return $this->belongsToMany(Utility::class)
            ->withPivot('description');
    }

    // Many-to-many polymorphic relationships
    public function abilities()
    {
        return $this->morphedByMany(Ability::class, 'charactable')
            ->withPivot('ability_value', 'other_modifier_ability')
            ->orderBy('order');
    }

    public function skills()
    {
        return $this->morphedByMany(Skill::class, 'charactable')
            ->withPivot('is_proficient', 'other_modifier_skill')
            ->join('abilities', 'abilities.id', 'skills.ability_id')
            ->orderBy('abilities.order');
    }

    public function savingThrows()
    {
        return $this->morphedByMany(SavingThrow::class, 'charactable')
            ->withPivot('is_proficient', 'other_modifier_throw');
    }

    public function getRelations(): array
    {
        return [
            'abilities',
            'skills',
            'savingThrows',
            'coins',
            'adventures',
            'attacks',
            'utilities',
            'features',
            'weapons'
        ];
    }
}
