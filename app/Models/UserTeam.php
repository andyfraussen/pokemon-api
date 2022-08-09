<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 *
 * @property ?\App\Models\User $user
 */

class UserTeam extends Model
{
    protected $fillable = ['team_id', 'user_id'];
    protected $table = "user_team";

    public function team(): HasMany
    {
        return $this->hasMany(Team::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
