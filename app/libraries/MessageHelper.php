<?php
/**
 * MessageHelper
 * @author Long Do
 *
 */
class MessageHelper {
    
    /* Member variables */
    private $type;
    private $mess;
    
    /* Member functions */
    public function setType($type){
        $this->type = $type;
    }
    public function getType(){
        return $this->type;
    }
    public function setMess($mess){
        $this->mess = $mess;
    }
    public function getMess(){
        return $this->mess;
    }
    public function create(){
        return array(
            'type'  =>  $this->getType(),
            'mess'  =>  $this->getMess()
        );
    }
}