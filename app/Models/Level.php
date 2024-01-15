<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Level
 *
 * @property string $id
 * @property int $level_name
 * @property string $background_color
 * @property string $text_color
 * @method static \Illuminate\Database\Eloquent\Builder|Level newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Level newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Level query()
 * @method static \Illuminate\Database\Eloquent\Builder|Level whereBackgroundColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Level whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Level whereLevelName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Level whereTextColor($value)
 * @mixin \Eloquent
 */
class Level extends Model
{
    use HasFactory, HasUuids;
}
