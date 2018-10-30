<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.0 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.0 | https://it.phpanonymous.com]
class Building extends Model {
	use SoftDeletes;
	protected $dates = ['deleted_at'];

protected $table    = 'buildings';
protected $fillable = [
		'id',
		'ad_description',
		'ad_main_photo',
		'ad_other_photo',
		'ad_room_count',
		'ad_space', 
		'ad_kitchen_count',
		'ad_bathroom_count',
		'ad_reseption_count',
		'ad_town',
		'ad_owner_phone',
		'ad_price',
		'ad_sort',
		'ad_status', 
		'ad_title',
		'ad_furnished',
		'ad_keywords',
		'ad_owner',
		'created_at',
		'updated_at',
		'deleted_at',
	];

	// get the owner of the advertise
	public function adOwner(){
		return $this->hasOne('App\User', 'id', 'ad_owner');
	}

}
