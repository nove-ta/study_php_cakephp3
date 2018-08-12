<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BestItemsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BestItemsTable Test Case
 */
class BestItemsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BestItemsTable
     */
    public $BestItems;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.best_items',
        'app.users',
        'app.items',
        'app.wants'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('BestItems') ? [] : ['className' => BestItemsTable::class];
        $this->BestItems = TableRegistry::getTableLocator()->get('BestItems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BestItems);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
