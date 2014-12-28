<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2003 Sebastian Fischer (typo3@fischer.im)
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * Plugin 'Book Library' for the 'sf_books' extension.
 *
 * @author		Sebastian Fischer <typo3@fischer.im>
 */

require_once(PATH_tslib . 'class.tslib_pibase.php');

/**
 * this class implements the book library
 *
 * @author		Sebastian Fischer <typo3@fischer.im>
 */
class tx_sfbooks_pi1 extends tslib_pibase {
	public $prefixId = 'tx_sfbooks_pi1';		// Same as class name
	public $scriptRelPath = 'pi1/class.tx_sfbooks_pi1.php';	// Path to this script relative to the extension dir.
	public $extKey = 'sf_books';	// The extension key.

	protected $languageMarker = array();

	/**
	 * main function called from typoscript
	 *
	 * @param		string		$content
	 * @param		array		$conf
	 * @return		string		$return
	 */
	public function main($content, $conf) {
		$this->init($conf);

		switch ((string) $this->conf['code']) {
			case 'singleView':
				list($t) = explode(':', $this->cObj->currentRecord);
				$this->internal['currentTable'] = $t;
				$this->internal['currentRow'] = $this->cObj->data;

				$out = $this->singleView();
				break;
			default:
				if (strstr($this->cObj->currentRecord, 'tt_content')) {
					$this->conf['pidList'] = $this->cObj->data['pages'];
					$this->conf['recursive'] = $this->cObj->data['recursive'];
				}

				$out = $this->listView();
				break;
		}

		return $this->pi_wrapInBaseClass($out);
	}

	/**
	 * initialization of the class
	 *
	 * @param		array		$conf
	 */
	protected function init($conf) {
		$this->conf = $conf;		// Setting the TypoScript passed to this function in $this->conf
		$this->pi_setPiVarDefaults();
		$this->pi_loadLL();		// Loading the LOCAL_LANG values
		$this->generateLanguageMarker();

		if ($this->cObj->data['tx_sfbooks_template']) {
			$this->template = $this->cObj->cObjGetSingle(
				'FILE',
				array(
					'file' => 'uploads/tx_sfbooks/' . $this->cObj->data['tx_sfbooks_template']
				)
			);
		} else {
			$this->template = $this->cObj->fileResource($this->conf['templateFile']);
		}

		$this->conf['pidList'] = $this->conf['storagePid'];
	}

	/**
	 * renders the list of books with search and pagination
	 *
	 * @return		string		$out
	 */
	protected function listView() {
		$this->lConf = $this->conf['listView.'];	// Local settings for the listView function

			// keep pagedata for later purpose
		$pageData = $this->cObj->data;
		$this->internal['currentTable'] = 'tx_sfbooks_books';

		if ($this->piVars['showUid']) {	// If a single element should be displayed:
			$this->internal['currentRow'] = $this->pi_getRecord(
				'tx_sfbooks_books',
				$this->piVars['showUid']
			);

			$out = $this->singleView();
		} else {
			$this->piVars['pointer'] = intval($this->piVars['pointer']);

				// Initializing the query parameters:
			$this->internal['orderBy'] = $this->piVars['sort_field'];
			$this->internal['descFlag'] = $this->piVars['sort_order'];
				// Number of results to show in a listing.
			$this->internal['results_at_a_time'] = t3lib_div::intInRange(
				$this->lConf['limit'],
				0,
				1000,
				3);
				// The maximum number of 'pages' in the browse-box: 'Page 1', 'Page 2', etc.
			$this->internal['maxPages'] = t3lib_div::intInRange(
				$this->lConf['maxPages'],
				0,
				1000,
				10);
			$this->internal['searchFieldList'] = 'title,author,isbn,description';
			$this->internal['orderByList'] = 'number,title,author,isbn';
			$this->internal['currentTable'] = 'tx_sfbooks_books';

				// Get number of records:
			$query = $this->pi_list_query('tx_sfbooks_books', 1);
			$res = $GLOBALS['TYPO3_DB']->sql_query($query);
			if ($GLOBALS['TYPO3_DB']->sql_error()) {
				debug(array($GLOBALS['TYPO3_DB']->sql_error(), $query));
			}
			list($this->internal['res_count']) =
				$GLOBALS['TYPO3_DB']->sql_fetch_row($res);

				// Make listing query, pass query to MySQL:
			$query = $this->pi_list_query('tx_sfbooks_books');
			$res = $GLOBALS['TYPO3_DB']->sql_query($query);
			if ($GLOBALS['TYPO3_DB']->sql_error()) {
				debug(array($GLOBALS['TYPO3_DB']->sql_error(), $query));
			}

				// Adds the whole list table
			$out = $this->pi_list_makelist($res) .
				// Adds the search box:
				$this->pi_list_searchBox() .
				// Adds the result browser:
				$this->pi_list_browseresults(
					1,
					'',
					array('showResultsNumbersWrap' => '|')
				);
		}

			// restore the page data for typoscript
		$this->cObj->start($pageData, 'tt_content');

		return $out;
	}

