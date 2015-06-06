<?php
	require_once '../../views/_secureHead.php';
	require_once '../../models/_edit.php';

	if( isset ($sessionManager) && $sessionManager->getUserType() == 'ADMIN' ) {
		require_once 'usertypes.php';
		
		$id = request_isset ('id');

		$userManager = new UserManager ();
		
		$record = $userManager->getRecord ($id);

		$page_title = 'Edit | Manage users';

		// build edit view
		$editView = new EditView ('Edit', 'update_by_id', $id);
		$editView->addOptionBox ('user_type', 'User type', $usertype_options, $record['user_type']);
		$editView->addRow ('username', 'Username', $record['username']);
		$editView->addRow ('salt', 'Salt (base64 encoded)', $record['salt'], 'disabled="disabled"');
		$editView->addRow ('hash_algorithm', 'Hash algorithm', $record['hash_algorithm'], 'disabled="disabled"');
		$editView->addRow ('hash', 'Hash', $record['password'], 'disabled="disabled"');
		$editView->addRow ('new_password', 'New password', '');

		$views_to_load = array();
		$views_to_load[] = '../../views/_edit.php';

		include '../../views/_generic.php';
	}
?>