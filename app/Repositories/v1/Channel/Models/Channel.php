<?php

namespace ArbaFilm\Repositories\v1\Channel\Models;

use ArbaFilm\Repositories\v1\Account\Models\User;
use ArbaFilm\Repositories\v1\Components\Models\GroupCountry;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $table = 'channels';
    public $incrementing = false;

    protected $guarded = [''];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function country()
    {
        return $this->belongsTo(GroupCountry::class, 'group_country_id');
    }
}
