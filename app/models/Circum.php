<?php

class Circum extends BaseModel {

    public function baby()
    {
        return $this->belongsTo('Baby');
    }
}

?>