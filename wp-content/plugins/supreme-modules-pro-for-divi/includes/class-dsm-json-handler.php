<?php
/**
 * Prevent direct access to files.
 *
 * @package    Dsm_Supreme_Modules_Pro_For_Divi
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! class_exists( 'DSM_JSON_Handler' ) ) {
	/**
	 * JSON class.
	 *
	 * This class defines all code necessary to allow JSON file upload.
	 *
	 * @since      2.7.2
	 * @package    Dsm_Supreme_Modules_Pro_For_Divi
	 * @subpackage Dsm_Supreme_Modules_Pro_For_Divi/includes
	 */
	class DSM_JSON_Handler {
		const MIME_TYPE = 'application/json';

		/**
		 * Add JSON to allowed file uploads.
		 *
		 * @since 2.7.2
		 * @param string $mimes Mimes.
		 */
		public function dsm_mime_types( $mimes ) {
			$mimes['json'] = 'application/json';
			return $mimes;
		}
		/**
		 * Add JSON to wp_check_filetype_and_ext.
		 *
		 * @since 2.7.2
		 * @param string $types Types.
		 * @param string $file File.
		 * @param string $filename File name.
		 * @param string $mimes Mimes.
		 */
		public function dsm_check_filetype_and_ext( $types, $file, $filename, $mimes ) {
			if ( false !== strpos( $filename, '.json' ) ) {
				$types['ext']  = 'json';
				$types['type'] = self::MIME_TYPE;
			}

			return $types;
		}

		/**
		 * DSM_JSON_Handler constructor.
		 */
		public function __construct() {
			add_filter( 'upload_mimes', array( $this, 'dsm_mime_types' ) );
			add_filter( 'wp_check_filetype_and_ext', array( $this, 'dsm_check_filetype_and_ext' ), 10, 4 );
		}
	}
}
