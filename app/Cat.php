<?php

namespace Furbook;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
  protected $table    = 'cats';
  protected $fillable = ['name', 'date_of_birth', 'breed_id'];

  public function breed()
  {
    return $this->belongsTo('Furbook\Breed');
  }

  public function scopeDomestics($query)
  {
    return $query->where('breed_id', '=', '1');
  }

  public function scopeOfBreed($query, $breedId)
  {
    return $query->where('breed_id', '=', $breedId);
  }
}
