<?php

class Nap extends BaseModel {

    public function baby()
    {
        return $this->belongsTo('Baby');
    }

}