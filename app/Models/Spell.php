<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Spell
 *
 * @property string $id
 * @property string $name
 * @property string $slug
 * @property string $school_id
 * @property string $level_id
 * @property int $is_rituel
 * @property string $cast_time
 * @property string $range
 * @property string $component
 * @property string $duration
 * @property string $description
 * @property string|null $upper_lvl
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Category> $categories
 * @property-read int|null $categories_count
 * @property-read \App\Models\Level|null $level
 * @property-read \App\Models\School|null $school
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Tag> $tags
 * @property-read int|null $tags_count
 * @method static \Illuminate\Database\Eloquent\Builder|Spell newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Spell newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Spell query()
 * @method static \Illuminate\Database\Eloquent\Builder|Spell whereCastTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spell whereComponent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spell whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spell whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spell whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spell whereIsRituel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spell whereLevelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spell whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spell whereRange($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spell whereSchoolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spell whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spell whereUpperLvl($value)
 * @mixin \Eloquent
 */
class Spell extends Model
{
    use HasFactory, HasUuids;

    public $timestamps = false;

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'spell_tag');
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_spell');
    }
}
