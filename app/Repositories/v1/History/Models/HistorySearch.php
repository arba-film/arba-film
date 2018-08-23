<?php

namespace ArbaFilm\Repositories\v1\History\Models;

use ArbaFilm\Repositories\v1\Account\Models\User;
use Illuminate\Database\Eloquent\Model;

class HistorySearch extends Model
{
    protected $table = 'history_searches';
    protected $guarded = [''];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}