<?php
namespace Evoweb\SfBooks\Updates;

/**
 * This file is developed by evoweb.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Upgrade wizard which goes through all files referenced in the tt_content.image filed
 * and creates sys_file records as well as sys_file_reference records for the individual usages.
 */
class ImageToFileReferenceUpdate extends \TYPO3\CMS\Install\Updates\AbstractUpdate
{
    /**
     * Number of records fetched per database query
     * Used to prevent memory overflows for huge databases
     */
    const RECORDS_PER_QUERY = 1000;

    /**
     * @var string
     */
    protected $title = 'Migrate all file relations from sf_books tables';

    /**
     * @var \TYPO3\CMS\Core\Resource\ResourceStorage
     */
    protected $storage;

    /**
     * @var \TYPO3\CMS\Core\Log\Logger
     */
    protected $logger;

    /**
     * Table fields to migrate
     *
     * @var array
     */
    protected $tables = [
        'tx_sfbooks_domain_model_book' => [
            'cover' => [
                'sourcePath' => 'uploads/tx_sfbooks',
                // Relative to fileadmin
                'targetPath' => '_migrated/sf_books/book_images/',
            ],
        ],
    ];

    /**
     * Table to migrate records from
     *
     * @var string
     */
    protected $table = '';

    /**
     * Table field holding the migration to be
     *
     * @var string
     */
    protected $fieldToMigrate = '';

    /**
     * the source file resides here
     *
     * @var string
     */
    protected $sourcePath = '';

    /**
     * Target folder after migration relative to fileadmin
     *
     * @var string
     */
    protected $targetPath = '';

    /**
     * @var \TYPO3\CMS\Core\Registry
     */
    protected $registry;

    /**
     * @var string
     */
    protected $registryNamespace = 'SfbooksFileUpdateWizard';

    /**
     * @var array
     */
    protected $recordOffset = [];

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->logger = GeneralUtility::makeInstance(\TYPO3\CMS\Core\Log\LogManager::class)->getLogger(__CLASS__);

        $registry = GeneralUtility::makeInstance(\TYPO3\CMS\Core\Registry::class);
        foreach ($this->tables as $table => $fields) {
            foreach ($fields as $field => $pathes) {
                $wizardClassName = get_class($this) . '/' . $table . '/' . $field;
                $done = $registry->get('installUpdate', $wizardClassName, false);

                if (!$done) {
                    $this->table = $table;
                    $this->fieldToMigrate = $field;
                    $this->sourcePath = $pathes['sourcePath'];
                    $this->targetPath = $pathes['targetPath'];

                    $this->title = 'Migrate all file relations from ' . $this->table
                        . '.' . $this->fieldToMigrate . ' to sys_file_references';

                    break;
                }
            }

            if ($this->table !== '') {
                break;
            }
        }
    }

    /**
     * Initialize the storage repository.
     */
    public function initialize()
    {
        /** @var $storageRepository \TYPO3\CMS\Core\Resource\StorageRepository */
        $storageRepository = GeneralUtility::makeInstance(\TYPO3\CMS\Core\Resource\StorageRepository::class);
        $storages = $storageRepository->findAll();
        $this->storage = $storages[0];
        $this->registry = GeneralUtility::makeInstance(\TYPO3\CMS\Core\Registry::class);
        $this->recordOffset = $this->registry->get($this->registryNamespace, 'recordOffset', []);
    }

    /**
     * Checks if an update is needed
     *
     * @param string &$description The description for the update
     *
     * @return bool true if an update is needed, FALSE otherwise
     */
    public function checkForUpdate(&$description): bool
    {
        if ($this->isWizardDone()) {
            return false;
        }

        $description = 'This update wizard goes through all files that are referenced in the commerce tables'
            . 'and adds the files to the new File Index.<br />'
            . 'It also moves the files from uploads/ to the fileadmin/_migrated/ path.<br /><br />'
            . 'This update wizard can be called multiple times in case it didn\'t finish after running once.';

        $this->initialize();

        return $this->fieldToMigrate !== '';
    }

    /**
     * Performs the database update.
     *
     * @param array &$dbQueries Queries done in this update
     * @param string &$customMessage Custom message
     * @return bool TRUE on success, FALSE on error
     */
<<<<<<< HEAD
    public function performUpdate(array &$dbQueries, &$customMessages): bool
=======
    public function performUpdate(array &$dbQueries, &$customMessage)
