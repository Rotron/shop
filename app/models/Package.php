<?php

class Package extends Main
{
  public function scopeActive($query)
  {
    return $query->whereActive(1);
  }
}