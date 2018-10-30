<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.0 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.0 | https://it.phpanonymous.com]
class Setting extends Model {
	

protected $table    = 'settings';
protected $fillable = [

	'id', 
	'admin_id',
	'sitename',
	'site_description', 
	'site_header_text', 
	'site_header_description', 
	'site_header_background',
	'site_status',
	'site_logo',
	'keywords',
	'maintenence_message',
	'site_email',
	'site_facebook',
	'site_twitter',
	'site_googleplus',
	'site_phone',
	'site_address',
	'site_footer_text'
	];

}
