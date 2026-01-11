<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    const NOT_STARTED = 'not_started';
    const IN_PROGRESS = 'in_progress';
    const COMPLETED = 'completed';
}
