<?php

$extensionClassesPath = t3lib_extMgm::extPath('sf_books') . 'Classes/';

return array(
	'tx_sfbooks_controller_abstractcontroller' => $extensionClassesPath . 'Controller/AbstractController.php',
	'tx_sfbooks_controller_bookcontroller' => $extensionClassesPath . 'Controller/BookController.php',
	'tx_sfbooks_controller_authorcontroller' => $extensionClassesPath . 'Controller/AuthorController.php',

	'tx_sfbooks_domain_repository_bookrepository' => $extensionClassesPath . 'Domain/Repository/BookRepository.php',
);

?>