<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SystemSettings
 *
 * @property int $id
 * @property string $key
 * @property string $value
 * @property string|null $meta
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SystemSettings newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SystemSettings newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SystemSettings query()
 * @method static \Illuminate\Database\Eloquent\Builder|SystemSettings whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemSettings whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemSettings whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemSettings whereMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemSettings whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemSettings whereValue($value)
 * @mixin \Eloquent
 */
class SystemSettings extends Model
{
    use HasFactory;

    protected $table = 'system_settings';

    protected $fillable = ['key', 'value', 'meta'];
}
