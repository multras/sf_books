<?php

if (\TYPO3\CMS\Core\Utility\VersionNumberUtility::convertVersionNumberToInteger(TYPO3_branch) <
    \TYPO3\CMS\Core\Utility\VersionNumberUtility::convertVersionNumberToInteger('8.7.0')) {
    $GLOBALS['TCA']['tx_sfbooks_domain_model_book']['columns']['cover']['config'] = [
        'type' => 'group',
        'internal_type' => 'file',
        'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
        'max_size' => $GLOBALS['TYPO3_CONF_VARS']['BE']['maxFileSize'],
        'uploadfolder' => 'uploads/tx_sfbooks',
        'show_thumbs' => 1,
        'size' => 1,
        'minitems' => 0,
        'maxitems' => 1,
    ];
}
