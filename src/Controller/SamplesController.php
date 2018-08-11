<?php
namespace App\Controller;

use App\Controller\AppController;

class SamplesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        //$users = $this->paginate($this->Users);

        //$this->set(compact('users'));
        $this->set_rand();
    }

    private function set_rand(){

        $rand_list = [];
        $rand_same_list = [];
        
        for($i=0; $i<1000; $i++){
            $r = mt_rand(1, 1000);
            $rand_list[] = $r;
            $rand_same_list[$r] = ($rand_same_list[$r] ?? 0) + 1;
        }

        $new_rand_list = [];
        $new_rand_same_list = [];

        for($i=0; $i<1000; $i++){
            $r = random_int(1, 1000);
            $new_rand_list[] = $r;
            $new_rand_same_list[$r] = ($new_rand_same_list[$r] ?? 0) + 1;
        }
        
        $this->set(compact(
            'rand_list', 'rand_same_list', 
            'new_rand_list', 'new_rand_same_list')
        );
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function view($id = null)
    // {
    //     $user = $this->Users->get($id, [
    //         'contain' => []
    //     ]);

    //     $this->set('user', $user);
    // }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    // public function add()
    // {
    //     $user = $this->Users->newEntity();
    //     if ($this->request->is('post')) {
    //         $user = $this->Users->patchEntity($user, $this->request->getData());
    //         if ($this->Users->save($user)) {
    //             $this->Flash->success(__('The user has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The user could not be saved. Please, try again.'));
    //     }
    //     $this->set(compact('user'));
    // }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    // public function edit($id = null)
    // {
    //     $user = $this->Users->get($id, [
    //         'contain' => []
    //     ]);
    //     if ($this->request->is(['patch', 'post', 'put'])) {
    //         $user = $this->Users->patchEntity($user, $this->request->getData());
    //         if ($this->Users->save($user)) {
    //             $this->Flash->success(__('The user has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The user could not be saved. Please, try again.'));
    //     }
    //     $this->set(compact('user'));
    // }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function delete($id = null)
    // {
    //     $this->request->allowMethod(['post', 'delete']);
    //     $user = $this->Users->get($id);
    //     if ($this->Users->delete($user)) {
    //         $this->Flash->success(__('The user has been deleted.'));
    //     } else {
    //         $this->Flash->error(__('The user could not be deleted. Please, try again.'));
    //     }

    //     return $this->redirect(['action' => 'index']);
    // }
}
