<?php
namespace Blog\Test\TestCase\Controller;

use Blog\Controller\NodesController;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * Blog\Controller\NodesController Test Case
 *
 * @uses \Blog\Controller\NodesController
 */
class NodesControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.Blog.Nodes'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get("/blog/nodes");
        $this->assertResponseCode(200);
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->get("/blog/nodes/view/1");
        $this->assertResponseCode(200);
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $data = [
            'title' => 'hello',
            'body' => 'World'
        ];

        $this->post("/blog/nodes/add", $data);
        $this->assertRedirect();

        $nodeT = TableRegistry::getTableLocator()->get('Blog.Nodes');
        $createdNode = $nodeT->find()->where(['Nodes.title LIKE' => 'hello']);

        $this->assertTrue($createdNode->count() == 1);
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $data = [
            'title' => 'UPDATED_TITLE'
        ];

        $this->post("/blog/nodes/edit/1", $data);
        $this->assertRedirect();

        $this->get('/blog/nodes/view/1');
        $this->assertResponseContains($data['title']);
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->delete("/blog/nodes/delete/1");
        $this->assertRedirect();

        $nodeT = TableRegistry::getTableLocator()->get('Blog.Nodes');
        $createdNode = $nodeT->find()->where(['Nodes.Id' => 1]);

        $this->assertTrue($createdNode->count() == 0);
    }
}
