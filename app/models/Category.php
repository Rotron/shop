<?php
use Baum\Node;

class Category extends Node {

    protected $table = 'categories';

    public function scopeActive($query)
    {
      return $query->whereActive(1);
    }

  public function products()
  {
    return $this->belongsToMany('Product', 'products_categories');
  }
}