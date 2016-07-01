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
     * beforeFilter method: Calls the allow function of the Auth component.
     * @param Object of event class.
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        /* 
         * The following line of code is used to allow an action without a user being authenticated. 
         * It is called with the action name to be allowed either in initialised or before render of that controller.
        */
        $this->Auth->allow('add');
    }

    /**
     * initialize method: Used for loading Components, Models and every prerequisite
     * for the underlying functions of the comtroller.
     * 
     */
     public function initialize()
    {
        parent::initialize();
        //Components and Models are loaded using the following commands.
        $this->loadComponent('RequestHandler');
        //By default the Model of a controller is loaded in it. But as Skills and Ratings Model do not belong to the Employees controller hence it is loaded in the Employees Controller specially.
        $this->loadModel('Skills');
        $this->loadModel('Ratings');
        $this->loadComponent('CleverApi');
    }
    
    /**
     * Login method: It calls the identify function of the Auth component to check the data passed in the post request.
     * 
     * @return rediret method for the respective user.
     */
    public function login()
    {   
        //Calling our custom made Clever API's fetchData() method with some attributes.
       $this->CleverApi->fetchData('97c46874fd592c8d47b593a1dedcd72a86264b1e', 'districts');
        
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
        
        //We have used this viewBuilder because the default layout of the login was different than the rest of the pages.
        $this->viewBuilder()->layout('login');
    }
    
    /**
     * Logout method: It calls the logout function of the Auth component.
     * 
     * @return rediret method
     */
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
    
    /**
     * Index method: The admin is directed here immediately after logging in. It shows the list of employees enrolled
     * in the application.
     * 
     * @return sets the view of the index.
     */ 

    public function index()
    {
        $employees = $this->paginate($this->Employees);

        $this->set(compact('employees'));
        $this->set('_serialize', ['employees']);
    }

    /**
     * View method: Views individual employees using their $id.
     *
     * @param string|null $id Employee id. We get this from the URL.
     * @return Employee's skills with their ratings.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        
        $ratings = $this->Ratings->find()
                                 ->select(['Skills.name', 'Ratings.rating'])
                                 ->contain(['Skills'])
                                 ->where(['employee_id =' => $id])
                                 ->toArray();
         
        $this->set('employee', $this->Employees->get($id));
        $this->set('ratings', $ratings);
        $this->set('_serialize', ['employee']);
         }
        

    /**
     * Add method: Registration page for new users. The viewBuilder sets a different layout than the default layout.
     * 
     * @return \Cake\Network\Response|void Redirects to login page on successful add, renders view otherwise.
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
     * Edit method: Edits the employees enrolled in the application, except for the ratings and the skills selected by them.
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
     * Delete method: Deletes the respective employee. 
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

     public function questionssurvey()
    {
        $this->viewBuilder()->layout('pathways');
        $this->render();
    }
     /**
     * isAuthorised method: Authorises the users to access certain actions of the controller by checking their role.
     *
     * @param string|null $employee
     * @return true or false.
     * @throws Error for Unauthorised access and calls the logout function.
     */
    public function isAuthorized($employee) 
    { 
        $action = $this->request->params['action'];
       
        // The add and index actions are always allowed. 
        if (in_array($action, ['login','add'])) { 
            return true; 
        }
        
        if ((in_array($action,['index','edit','delete','view','questionssurvey'])) && ($this->Auth->user('role')== 'admin')) {
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
        
        return parent::isAuthorized($employee);
    
    }

}