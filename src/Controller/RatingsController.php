<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\Model;

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
        if ($this->request->is('post')) {
            $temps = $this->Ratings->convertUserSelectedSkillsToRatingsData($this->request->data,$this->Auth->user('id'));
            foreach ($temps as $temp) {
                $rating = $this->Ratings->newEntity();
                $rating = $this->Ratings->patchEntity($rating, $temp);
                $success = $this->Ratings->save($rating);
             }
                if ($success) {
                        $this->Flash->success(__('The skills has been saved.'));
                         return $this->redirect(['action' => 'view']);
                        
                }
                else {
                        $this->Flash->error(__('The skills could not be saved. Please, try again.'));
                }
                # code...
            }
            $user_name = $this->Auth->user('name');
            $user_role = $this->Auth->user('role');

        $skills = $this->paginate($this->Skills);
        $this->set(compact('skills'));
        $this->set('_serialize', ['skills']);
        $this->set('user_name', $user_name);
        $this->set('user_role', $user_role);
    }
    
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadModel('Skills');
        $this->loadModel('Employees');
    }
    /**
     * View method
     *
     * @param string|null $id Rating id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view()
    {
        $ratings = $this->Ratings->find()
                ->where(['employee_id = ' => $this->Auth->user('id')])
                ->contain (['Skills'])
                ->all();/*, [
            'contain' => ['Skills']
        ]
        $skills->matching ('Employees', function($q){
            return $q->where(['Ratings.employee_id'=>$this->Auth->user('id')]);
        });*/

        $this->set('ratings', $ratings);
        $this->set('_serialize', ['ratings']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    /*public function add()
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
        
    }*/

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
            'contain' => ['Skills']
        ]);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rating = $this->Ratings->patchEntity($rating, $this->request->data);
            if ($this->Ratings->save($rating)) {
                $this->Flash->success(__('The rating has been saved.'));
                return $this->redirect(['action' => 'view']);
            } else {
                $this->Flash->error(__('The rating could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('rating',$rating));
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
        if ($this->Auth->user('role')== 'employee') {
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


