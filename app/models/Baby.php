<?php

class Baby extends BaseModel {

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

}

?>