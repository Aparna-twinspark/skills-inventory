<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Skills Controller
 *
 * @property \App\Model\Table\SkillsTable $Skills
 */
class SkillsController extends AppController
{

    /**
     * Index method: Displays the skills list.
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $skills = $this->paginate($this->Skills);

        $this->set(compact('skills'));
        $this->set('_serialize', ['skills']);
    }

    /**
     * View method
     *
     * @param string|null $id Skill id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $skill = $this->Skills->get($id, [
            'contain' => ['Ratings']
        ]);

        $this->set('skill', $skill);
        $this->set('_serialize', ['skill']);
    }

    /**
     * Add method: To add new skills.
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $skill = $this->Skills->newEntity();
        if ($this->request->is('post')) {
            $skill = $this->Skills->patchEntity($skill, $this->request->data);
            if ($this->Skills->save($skill)) {
                $this->Flash->success(__('The skill has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The skill could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('skill'));
        $this->set('_serialize', ['skill']);
    }

    /**
     * Edit method: To edit the name of a skill.
     *
     * @param string|null $id Skill id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $skill = $this->Skills->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $skill = $this->Skills->patchEntity($skill, $this->request->data);

            if ($this->Skills->save($skill)) {
                $this->Flash->success(__('The skill has been edited.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The skill could not be edited. Please, try again.'));
            }
        }
        $this->set(compact('skill'));
        $this->set('_serialize', ['skill']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Skill id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $skill = $this->Skills->get($id);
        if ($this->Skills->delete($skill)) {
            $this->Flash->success(__('The skill has been deleted.'));
        } else {
            $this->Flash->error(__('The skill could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     *isAuthorized method: Checks if the action is accessible to a particular user or not.
     */   
    public function isAuthorized($employee) 
    { 
        $action = $this->request->params['action'];
       
        if (in_array($action, ['index'])) { 
            return true; 
        }
        if ($this->Auth->user('role')== 'admin') {
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
