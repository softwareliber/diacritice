<?php
	/**
	 * The StatusType class defined here contains
	 * code for the StatusType enumerated type.  It represents
	 * the enumerated values found in the "submit_word_status_type" table
	 * in the database.
	 * 
	 * To use, you should use the StatusType subclass which
	 * extends this StatusTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the StatusType class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 */
	abstract class StatusTypeGen extends QBaseClass {
		const Accepted = 1;
		const Pending = 2;
		const Rejected = 3;

		const MaxId = 3;

		public static $NameArray = array(
			1 => 'Accepted',
			2 => 'Pending',
			3 => 'Rejected');

		public static $TokenArray = array(
			1 => 'Accepted',
			2 => 'Pending',
			3 => 'Rejected');

		public static function ToString($intStatusTypeId) {
			switch ($intStatusTypeId) {
				case 1: return 'Accepted';
				case 2: return 'Pending';
				case 3: return 'Rejected';
				default:
					throw new QCallerException(sprintf('Invalid intStatusTypeId: %s', $intStatusTypeId));
			}
		}

		public static function ToToken($intStatusTypeId) {
			switch ($intStatusTypeId) {
				case 1: return 'Accepted';
				case 2: return 'Pending';
				case 3: return 'Rejected';
				default:
					throw new QCallerException(sprintf('Invalid intStatusTypeId: %s', $intStatusTypeId));
			}
		}

	}
?>