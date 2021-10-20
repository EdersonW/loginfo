<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SalesmansTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SalesmansTable Test Case
 */
class SalesmansTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SalesmansTable
     */
    protected $Salesmans;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Salesmans',
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
        $config = $this->getTableLocator()->exists('Salesmans') ? [] : ['className' => SalesmansTable::class];
        $this->Salesmans = $this->getTableLocator()->get('Salesmans', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Salesmans);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SalesmansTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
