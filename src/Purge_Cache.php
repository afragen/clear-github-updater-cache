<?php

use Fragen\GitHub_Updater\Base as GHU;


/**
 * Class Purge_Cache
 */
class Purge_Cache extends GHU {

	/**
	 * Purge_Cache constructor.
	 */
	public function __construct() {
		if ( isset( $_GET['force-check'] ) ) {
			$this->delete_all_cached_data();
		}
	}

}
