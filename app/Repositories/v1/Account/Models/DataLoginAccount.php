<?php

namespace ArbaFilm\Repositories\v1\Account\Models;

use Illuminate\Database\Eloquent\Model;

class DataLoginAccount extends Model
{
    protected $table = 'data_login_accounts';
    protected $guarded = [''];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
