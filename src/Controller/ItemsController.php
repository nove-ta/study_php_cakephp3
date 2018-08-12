<?php
namespace App\Controller;

use App\Controller\AppController;
//use Cake\ORM\TableRegistry;

/**
 * Items Controller
 *
 * @property \App\Model\Table\ItemsTable $Items
 *
 * @method \App\Model\Entity\Item[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ItemsController extends AppController
{

    public function initialize()
     {
         parent::initialize();
         //$this->Wants = TableRegistry::get('wants');
         $this->loadModel('Wants');
         $this->loadModel('BestItems');
    }

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
        $items = $this->paginate($this->Items);

        $this->set(compact('items'));
    }

    /**
     * View method
     *
     * @param string|null $id Item id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $item = $this->Items->get($id, [
            'contain' => ['Categories']
        ]);

        $user_id = $this->Auth->user('user_id');

        $wants = [];
        if($item->category_id > 0){
            
            // ベストなものがあるか
            $best_item_query = $this->BestItems->find()->where(['user_id'=>$user_id, 'item_id' => $item->item_id]);
            $best_item = $best_item_query->first();

            // 欲しいものと一致するか
            $wants_query = $this->Wants->find('all')->where(['category_id' => $item->category_id]);
            //$wants_query = $this->Wants->find('all')->where(['category_id' => $item->category_id])->enableHydration(false);
            //$wants_ary = $this->Wants->find('all')->where(['category_id' => $item->category_id])->toArray();  // Entity未定義のが取れない？
            foreach($wants_query->toArray() as $want){
                $want['is_match'] = $this->isMatch($item, $want);
                $want['is_best_match'] = ($best_item !== null && $best_item->want_id === $want['want_id']) ? true : false;
                $wants[] = (object)$want;
            }
        }

        $this->set('item', $item);
        $this->set('wants', $wants);
    }

    /**
    * itemとマッチしているか
    */
    private function isMatch($item, $want): bool
    {
       if($item->category->is_width){
           if($item->width < $want['width_min'] || $want['width_max'] < $item->width){
               return false;
           }
       }
       if($item->category->is_depth){
           if($item->depth < $want['depth_min'] || $want['depth_max'] < $item->depth){
               return false;
           }
       }
       if($item->category->is_height){
           if($item->height < $want['height_min'] || $want['height_max'] < $item->height){
               return false;
           }
       }
       return true;
   }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $item = $this->Items->newEntity();
        if ($this->request->is('post')) {
            $item = $this->Items->patchEntity($item, $this->request->getData());
            if ($this->Items->save($item)) {
                $this->Flash->success(__('The item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The item could not be saved. Please, try again.'));
        }
        $categories = $this->Items->Categories->find('list', ['limit' => 200]);
        $this->set(compact('item', 'categories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Item id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $item = $this->Items->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $item = $this->Items->patchEntity($item, $this->request->getData());
            if ($this->Items->save($item)) {
                $this->Flash->success(__('The item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The item could not be saved. Please, try again.'));
        }
        $categories = $this->Items->Categories->find('list', ['limit' => 200]);
        $this->set(compact('item', 'categories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Item id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $item = $this->Items->get($id);
        if ($this->Items->delete($item)) {
            $this->Flash->success(__('The item has been deleted.'));
        } else {
            $this->Flash->error(__('The item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function match(int $item_id, int $want_id)
    {
        $user_id = $this->Auth->user('user_id');

        // ベストなものがあるか
        $best_item_query = $this->BestItems->find()->where(['user_id'=>$user_id, 'item_id' => $item_id]);
        $best_item = $best_item_query->first();

        if($best_item !== null){
            // 更新
            $best_item->want_id = $want_id;
            if ($this->BestItems->save($best_item)) {
                $this->Flash->success(__('The item has been resaved.'));
            } else {
                $this->Flash->error(__('The item could not be resaved. Please, try again.'));
            }
        } else {
            // 新規作成
            $best_item = $this->BestItems->newEntity();
            $best_item->user_id = $user_id;
            $best_item->item_id = $item_id;
            $best_item->want_id = $want_id;
            if ($this->BestItems->save($best_item)) {
                $this->Flash->success(__('The item has been saved.'));
            } else {
                $this->Flash->error(__('The item could not be saved. Please, try again.'));
            }
        }

        return $this->redirect(['action' => 'view', $item_id]);
    }
}
