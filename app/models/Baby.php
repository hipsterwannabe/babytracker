<?php

class Baby extends BaseModel {

    protected $imgDir = 'baby_profiles';

    protected $table = 'babies';

    public static $rules = [
        'name' => 'required|max:100',
        'gender' => 'required|max:10000',
        'birth_date' => 'required|max:10000',
        'image' => 'image|max:2000'
    ];

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