<?php

class TvSatellite extends Main
{

  const WARD = ['E', 'W'];

  public $timestamps = false;

  public function tvTransponders()
  {
   return $this->belongsTo('TvTransponder', 'id', 'satellite_id');
  }
}