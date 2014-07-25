<?php

class Diaper extends BaseModel {

    public function baby()
    {
        return $this->belongsTo('Baby');
    }

    public function getDates()
    {
        return array('created_at', 'updated_at');
    }

}

?>