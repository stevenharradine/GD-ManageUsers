<?php
	class UserManager {
		public function getRecord ($id) {
			$sql = <<<EOD
	SELECT *
	FROM `users`
	WHERE `USER_ID`='$id'
EOD;
			$data = mysql_query($sql) or die(mysql_error());
			return mysql_fetch_array( $data );
		}

		public function getAllRecords () {
			$sql = <<<EOD
	SELECT *
	FROM `users`
EOD;
			$data = mysql_query($sql) or die(mysql_error());

			return $data;
		}
	}