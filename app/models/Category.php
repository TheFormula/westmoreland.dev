<?php

class Category extends \Eloquent {
	protected $fillable = ['name'];

	public function projects()
    {
    	return $this->hasMany('Project');
    }
}