>>>>>>> master
    {
        $customMessage = '';
        try {
            $this->isWizardDone();
            $this->initialize();

            if (!isset($this->recordOffset[$this->table])) {
                $this->recordOffset[$this->table] = 0;
            }

            do {
                $limit = $this->recordOffset[$this->table] . ',' . self::RECORDS_PER_QUERY;
                $records = $this->getRecordsFromTable($limit, $dbQueries);
                foreach ($records as $record) {
                    $this->migrateField($record, $customMessage, $dbQueries);
                }
                $this->registry->set($this->registryNamespace, 'recordOffset', $this->recordOffset);
            } while (count($records) === self::RECORDS_PER_QUERY);

            $this->markWizardAsDone();
            $this->registry->remove($this->registryNamespace, 'recordOffset');
        } catch (\Exception $e) {
            $customMessage .= PHP_EOL . $e->getMessage();
        }

        return empty($customMessage);
    }

    /**
     * Get records from table where the field to migrate is not empty (NOT NULL and != '')
     * and also not numeric (which means that it is migrated)
     *
     * @param int $limit Maximum number records to select
     * @param array $dbQueries
     *
     * @return array
     * @throws \RuntimeException
     */
    protected function getRecordsFromTable(int $limit, array &$dbQueries)
    {
        $queryBuilder = $this->getQueryBuilderForTable($this->table);

        /** @var \TYPO3\CMS\Core\Database\Query\Restriction\DeletedRestriction $deleteRestriction */
        $deleteRestriction = GeneralUtility::makeInstance(
            \TYPO3\CMS\Core\Database\Query\Restriction\DeletedRestriction::class
        );

        $queryBuilder->getRestrictions()
            ->removeAll()
            ->add($deleteRestriction);

        try {
            $queryBuilder
                ->select('uid', 'pid', $this->fieldToMigrate)
                ->from($this->table)
                ->where(
                    $queryBuilder->expr()->isNotNull($this->fieldToMigrate),
                    $queryBuilder->expr()->neq(
                        $this->fieldToMigrate,
                        $queryBuilder->createNamedParameter('', \PDO::PARAM_STR)
                    ),
                    $queryBuilder->expr()->comparison(
                        'CAST(CAST(' . $queryBuilder->quoteIdentifier($this->fieldToMigrate) . ' AS DECIMAL) AS CHAR)',
                        \TYPO3\CMS\Core\Database\Query\Expression\ExpressionBuilder::NEQ,
                        'CAST(' . $queryBuilder->quoteIdentifier($this->fieldToMigrate) . ' AS CHAR)'
                    )
                )
                ->orderBy('uid');

            if (strpos($limit, ',') !== false) {
                $parts = GeneralUtility::intExplode(',', $limit, true, 2);
                $limit = $parts[0];
                $amount = $parts[1];
                $queryBuilder->setMaxResults($amount);
            }
            $queryBuilder->setFirstResult($limit);

            $result = $queryBuilder->execute();

            $dbQueries[] = $queryBuilder->getSQL();

            return $result->fetchAll();
        } catch (\Exception $e) {
            throw new \RuntimeException(
                'Database query failed. Error was: ' . $e->getPrevious()->getMessage(),
                1476050084
            );
        }
    }

    /**
     * Migrates a single field.
     *
     * @param array $row
     * @param string $customMessage
     * @param array $dbQueries
     *
     * @throws \Exception
     */
    protected function migrateField(array $row, string &$customMessage, array &$dbQueries)
    {
        $fieldItems = GeneralUtility::trimExplode(',', $row[$this->fieldToMigrate], true);
        if (empty($fieldItems) || is_numeric($row[$this->fieldToMigrate])) {
            return;
        }
        $fileadminDirectory = rtrim($GLOBALS['TYPO3_CONF_VARS']['BE']['fileadminDir'], '/') . '/';
        $i = 0;

        if (!PATH_site) {
            throw new \Exception('PATH_site was undefined.', 1476107387);
        }

        $storageUid = (int)$this->storage->getUid();

        foreach ($fieldItems as $item) {
            $fileUid = null;
            $sourcePath = PATH_site . $this->sourcePath . $item;
            $targetDirectory = PATH_site . $fileadminDirectory . $this->targetPath;
            $targetPath = $targetDirectory . basename($item);

            // maybe the file was already moved, so check if the original file still exists
            if (file_exists($sourcePath)) {
                if (!is_dir($targetDirectory)) {
                    GeneralUtility::mkdir_deep($targetDirectory);
                }

                // see if the file already exists in the storage
                $fileSha1 = sha1_file($sourcePath);

                $queryBuilder = $this->getQueryBuilderForTable('sys_file');
                $queryBuilder->getRestrictions()->removeAll();
                $existingFileRecord = $queryBuilder->select('uid')->from('sys_file')->where(
                    $queryBuilder->expr()->eq(
                        'sha1',
                        $queryBuilder->createNamedParameter($fileSha1, \PDO::PARAM_STR)
                    ),
                    $queryBuilder->expr()->eq(
                        'storage',
                        $queryBuilder->createNamedParameter($storageUid, \PDO::PARAM_INT)
                    )
                )->execute()->fetch();

                // the file exists, the file does not have to be moved again
                if (is_array($existingFileRecord)) {
                    $fileUid = $existingFileRecord['uid'];
                } else {
                    // just move the file (no duplicate)
                    rename($sourcePath, $targetPath);
                }
            }

            if ($fileUid === null) {
                // get the File object if it hasn't been fetched before
                try {
                    // if the source file does not exist, we should just continue, but leave a message in the docs;
                    // ideally, the user would be informed after the update as well.
                    /** @var \TYPO3\CMS\Core\Resource\File $file */
                    $file = $this->storage->getFile($this->targetPath . $item);
                    $fileUid = $file->getUid();
                } catch (\InvalidArgumentException $e) {
                    // no file found, no reference can be set
                    $this->logger->notice(
                        'File ' . $this->sourcePath . $item . ' does not exist. Reference was not migrated.',
                        [
                            'table' => $this->table,
                            'record' => $row,
                            'field' => $this->fieldToMigrate,
                        ]
                    );

                    $format =
                        'File \'%s\' does not exist. Referencing field: %s.%d.%s. The reference was not migrated.';
                    $message = sprintf(
                        $format,
                        $this->sourcePath . $item,
                        $this->table,
                        $row['uid'],
                        $this->fieldToMigrate
                    );
                    $customMessage .= PHP_EOL . $message;
                    continue;
                }
            }

            if ($fileUid > 0) {
                $fields = [
                    'fieldname' => $this->fieldToMigrate,
                    'table_local' => 'sys_file',
                    'pid' => ($this->table === 'pages' ? $row['uid'] : $row['pid']),
                    'uid_foreign' => $row['uid'],
                    'uid_local' => $fileUid,
                    'tablenames' => $this->table,
                    'crdate' => time(),
                    'tstamp' => time(),
                    'sorting' => ($i + 256),
                    'sorting_foreign' => $i,
                ];

                $queryBuilder = $this->getQueryBuilderForTable('sys_file_reference');
                $queryBuilder->insert('sys_file_reference')->values($fields)->execute();
                $dbQueries[] = str_replace(LF, ' ', $queryBuilder->getSQL());
                ++$i;
            }
        }

        // Update referencing table's original field to now contain the count of references,
        // but only if all new references could be set
        if ($i === count($fieldItems)) {
            $queryBuilder = $this->getQueryBuilderForTable($this->table);
            $queryBuilder->update($this->table)->where(
                $queryBuilder->expr()->eq(
                    'uid',
                    $queryBuilder->createNamedParameter($row['uid'], \PDO::PARAM_INT)
                )
            )->set($this->fieldToMigrate, $i)->execute();
            $dbQueries[] = str_replace(LF, ' ', $queryBuilder->getSQL());
        } else {
            $this->recordOffset[$this->table]++;
        }
    }

    /**
     * Marks some wizard as being "seen" so that it not shown again.
     *
     * Writes the info in LocalConfiguration.php
     *
     * @param mixed $confValue The configuration is set to this value
     */
    protected function markWizardAsDone($confValue = 1)
    {
        $wizardClassName = get_class($this) . '/' . $this->table . '/' . $this->fieldToMigrate;
        GeneralUtility::makeInstance(
            \TYPO3\CMS\Core\Registry::class
        )->set('installUpdate', $wizardClassName, $confValue);
    }

    /**
     * Checks if this wizard has been "done" before
     *
     * @return bool TRUE if wizard has been done before, FALSE otherwise
     */
    protected function isWizardDone()
    {
        return $this->table === '';
    }

    /**
     * @param string $table
     *
     * @return \TYPO3\CMS\Core\Database\Query\QueryBuilder
     */
    protected function getQueryBuilderForTable($table): \TYPO3\CMS\Core\Database\Query\QueryBuilder
    {
        return GeneralUtility::makeInstance(\TYPO3\CMS\Core\Database\ConnectionPool::class)
            ->getQueryBuilderForTable($table);
    }
}
