<?php

class Feeding extends BaseModel {

    public function baby()
    {
        return $this->belongsTo('Baby');
    }
}

?>