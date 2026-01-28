<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Status extends Model
{
    const NOT_STARTED = 'not_started';

    const IN_PROGRESS = 'in_progress';

    const COMPLETED = 'completed';

    public function todos(): HasMany
    {
        return $this->hasMany(Todo::class);
    }

    public static function getIdFromName(string $name): int
    {
        $status = Status::where('name', $name)->first();

        return $status ? $status->id : 0;
    }
}
