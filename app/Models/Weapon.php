<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Weapon
 *
 * @property string $id
 * @property string $name
 * @property int $atk_bonus
 * @property string $damage_type
 * @property string|null $sub_info
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Character> $characters
 * @property-read int|null $characters_count
 * @method static \Illuminate\Database\Eloquent\Builder|Weapon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Weapon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Weapon query()
 * @method static \Illuminate\Database\Eloquent\Builder|Weapon whereAtkBonus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Weapon whereDamageType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Weapon whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Weapon whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Weapon whereSubInfo($value)
 * @mixin \Eloquent
 */
class Weapon extends Model
{
    use HasFactory, HasUuids;
    public $timestamps = false;

    protected $fillable = [
      'name', 'atk_bonus', 'damage_type', 'sub_info'
    ];

    public function characters() {
        return $this->belongsToMany(Character::class);
    }

    public function fullDescription() {
        return "Bonus d'attaque : +$this->atk_bonus, Type de dommage : $this->damage_type";
    }

    public static function getWeaponIdByInfos(string $infos) {
        $explodeData = explode(' | ', $infos);
        return Weapon::query()
            ->where('name', $explodeData[0])
            ->where('atk_bonus', $explodeData[1])
            ->where('damage_type', $explodeData[2])
            ->first()
            ->getKey();
    }
}
