<?php
/**
 * Created by PhpStorm.
 * User: tomaszdrazewski
 * Date: 04/08/15
 * Time: 16:07
 */

class GlosyController extends AppController
{

    public $uses = array('Krakow.UserVotes');

    public function save(){
        $this->UserVotes->create();
        if ($this->UserVotes->save($this->request->data)) {
            $message = 1;
        } else {
            $message = 0;
        }

        $this->setSerialized('object', $message);
    }

    public function view($id)
    {
        $glosy = $this->UserVotes->find('all', array('conditions' => array('druk_id' => $id)));
        $this->setSerialized('glosy', $glosy);
    }
}