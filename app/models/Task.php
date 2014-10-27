<?php

class Task extends Eloquent {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */

	protected $table = 'tasks';

	//mass assignment 
	protected $fillable = ['name', 'priority', 'status'];
}