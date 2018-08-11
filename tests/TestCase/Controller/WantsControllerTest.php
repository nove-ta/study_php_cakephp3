<?php
namespace App\Test\TestCase\Controller;

use App\Controller\WantsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\WantsController Test Case
 */
class WantsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.wants',
        'app.categories'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');

        $this->get('/wants');
        $this->assertResponseOk();
        $this->assertResponseContains('>ログイン</a>');
        $this->assertCount(1, $this->viewVariable('wants'));
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
