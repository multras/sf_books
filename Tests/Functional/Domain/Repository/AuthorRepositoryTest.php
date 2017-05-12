<?php
namespace Evoweb\SfBooks\Tests\Functional\Domain\Repository;

class AuthorRepositoryTest extends \Evoweb\SfBooks\Tests\Functional\AbstractTestCase
{
    /**
     * @var \Evoweb\SfBooks\Domain\Repository\AuthorRepository
     */
    private $subject;

    /**
     * Sets up this test suite.
     *
     * @return void
     */
    protected function setUp()
    {
        parent::setUp();
        $this->importDataSet(ORIGINAL_ROOT . $this->fixturePath . 'tx_sfbooks_domain_model_author.xml');

        /** @var \TYPO3\CMS\Extbase\Object\ObjectManagerInterface $objectManager */
        $objectManager = new \TYPO3\CMS\Extbase\Object\ObjectManager();
        $this->subject = $objectManager->get(\Evoweb\SfBooks\Domain\Repository\AuthorRepository::class);
    }

    /**
     * @test
     */
    public function findByUidReturnsOneAuthor()
    {
        $response = $this->subject->findByUid(1);
        $properties = $response->_getProperties();
        unset($properties['books']);
        $this->assertEquals(
            [
                'uid' => 1,
                'pid' => 2,
                'lastname' => 'Shelley',
                'firstname' => 'Mary',
                'description' => 'Test description',
                'capitalLetter' => null,
            ],
            $properties
        );
    }

    /**
     * @test
     */
    public function findAuthorGroupedByLetters()
    {
        $response = $this->subject->findAuthorGroupedByLetters();
        /** @var \Evoweb\SfBooks\Domain\Model\Author $author */
        $author = $response['S'][0];
        $properties = $author->_getProperties();
        unset($properties['books']);
        $this->assertEquals(
            [
                'uid' => 1,
                'pid' => 2,
                'lastname' => 'Shelley',
                'firstname' => 'Mary',
                'description' => 'Test description',
                'capitalLetter' => 'S',
            ],
            $properties
        );
    }
}
