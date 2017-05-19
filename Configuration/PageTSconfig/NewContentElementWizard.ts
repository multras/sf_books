mod.wizards {
	newContentElement {
		wizardItems {
			#show :=addToList(sfbooks_book)
			plugins {
				elements {
					sfbooks_book {
						iconIdentifier = content-plugin-sfbooks-book
						title = LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tt_content.list_type_book
						description = LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tt_content.list_type_book_description
						tt_content_defValues {
							CType = list
							list_type = sfbooks_book
						}
					}
					sfbooks_author {
						iconIdentifier = content-plugin-sfbooks-author
						title = LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tt_content.list_type_author
						description = LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tt_content.list_type_author_description
						tt_content_defValues {
							CType = list
							list_type = sfbooks_author
						}
					}
					sfbooks_category {
						iconIdentifier = content-plugin-sfbooks-category
						title = LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tt_content.list_type_category
						description = LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tt_content.list_type_category_description
						tt_content_defValues {
							CType = list
							list_type = sfbooks_category
						}
					}
					sfbooks_search {
						iconIdentifier = content-plugin-sfbooks-search
						title = LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tt_content.list_type_series
						description = LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tt_content.list_type_series_description
						tt_content_defValues {
							CType = list
							list_type = sfbooks_search
						}
					}
					sfbooks_series {
						iconIdentifier = content-plugin-sfbooks-series
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