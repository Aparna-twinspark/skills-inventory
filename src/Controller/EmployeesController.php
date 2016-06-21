<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Employees Controller
 *
 * @property \App\Model\Table\EmployeesTable $Employees
 */
class EmployeesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow('add');
    } 
    
    public function login()
    {
        if ($this->request->is('post')) {
            $employee = $this->Auth->identify();
            if ($employee) {
                $this->Auth->setUser($employee);
          
                if ($this->Auth->user('role')== 'admin')
                {
                    return $this->redirect(['action' => 'index']);
                }
                else
                {
                    return $this->redirect(['controller' => 'Ratings',
                                            'action' => 'index'
                                           ]);
                }
             //   return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
        

         $this->viewBuilder()->layout('login');
    }
    
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
    
    /*public function dashboard()
    {
      
     //   return $this->redirect($this->Auth->login());
    }*/
    
    public function index()
    {
        $employees = $this->paginate($this->Employees);

        $this->set(compact('employees'));
        $this->set('_serialize', ['employees']);
    }

    /**
     * View method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $employee = $this->Employees->get($id, [
            'contain' => ['Ratings']
        ]);
        $this->set('employee', $employee);
        $this->set('_serialize', ['employee']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $employee = $this->Employees->newEntity();

        if ($this->request->is('post')) {
            //Setting default role for the user
            
            $this->request->data['role'] = 'employee';
            
            $employee = $this->Employees->patchEntity($employee, $this->request->data);

            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('Account created, login to continue.'));
                return $this->redirect(['action' => 'login']);
            } else {
                $this->Flash->error(__('User could not be saved. Please, try again.'));
            }
        }
    
         $this->viewBuilder()->layout('login');
    }

    /**
     * Edit method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $employee = $this->Employees->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $employee = $this->Employees->patchEntity($employee, $this->request->data);
            if($this->request->data)
            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('The employee has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The employee could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('employee'));
        $this->set('_serialize', ['employee']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $employee = $this->Employees->get($id);
        if ($this->Employees->delete($employee)) {
            $this->Flash->success(__('The employee id '.$id.' has been deleted.'));
        } else {
            $this->Flash->error(__('The employee could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);

    }
    
    public function isAuthorized($employee) 
    { 
        $action = $this->request->params['action'];
       
        // The add and index actions are always allowed. 
        if (in_array($action, ['login','add'])) { 
            return true; 
        }
        
        /*if ((in_array($action,['index'])) && ($this->Auth->user('role')== 'employee')) {
            return true;
        }*/
        
        if ((in_array($action,['index','edit','delete','view'])) && ($this->Auth->user('role')== 'admin')) {
            return true;
        } 
        elseif (empty($this->request->params['requested'])) {
        $this->redirect($this->referer());
            $this->Flash->error(__('Unauthorised access! Try logging in as admin.'));
            return $this->redirect($this->Auth->logout());
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