	/**
	 * renders the content for a single book
	 *
	 * @return		string		$out
	 */
	protected function singleView() {
		$this->lConf = $this->conf['singleView.'];	// Local settings for the listView function

		$this->cObj->start(
			$this->internal['currentRow'],
			$this->internal['currentTable']
		);

			// This sets the title of the page for use in indexed search results:
		if ($this->internal['currentRow']['title']) {
			$GLOBALS['TSFE']->indexedDocTitle = $this->internal['currentRow']['title'];
		}

		$template = $this->cObj->getSubpart(
			$this->template,
			'###SINGLEVIEW###'
		);

		$markContentArray = array();
		$markContentArray['###NUMBER###'] = $this->getFieldContent('number');
		$markContentArray['###COVER###'] = $this->getFieldContent('cover');
		$markContentArray['###SERIE###'] = $this->getFieldContent('serie');
		$markContentArray['###TITLE###'] = $this->getFieldContent('title');
		$markContentArray['###SUBTITLE###'] = $this->getFieldContent('subtitle');
		$markContentArray['###AUTHOR###'] = $this->getFieldContent('author');
		$markContentArray['###ISBN###'] = $this->getFieldContent('isbn');
		$markContentArray['###EXTRAS###'] = $this->getFieldContent('extras');
		$markContentArray['###CATEGORY###'] = $this->getFieldContent('category');
		$markContentArray['###DESCRIPTION###'] = $this->getFieldContent('description');
		$markContentArray['###INFOS###'] = $this->getFieldContent('infos');
		$markContentArray['###LOCATION1###'] = $this->getFieldContent('location1');
		$markContentArray['###LOCATION2###'] = $this->getFieldContent('location2');
		$markContentArray['###LOCATION3###'] = $this->getFieldContent('location3');

		$markContentArray['###BACK###'] = $this->cObj->typoLink(
			$this->pi_getLL('back', 'back'),
			$this->lConf['backlink.']
		);

		$markContentArray = array_merge($this->languageMarker, $markContentArray);

		$out = $this->cObj->substituteMarkerArrayCached(
			$template,
			$markContentArray
		);
		$out = $this->cObj->substituteMarkerArrayCached(
			$out,
			$markContentArray
		);

			// restore the page data for typoscript
		$this->cObj->start($pageData, 'tt_content');

		return $out;
	}

	/**
	 * renders a listrow
	 *
	 * @params		integer		$count
	 * @return		string		$out
	 */
	public function pi_list_row($rowCount) {
			// set stdWrap to current book
		$this->cObj->start(
			$this->internal['currentRow'],
			$this->internal['currentTable']
		);

		$listviewContent = $this->cObj->getSubpart(
			$this->template,
			'###LISTVIEW###'
		);
		$dataRowContent = $this->cObj->getSubpart(
			$listviewContent,
			'###DATA_ROW' . ($rowCount % 2 ? '_ODD': '_EVEN') . '###'
		);

		$markContentArray = array();
		$markContentArray['###NUMBER###'] = $this->getFieldContent('number');
		$markContentArray['###COVER###'] = $this->getFieldContent('cover');
		$markContentArray['###SERIE###'] = $this->getFieldContent('serie');
		$markContentArray['###TITLE###'] = $this->getFieldContent('title');
		$markContentArray['###AUTHOR###'] = $this->getFieldContent('author');
		$markContentArray['###ISBN###'] = $this->getFieldContent('isbn');
		$markContentArray['###EXTRAS###'] = $this->getFieldContent('extras');
		$markContentArray['###CATEGORY###'] = $this->getFieldContent('category');
		$markContentArray['###DESCRIPTION###'] = $this->getFieldContent('description');
		$markContentArray['###INFOS###'] = $this->getFieldContent('infos');
		$markContentArray['###LOCATION1###'] = $this->getFieldContent('location1');
		$markContentArray['###LOCATION2###'] = $this->getFieldContent('location2');
		$markContentArray['###LOCATION3###'] = $this->getFieldContent('location3');

		$editPanel = $this->pi_getEditPanel();
		if ($editPanel) {
			$markContentArray['###EDITPANEL###'] = $this->cObj->stdWrap(
				$editPanel,
				$this->lConf['editpanel.']
			);
		}

		$markContentArray = array_merge($this->languageMarker, $markContentArray);
		$out = $this->cObj->substituteMarkerArrayCached(
			$dataRowContent,
			$markContentArray
		);

		return $out;
	}

