<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\BalanceChanges
 *
 * @property int $id
 * @property int $user_id
 * @property string $type
 * @property string $amount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceChanges newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceChanges newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceChanges query()
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceChanges whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceChanges whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceChanges whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceChanges whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceChanges whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceChanges whereUserId($value)
 * @mixin \Eloquent
 */
class BalanceChanges extends Model
{
    use HasFactory;

    protected $table = 'balance_changes';

    protected $fillable = ['user_id', 'type', 'amount'];

    public function user(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
