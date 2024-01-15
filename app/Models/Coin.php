<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Coin
 *
 * @property string $id
 * @property string $name
 * @property string $abbreviation
 * @property string $coin_path
 * @property-read \App\Models\Character|null $characters
 * @method static \Illuminate\Database\Eloquent\Builder|Coin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Coin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Coin query()
 * @method static \Illuminate\Database\Eloquent\Builder|Coin whereAbbreviation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coin whereCoinPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coin whereName($value)
 * @mixin \Eloquent
 */
class Coin extends Model
{
    use HasFactory, HasUuids;
    public $timestamps = false;

    public function characters() {
        return $this->hasOne(Character::class);
    }
}
