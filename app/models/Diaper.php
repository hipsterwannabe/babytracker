<?php

class Diaper extends BaseModel {

    public function baby()
    {
        return $this->belongsTo('Baby');
    }
}

?>