	/**
	 * renders the list header
	 *
	 * @return		string		$out
	 */
	public function pi_list_header() {
		$listviewContent = $this->cObj->getSubpart(
			$this->template,
			'###LISTVIEW###'
		);
		$dataHeaderContent = $this->cObj->getSubpart(
			$listviewContent,
			'###HEADER_ROW###'
		);

		$markContentArray = array();
		$markContentArray['###NUMBER###'] = $this->getFieldHeaderSortlink('number');
		$markContentArray['###COVER###'] = $this->getFieldHeader('cover');
		$markContentArray['###SERIE###'] = $this->getFieldHeader('serie');
		$markContentArray['###TITLE###'] = $this->getFieldHeaderSortlink('title');
		$markContentArray['###AUTHOR###'] = $this->getFieldHeaderSortlink('author');
		$markContentArray['###ISBN###'] = $this->getFieldHeaderSortlink('ISBN');
		$markContentArray['###DESCRIPTION###'] = $this->getFieldHeader('description');
		$markContentArray['###EXTRAS###'] = $this->getFieldHeader('extras');
		$markContentArray['###CATEGORY###'] = $this->getFieldHeaderSortlink('category');
		$markContentArray['###INFOS###'] = $this->getFieldHeader('infos');
		$markContentArray['###LOCATION1###'] = $this->getFieldHeader('location1');
		$markContentArray['###LOCATION2###'] = $this->getFieldHeader('location2');
		$markContentArray['###LOCATION3###'] = $this->getFieldHeader('location3');

		$out =  $this->cObj->substituteMarkerArrayCached(
			$dataHeaderContent,
			$markContentArray
		);

		return $out;
	}

	/**
	 * render content for fields
	 *
	 * @param		string		$fieldName
	 * @return		string		$out
	 */
	protected function getFieldContent($fieldName) {
		switch ($fieldName) {
			case 'category':
				$out = '-';

				if (!empty($this->internal['currentRow'][$fieldName])) {
					$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery(
						'*',
						'tx_sfbooks_category',
						'uid = ' . intval($this->internal['currentRow'][$fieldName])
					);

					if ($GLOBALS['TYPO3_DB']->sql_num_rows($res) > 0) {
						$row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res);
						$out = $row['type'];
					}
				}
				break;
			case 'cover':
				$imgTSConfig = $this->lConf['fields.'][$fieldName . '.'];
				$imgTSConfig['file'] = 'uploads/tx_sfbooks/' .
					$this->internal['currentRow'][$fieldName];
				$out = $this->cObj->IMAGE($imgTSConfig);
				break;
			case 'description':
				$out = $this->internal['currentRow'][$fieldName];
				break;
			case 'extras':
				$out = '-';

				if (!empty($this->internal['currentRow']['extras'])) {
					$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery(
						'b.label AS \'label\', a.content AS \'content\'',
						'tx_sfbooks_extras AS a
							LEFT JOIN tx_sfbooks_extras_labels AS b
							ON (a.label = b.uid)',
						'a.uid IN (' . $this->internal['currentRow']['extras'] . ')',
						'',
						'label'
					);

					if ($GLOBALS['TYPO3_DB']->sql_num_rows($res) > 0) {
						$out = '';
						while (($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res))) {
							$row['content'] = nl2br($row['content']);

							$out .= $this->cObj->stdWrap(
								$row['label'],
								$this->lConf['fields.']['extras.']['label.']
							);

							if (preg_match("|<br />|im", $row['content'])) {
								$lines = preg_split("|<br />|im", $row['content']);

								$listItems = array();
								foreach ($lines AS $line) {
									$listItems[] = $this->cObj->stdWrap(
										$line,
										$this->lConf['fields.']['extras.']['listitem.']
									);
								}

								$out .= $this->cObj->stdWrap(
									implode('', $listItems),
									$this->lConf['fields.']['extras.']['list.']
								);
							} else {
								$out .= $this->cObj->stdWrap(
									$row['content'],
									$this->lConf['fields.']['extras.']['content.']
								);
							}
						}
					}
				}
				break;
			case 'infos':
				$out = '-';

