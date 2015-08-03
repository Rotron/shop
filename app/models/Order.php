<?php

class Order extends Main
{
  public function ordersDetails()
  {
    return $this->hasMany('OrderDetails');
  }
}
