<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Adventure
 *
 * @property string $id
 * @property string $name
 * @property string $abbreviation
 * @property string $text_color
 * @property string $bg_color
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Character> $characters
 * @property-read int|null $characters_count
 * @method static \Illuminate\Database\Eloquent\Builder|Adventure newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Adventure newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Adventure query()
 * @method static \Illuminate\Database\Eloquent\Builder|Adventure whereAbbreviation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adventure whereBgColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adventure whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adventure whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adventure whereTextColor($value)
 * @mixin \Eloquent
 */
class Adventure extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
      'name', 'abbreviation', 'text_color', 'bg_color'
    ];

    protected $casts = [
        'created_at' => 'datetime'
    ];

    public function characters() {
        return $this->belongsToMany(Character::class);
    }
}
