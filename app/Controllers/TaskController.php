<?php
namespace App\Controllers;
use App\Models\Task;

/**
 * Class TaskController
 * @package App\Controllers
 */
class TaskController extends AppController
{

    /**
     * @param int $page
     * @return mixed
     */
    public function all($page = 1){
        //$this->db->checkTables();

        $task = new Task();
        $tasks = $task->all();
        $pagination = $this->pagination($page,$tasks);

        $data = [
            'title' => 'All tasks',
            'auth'  => $this->auth,
            'tasks' => $pagination['data'],
            'page'  => $page,
            'total' => $pagination['total'],
            'from'  => $pagination['from'],
            'to'    => $pagination['to'],
        ];

        return $this->view->render('all_tasks',$data);
    }

    /**
     * @throws \Envms\FluentPDO\Exception
     */
    public function add(){
        $post = $this->request->post;

        $data = [
            'name'  => $post['name'],
            'email' => $post['email'],
            'text'  => $post['text'],
        ];

        $task = new Task();
        $task->insert($data);

        $this::redirect('/');
    }

    /**
     * @param $page
     * @param $array
     * @return array
     */
    private function pagination($page, $array){
        if(!$page) $page=1;

        static $count = 3;
        $total = count($array);
        $from = $page * $count - $count;
        $to = $from + $count > $total ? $total : $from + $count;

        return [
            'total' => $total,
            'from' => $from + 1,
            'to' => $to,
            'data' => array_slice($array, $from, $count)
        ];
    }
}