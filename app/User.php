<?php

namespace Furbook;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    //protected $table = 'users';
    //protected $fillable = ['name', 'email', 'password'];
    //protected $hidden = ['password', 'remember_token'];

    protected $casts = ['is_admin' => 'boolean'];

    public function cats() {
      return $this->hasMany('Furbook\Cat');
    }

    public function owns(Cat $cat) {
      return $this->id == $cat->user_id;
    }

    public function canEdit(Cat $cat) {
      return $this->is_admin || $this->owns($cat);
    }

    public function isAdministrator() {
      return $this->getAttribute('is_admin');
    }
}
