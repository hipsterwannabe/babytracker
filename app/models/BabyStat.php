<?php


class BabyStat extends BaseModel {

    public function baby()
    {
        return $this->belongsTo('Baby');
    }

}

?>