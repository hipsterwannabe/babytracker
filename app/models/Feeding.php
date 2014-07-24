<?php

class Feeding extends BaseModel {

    public function baby()
    {
        return $this->belongsTo('Baby');
    }
    public function getDates()
    {
    	return array('start_left', 'start_right', 'stop_left', 'stop_right', 'start_bottle', 'stop_bottle', 'created_at', 'updated_at');
    }
}

?>