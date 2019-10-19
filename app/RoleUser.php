<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    /**
     * Get the user of the role_user.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the role of the role_user.
     */
    public function role()
    {
        return $this->belongsTo('App\Role');
    }
}
