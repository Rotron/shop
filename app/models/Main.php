<?php

class Main extends Eloquent{
	public static function toDate($strDate){
		return date('Y-m-d H:i:s', strtotime($strDate));
	}

}