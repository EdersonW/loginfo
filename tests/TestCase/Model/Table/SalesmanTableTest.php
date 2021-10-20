<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SalesmanTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SalesmanTable Test Case
 */
class SalesmanTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SalesmanTable
     */
    protected $Salesman;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Salesman',
        'app.Sales',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Salesman') ? [] : ['className' => SalesmanTable::class];
        $this->Salesman = $this->getTableLocator()->get('Salesman', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Salesman);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SalesmanTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
