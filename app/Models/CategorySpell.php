<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CategorySpell
 *
 * @property string $spell_id
 * @property string $category_id
 * @method static \Illuminate\Database\Eloquent\Builder|CategorySpell newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategorySpell newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategorySpell query()
 * @method static \Illuminate\Database\Eloquent\Builder|CategorySpell whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategorySpell whereSpellId($value)
 * @mixin \Eloquent
 */
class CategorySpell extends Model
{
    use HasFactory;

    protected $table = 'category_spell';
}
