<?

class Baby extends BaseModel {

    public function user()
    {
        return $this->belongsTo('User');
    }

}

?>