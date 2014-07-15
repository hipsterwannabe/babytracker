<?php


class Weight extends BaseModel {

    public function baby()
    {
        return $this->belongsTo('Baby');
    }
}

?>