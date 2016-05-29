<?php
	class UserManager {
		public function getRecord ($id) {
			global $link;
			
			$sql = <<<EOD
	SELECT *
	FROM `users`
	WHERE `USER_ID`='$id'
EOD;
			$data = mysqli_query($link, $sql) or die(mysqli_error());
			return mysqli_fetch_array( $data );
		}

		public function getAllRecords () {
			global $link;

			$sql = <<<EOD
	SELECT *
	FROM `users`
EOD;
			$data = mysqli_query($link, $sql) or die(mysqli_error());

			return $data;
		}
	}