<?php

namespace Etherbase\App\Models;

use Illuminate\Database\Eloquent\Model;

class UserMeta extends Model {

    protected $fillable = ['user_id', 'meta_key', 'meta_value'];

}
