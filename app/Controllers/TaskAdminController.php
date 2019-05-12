<?php


namespace App\Controllers;


use Framework\Core\Auth\Auth;
use App\Models\Task;

/**
 * Class TaskAdminController
 * @package App\Controllers
 */
class TaskAdminController extends AppController
{
    /**
     * Check authorization
     */
    private function checkAuth(){
        $auth = new Auth();

        if(!$auth->check()){
            $this::redirect('/');
        }
    }

    /**
     * @throws \Envms\FluentPDO\Exception
     */
    public function modify(){
        $this->checkAuth();
        $post = $this->request->post;

        $data = [
            'id'         => $post['id'],
            'name'       => $post['name'],
            'email'      => $post['email'],
            'text'       => $post['text'],
        ];

        $task = new Task();
        $task->update($data);
        $this::redirect('/');
    }

    /**
     * @throws \Envms\FluentPDO\Exception
     */
    public function delete(){
        $this->checkAuth();

        $task = new Task();
        $task->delete($this->request->post['id']);
        $this::redirect('/');
    }

    /**
     * @throws \Envms\FluentPDO\Exception
     */
    public function close(){
        $this->checkAuth();

        $task = new Task();
        $data = $task->select('id',$this->request->post['id'])[0];

        $data = [
            'id'         => $data['id'],
            'close'      => TRUE,
            'name'       => $data['name'],
            'email'      => $data['email'],
            'text'       => $data['text'],
        ];

        $task->update($data);
        $this::redirect('/');
    }
}