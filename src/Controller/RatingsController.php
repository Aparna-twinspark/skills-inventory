<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Ratings Controller
 *
 * @property \App\Model\Table\RatingsTable $Ratings
 */
class RatingsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Employees', 'Skills']
        ];
        $ratings = $this->paginate($this->Ratings);

        $this->set(compact('ratings'));
        $this->set('_serialize', ['ratings']);
    }

    /**
     * View method
     *
     * @param string|null $id Rating id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rating = $this->Ratings->get($id, [
            'contain' => ['Employees', 'Skills']
        ]);

        $this->set('rating', $rating);
        $this->set('_serialize', ['rating']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rating = $this->Ratings->newEntity();
        if ($this->request->is('post')) {
            $rating = $this->Ratings->patchEntity($rating, $this->request->data);
            if ($this->Ratings->save($rating)) {
                $this->Flash->success(__('The rating has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The rating could not be saved. Please, try again.'));
            }
        }
        $employees = $this->Ratings->Employees->find('list', ['limit' => 200]);
        $skills = $this->Ratings->Skills->find('list', ['limit' => 200]);
        $this->set(compact('rating', 'employees', 'skills'));
        $this->set('_serialize', ['rating']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Rating id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rating = $this->Ratings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rating = $this->Ratings->patchEntity($rating, $this->request->data);
            if ($this->Ratings->save($rating)) {
                $this->Flash->success(__('The rating has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The rating could not be saved. Please, try again.'));
            }
        }
        $employees = $this->Ratings->Employees->find('list', ['limit' => 200]);
        $skills = $this->Ratings->Skills->find('list', ['limit' => 200]);
        $this->set(compact('rating', 'employees', 'skills'));
        $this->set('_serialize', ['rating']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Rating id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rating = $this->Ratings->get($id);
        if ($this->Ratings->delete($rating)) {
            $this->Flash->success(__('The rating has been deleted.'));
        } else {
            $this->Flash->error(__('The rating could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    
    
    public function isAuthorized($employee) 
    { 
        $action = $this->request->params['action'];
       
        // The add and index actions are always allowed. 
        if ((in_array($action,['index'])) && ($this->Auth->user('role')== 'employee')) {
            return true;
        }
                
        if (empty($this->request->params['pass'][0])) { 
            return false; 
            
        }
        
        // Check that the skill belongs to the current user. 
       /* $id = $this->request->params['pass'][0]; 
        $skill = $this->Skills->get($id); 
        if ($skill->user_id == $employee['id']) { 
                return true; 
                
        }*/ 
        return parent::isAuthorized($employee);
    
    }
}
