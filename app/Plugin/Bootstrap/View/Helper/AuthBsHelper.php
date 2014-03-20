<?php
/**
 * Created by PhpStorm.
 * User: humberto
 * Date: 13/01/14
 * Time: 10:15
 */
App::uses('AppHelper', 'View/Helper');

class AuthBsHelper extends AppHelper {

	public function brdate( $date = null ) {
		return $date;
	}

	public function hasPerm( $what = null, $perms = null ) {
		if (isset($perms[$this->params['controller']][$this->params['action']][$what])) return true;
		else return false;
	}
}
