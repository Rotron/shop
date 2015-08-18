<?php

class TvChannel extends Main
{
  public $timestamps = false;
  public function scopeActive($query)
  {
    return $query->whereActive(1);
  }
}
