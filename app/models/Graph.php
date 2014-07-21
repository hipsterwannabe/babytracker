<?php

class Graph extends BaseModel {

    public function baby()
    {
        return $this->belongsTo('Baby');
    }

}