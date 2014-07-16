<?php

class Length extends BaseModel {

    public function baby()
    {
        return $this->belongsTo('Baby');
    }
}

?>