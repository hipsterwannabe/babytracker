<?php

class Nap extends BaseModel {

    public function baby()
    {
        return $this->belongsTo('Baby');
    }


    public function getDates()
    {
    	return array('start', 'end', 'created_at', 'updated_at');
    }
}