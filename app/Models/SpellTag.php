<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SpellTag
 *
 * @property string $spell_id
 * @property string $tag_id
 * @method static \Illuminate\Database\Eloquent\Builder|SpellTag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SpellTag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SpellTag query()
 * @method static \Illuminate\Database\Eloquent\Builder|SpellTag whereSpellId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpellTag whereTagId($value)
 * @mixin \Eloquent
 */
class SpellTag extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'spell_tag';
}
