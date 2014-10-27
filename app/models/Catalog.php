<?php

class Catalog extends Eloquent {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'lists';

	//mass assignment 
	protected $fillable = ['name'];

	public function user() {
        return $this->belongsTo('User');
    }

    public function tasks() {
        return $this->hasMany('Task');
    }
}