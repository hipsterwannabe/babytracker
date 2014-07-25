<?php

class Baby extends BaseModel {

    protected $imgDir = 'baby_profiles';

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function addUploadedImage($image)
    {
        $systemPath = public_path() . '/' . $this->imgDir . '/';
        $imageName = $this->id . '-' . $image->getClientOriginalName();
        $image->move($systemPath, $imageName);
        $this->img_path = '/' . $this->imgDir . '/' . $imageName;
    }
    public function naps()
    {
        return $this->hasMany('Nap');
    }
    public function feedings()
    {
        return $this->hasMany('Feeding');
    }
    public function diapers()
    {
        return $this->hasMany('Diaper');
    }
    public function babystats()
    {
        return $this->hasMany('BabyStat');
    }
}


?>