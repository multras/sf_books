mod.wizards {
	newContentElement {
		wizardItems {
			#show :=addToList(sfbooks_book)
			plugins {
				elements {
					sfbooks_book {
						icon = ../typo3conf/ext/sf_books/Resources/Public/Icons/ext_icon.gif
						title = LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tt_content.list_type_book
						description = LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tt_content.list_type_book_description
						tt_content_defValues {
							CType = list
							list_type = sfbooks_book
						}
					}
					sfbooks_author {
						icon = ../typo3conf/ext/sf_books/Resources/Public/Icons/ext_icon.gif
						title = LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tt_content.list_type_author
						description = LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tt_content.list_type_author_description
						tt_content_defValues {
							CType = list
							list_type = sfbooks_author
						}
					}
					sfbooks_category {
						icon = ../typo3conf/ext/sf_books/Resources/Public/Icons/ext_icon.gif
						title = LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tt_content.list_type_category
						description = LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tt_content.list_type_category_description
						tt_content_defValues {
							CType = list
							list_type = sfbooks_category
						}
					}
					sfbooks_search {
						icon = ../typo3conf/ext/sf_books/Resources/Public/Icons/ext_icon.gif
						title = LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tt_content.list_type_series
						description = LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tt_content.list_type_series_description
						tt_content_defValues {
							CType = list
							list_type = sfbooks_search
						}
					}
					sfbooks_series {
						iconIdentifier =
						icon = ../typo3conf/ext/sf_books/Resources/Public/Icons/ext_icon.gif
						title = LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tt_content.list_type_search
						description = LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tt_content.list_type_search_description
						tt_content_defValues {
							CType = list
							list_type = sfbooks_series
						}
					}
				}
			}
		}
	}
}