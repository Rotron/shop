<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Customer extends Main implements UserInterface, RemindableInterface 
{
    use UserTrait, RemindableTrait;

    protected $table = 'customers';

    protected $hidden = array('password', 'remember_token');
}