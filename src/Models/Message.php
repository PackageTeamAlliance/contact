<?php

namespace Pta\Contact\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';

    protected $fillable = [
          'first_name',
          'last_name',
          'email',
          'subject',
          'message',
          'phone',
          'type',
        ];
}
