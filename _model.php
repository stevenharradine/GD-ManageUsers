<?php
    require_once '../../config.php';
	require_once '../../global.php';

	class UserManager {
		public function getRecord ($id) {
			global $DB_ADDRESS;
			global $DB_USER;
			global $DB_PASS;
			global $DB_NAME;

			$link = DB_Connect($DB_ADDRESS, $DB_USER, $DB_PASS, $DB_NAME);
			
			$sql = <<<EOD
	SELECT *
	FROM `users`
	WHERE `USER_ID`='$id'
EOD;
			$data = mysqli_query($link, $sql) or die(mysqli_error());
			return mysqli_fetch_array( $data );
		}

		public function getAllRecords () {
			global $DB_ADDRESS;
			global $DB_USER;
			global $DB_PASS;
			global $DB_NAME;

			$link = DB_Connect($DB_ADDRESS, $DB_USER, $DB_PASS, $DB_NAME);

			$sql = <<<EOD
	SELECT *
	FROM `users`
EOD;
			$data = mysqli_query($link, $sql) or die(mysqli_error());
			$records = Array ();
			$index = 0;

			while (($users_row = mysqli_fetch_array( $data ) ) != null) {
				$records[$index]= Array();
				$records[$index]['user_type']= $users_row['user_type'];
				$records[$index]['username']= $users_row['username'];
				$records[$index]['USER_ID']= $users_row['USER_ID'];
				$index++;
			}

			return $records;
		}
	}
