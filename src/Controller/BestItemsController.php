<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * BestItems Controller
 *
 * @property \App\Model\Table\BestItemsTable $BestItems
 *
 * @method \App\Model\Entity\BestItem[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BestItemsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Items', 'Wants']
        ];
        $bestItems = $this->paginate($this->BestItems);

        $this->set(compact('bestItems'));
    }

    /**
     * View method
     *
     * @param string|null $id Best Item id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bestItem = $this->BestItems->get($id, [
            'contain' => ['Users', 'Items', 'Wants']
        ]);

        $this->set('bestItem', $bestItem);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bestItem = $this->BestItems->newEntity();
        if ($this->request->is('post')) {
            $bestItem = $this->BestItems->patchEntity($bestItem, $this->request->getData());
            if ($this->BestItems->save($bestItem)) {
                $this->Flash->success(__('The best item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The best item could not be saved. Please, try again.'));
        }
        $users = $this->BestItems->Users->find('list', ['limit' => 200]);
        $items = $this->BestItems->Items->find('list', ['limit' => 200]);
        $wants = $this->BestItems->Wants->find('list', ['limit' => 200]);

        $sel_users = $users->toArray();
        $sel_items = $items->toArray();

        $this->set(compact('bestItem', 'users', 'items', 'wants', 'sel_users', 'sel_items'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Best Item id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bestItem = $this->BestItems->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bestItem = $this->BestItems->patchEntity($bestItem, $this->request->getData());
            if ($this->BestItems->save($bestItem)) {
                $this->Flash->success(__('The best item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The best item could not be saved. Please, try again.'));
        }
        $users = $this->BestItems->Users->find('list', ['limit' => 200]);
        $items = $this->BestItems->Items->find('list', ['limit' => 200]);
        $wants = $this->BestItems->Wants->find('list', ['limit' => 200]);
        $this->set(compact('bestItem', 'users', 'items', 'wants'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Best Item id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bestItem = $this->BestItems->get($id);
        if ($this->BestItems->delete($bestItem)) {
            $this->Flash->success(__('The best item has been deleted.'));
        } else {
            $this->Flash->error(__('The best item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