				if (!empty($this->internal['currentRow']['serie'])) {
					$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery(
						'*',
						'tx_sfbooks_series',
						'uid = ' . intval($this->internal['currentRow']['serie'])
					);

					if ($GLOBALS['TYPO3_DB']->sql_num_rows($res) > 0) {
						$row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res);
						$out = $row['infos'];
					}
				}
				break;
			case 'location1':
			case 'location2':
			case 'location3':
				$out = $this->pi_getLL(
					'label_' . $fieldName . '_I_' . $this->internal['currentRow'][$fieldName],
					$fieldName . '_I_' . $this->internal['currentRow'][$fieldName]
				);
				break;
			case 'number':
				$out = $this->pi_list_linkSingle(
					str_pad($this->internal['currentRow']['number'], 3, '0', STR_PAD_LEFT),
					$this->internal['currentRow']['uid'],
					1
				);
				$out = $this->internal['currentRow']['number'];
				break;
			case 'serie':
				$out = '-';

				if (!empty($this->internal['currentRow'][$fieldName])) {
					$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery(
						'*',
						'tx_sfbooks_series',
						'uid = ' . intval($this->internal['currentRow'][$fieldName])
					);

					if ($GLOBALS['TYPO3_DB']->sql_num_rows($res) > 0) {
						$row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res);
						$out = $row['title'];
					}
				}
				break;
			case 'uid':
				$out = $this->pi_list_linkSingle(
					$this->internal['currentRow'][$fieldName],
					$this->internal['currentRow']['uid'],
					1 // The '1' means that the display of single items is CACHED! Set to zero to disable caching.
				);
				break;
			default:
				$out = $this->internal['currentRow'][$fieldName];
				break;
		}
		return $this->cObj->stdWrap($out, $this->lConf['fields.'][$fieldName . '.']);
	}

	/**
	 * fetches label for field header
	 *
	 * @param		string		$fieldName
	 * @return		string		translated fieldheader
	 */
	public function getFieldHeader($fieldName) {
		$out = $this->pi_getLL(
			'listHeader_' . $fieldName,
			$fieldName
		);

		return $this->cObj->stdWrap($out, $this->lConf['headers.'][$fieldName . '.']);
	}

	/**
	 * wrap the fieldheader with sorting link
	 *
	 * @param		string		$fieldName
	 * @return		string		sorting link with fieldheader as name
	 */
	protected function getFieldHeaderSortlink($fieldName) {
		return $this->pi_linkTP_keepPIvars(
			$this->getFieldHeader($fieldName),
			array(
				'sort_field' => $fieldName,
				'sort_order' => ($this->internal['descFlag'] ? 0 : 1)
			),
			1
		);
	}

	/**
	 * Gets all "lang_ and label_" Marker for substition with substituteMarkerArray
	 * Take function from tx_commerce
	 *
	 * @return	void
	 * @since 10.02.06 Changed to XML
	 * @coauthor Frank Kroeber <fk@marketing-factory.de>
	 */
	public function generateLanguageMarker() {
		$this->languageMarker = array();
		if ((is_array($this->LOCAL_LANG[$GLOBALS['TSFE']->tmpl->setup['config.']['language']])) &&
				(is_array($this->LOCAL_LANG['default']))) {
			$markerArr = array_merge(
				$this->LOCAL_LANG['default'],
				$this->LOCAL_LANG[$GLOBALS['TSFE']->tmpl->setup['config.']['language']]
			);
		} elseif (is_array($this->LOCAL_LANG['default'])) {
			$markerArr = $this->LOCAL_LANG['default'];
		} else {
			$markerArr = $this->LOCAL_LANG[$GLOBALS['TSFE']->tmpl->setup['config.']['language']];
		}

		while ((list($k, $v) = each($markerArr))) {
			if (stristr($k, 'lang_') OR stristr($k, 'label_')) {
				$this->languageMarker['###' . strtoupper($k) . '###'] = $v;
			}
		}
	}
}



if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/sf_books/pi1/class.tx_sfbooks_pi1.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/sf_books/pi1/class.tx_sfbooks_pi1.php']);
}

?>