<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Wants Controller
 *
 * @property \App\Model\Table\WantsTable $Wants
 *
 * @method \App\Model\Entity\Want[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WantsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categories']
        ];
        $wants = $this->paginate($this->Wants);

        $this->set(compact('wants'));
    }

    /**
     * View method
     *
     * @param string|null $id Want id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $want = $this->Wants->get($id, [
            'contain' => ['Categories']
        ]);

        $this->set('want', $want);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $want = $this->Wants->newEntity();
        if ($this->request->is('post')) {
            $want = $this->Wants->patchEntity($want, $this->request->getData());
            if ($this->Wants->save($want)) {
                $this->Flash->success(__('The want has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The want could not be saved. Please, try again.'));
        }
        $categories = $this->Wants->Categories->find('list', ['limit' => 200]);
        $this->set(compact('want', 'categories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Want id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $want = $this->Wants->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $want = $this->Wants->patchEntity($want, $this->request->getData());
            if ($this->Wants->save($want)) {
                $this->Flash->success(__('The want has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The want could not be saved. Please, try again.'));
        }
        $categories = $this->Wants->Categories->find('list', ['limit' => 200]);
        $this->set(compact('want', 'categories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Want id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $want = $this->Wants->get($id);
        if ($this->Wants->delete($want)) {
            $this->Flash->success(__('The want has been deleted.'));
        } else {
            $this->Flash->error(__('The want could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
