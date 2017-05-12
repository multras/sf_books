<?php
namespace Evoweb\SfBooks\Tests\Functional\Domain\Repository;

class SeriesRepositoryTest extends \Evoweb\SfBooks\Tests\Functional\AbstractTestCase
{
    /**
     * @var \Evoweb\SfBooks\Domain\Repository\SeriesRepository
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
        $this->importDataSet(ORIGINAL_ROOT . $this->fixturePath . 'tx_sfbooks_domain_model_series.xml');

        /** @var \TYPO3\CMS\Extbase\Object\ObjectManagerInterface $objectManager */
        $objectManager = new \TYPO3\CMS\Extbase\Object\ObjectManager();
        $this->subject = $objectManager->get(\Evoweb\SfBooks\Domain\Repository\SeriesRepository::class);
    }

    /**
     * @test
     */
    public function findByUidReturnsOneSeries()
    {
        $response = $this->subject->findByUid(1);
        $properties = $response->_getProperties();
        unset($properties['books']);
        $this->assertEquals(
            [
                'uid' => 1,
                'pid' => 2,
                'title' => 'Silberbände',
                'info' => 'Info',
                'description' => 'Test description',
                'capitalLetter' => null,
            ],
            $properties
        );
    }

    /**
     * @test
     */
    public function findSeriesGroupedByLetters()
    {
        $response = $this->subject->findSeriesGroupedByLetters();
        /** @var \Evoweb\SfBooks\Domain\Model\Series $serie */
        $serie = $response['S'][0];
        $properties = $serie->_getProperties();
        unset($properties['books']);
        $this->assertEquals(
            [
                'uid' => 1,
                'pid' => 2,
                'title' => 'Silberbände',
                'info' => 'Info',
                'description' => 'Test description',
                'capitalLetter' => 'S',
            ],
            $properties
        );
    }
}
