<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\Model;
use Cake\Log\Log;
/**
 * Ratings Controller
 *
 * @property \App\Model\Table\RatingsTable $Ratings
 */
class RatingsController extends AppController
{
    /**
    *Initialize method: Loads required components and models.
    */
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadModel('Skills');
        $this->loadModel('Employees');
    }

    
    /**
     * Index method: Sets the available skills to view and saves user selected skills in the ratings table.
     *
     *The skills that have not yet been added to the ratings table are set to the view. 
     *On submission of the form, the data is redirected to Model for conversion to the required format.
     *Followed by this, it tries to save the data. If successful, user is redirected to Ratings/view.
     *
     * @return redirects on successful save, else renders view.
     */
    
    public function index()
    {
        $this->log('On Index Page', 'debug');

        if ($this->request->is('post')) {
            $this->log('Request confirmed to be a POST', 'debug');
            /* 
                convertUserSelectedSkillsToRatingsData() converts the user submitted data in the format required by save().
            */
            $temps = $this->Ratings->convertUserSelectedSkillsToRatingsData($this->request->data,$this->Auth->user('id'));
            $this->log('Just converted the skills to Ratings Data', 'debug');
            foreach ($temps as $temp) {
                $rating = $this->Ratings->newEntity();
                $rating = $this->Ratings->patchEntity($rating, $temp);
                $success = $this->Ratings->save($rating);
                $this->log('In the loop, patching each rating and then saving it', 'debug');
             }
                if ($success) {
                    $this->log('Hurray, we have success', 'debug');
                        $this->Flash->success(__('The skills has been saved.'));
                         return $this->redirect(['action' => 'view']);
                        
                }
                else {
                    $this->log('Houston, we have a problem!', 'debug');
                        $this->Flash->error(__('The skills could not be saved. Please, try again.'));
                }
            }
            $this->log('Lalala.. Controller ka kaam khatam hhone wala hai', 'debug');
            /* 
                To find all the skills that haven't yet been rated by the user.  
            */
            $skill1 = $this->Skills->find()
                ->where(function($exp, $q){
                             return $exp->notIn('id', $this->Ratings
                                                           ->find()
                                                           ->select(['skill_id'])
                                                           ->where(['employee_id =' => $this->Auth->user('id')]
                                                ));
                                            });
            $skills = $this->paginate($skill1);
            $this->set(compact('skills'));
            $this->set('_serialize', ['skills']);
    }
    
    
    /**
    *
    * View method: Finds all the ratings given by the user. 
    *
    */
    public function view()
    {
        $ratings = $this->Ratings->find()
                ->where(['employee_id = ' => $this->Auth->user('id')])
                ->contain (['Skills'])
                ->all();

        $this->set('ratings', $ratings);
        $this->set('_serialize', ['ratings']);
    }


    /**
     * Edit method: Edits a specific rating.
     *
     * @param string|null $id Rating id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
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
        return $this->redirect(['action' => 'view']);
    }
    
 
    /**
     *isAuthorized method: Checks if the action is accessible to a particular user or not.
     */   
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
        return parent::isAuthorized($employee);
    
    }
}