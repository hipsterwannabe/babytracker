<?php


class Feeding extends BaseModel {

    public function baby()
    {
        return $this->belongsTo('Baby');
    }

    public function setStartBottleAttribute($value) {
        $this->attributes['start_bottle'] = new Carbon\Carbon($value);
    }

    public function setEndBottleAttribute($value) {
        $this->attributes['end_bottle'] = new Carbon\Carbon($value);
    }

    public function setStartLeftAttribute($value) {
        $this->attributes['start_left'] = new Carbon\Carbon($value);
    }

    public function setEndLeftAttribute($value) {
        $this->attributes['emd_left'] = new Carbon\Carbon($value);
    }

    public function setStartRightAttribute($value) {
        $this->attributes['start_right'] = new Carbon\Carbon($value);
    }

    public function setEndRightAttribute($value) {
        $this->attributes['end_right'] = new Carbon\Carbon($value);
    }
}

?>