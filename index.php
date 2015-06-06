<?php
	require_once '../../views/_secureHead.php';
	require_once '../../models/_header.php';
	require_once '../../models/_add.php';
	require_once '../../models/_table.php';
	require_once $relative_base_path . 'auth/_model.php';

	if( isset ($sessionManager) && $sessionManager->getUserType() == 'ADMIN' ) {
		require_once 'usertypes.php';

		$id = request_isset ("id");
		$user_type = request_isset ("user_type");
		$username = request_isset ("username");
		$new_password = request_isset ("new_password");
		$password = request_isset ("password");

		$userManager = new UserManager ();
		$authManager = new AuthManager();
		
		switch ($page_action) {
			case ('update_by_id') :
				//$db_update_success = $userManager->updateRecord ($id, $user_type, $username, $password);
				$db_update_success = $authManager->updateRecord (
					$id,			// user id
					$user_type,		// user type
					$username,		// user name
					$new_password	// new password (if any)
				);
				break;
			case "add_user" :
				//$userManager->addRecord($user_type, $username, $password);
				$db_add_success = $authManager->addUser ($user_type, $username, $password);
				break;
			case "delete_by_id" :
				//$userManager->deleteRecord ($id);
				$db_delete_success = $authManager->deleteUser ($id);
				break;
		}
		
		$users_data = $userManager->getAllRecords();

		$page_title = 'Manage users';
		$alt_menu = '<a href="#" class="add">Add</a>';

		$addView = new AddView ('Add', 'add_user');
		$addView->addOptionBox ('user_type', 'User type', $usertype_options);
		$addView->addRow ('username', 'Username', null, 'eg. Neil');
		$addView->addRow ('password', 'Password', null, 'eg. Sm4rtH0uSe');


		$tableView = new TableView ( array ('View', '') );

		while (($users_row = mysql_fetch_array( $users_data ) ) != null) {
			$tableView->addRow ( array (
				TableView::createCell ('user_type', $users_row['user_type'] ),
				TableView::createCell ('username', $users_row['username'] ),
				TableView::createEdit ($users_row['USER_ID']),
			));
		}

		$views_to_load = array();
		$views_to_load[] = '../../views/_add.php';
		$views_to_load[] = '../../views/_table.php';
		
		include '../../views/_generic.php';
	}
?>
