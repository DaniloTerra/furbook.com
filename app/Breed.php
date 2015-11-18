<?php

namespace Furbook;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    public $timestamps = false;

    public function cats()
    {
      return $this->hasMany('Furbook\Cat');
    }
}

/*
OneToOne
  Separar dados de uma mesma entidade em tabelas diferentes por motivos de organização.
OneToMany
ManyToMany

*/
