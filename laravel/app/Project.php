<?php


namespace App;


class Project
{
    public function user()
    {
        return $this->belongsTo(User::class);
}
}
