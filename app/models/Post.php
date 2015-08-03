<?php

class Post extends Main
{
  public function scopeActive($query)
  {
    return $query->whereActive(1);
  }

  /*public function comments()
  {
    return $this->hasMany('Comment');
  }*/
}