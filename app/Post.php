<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    public $table = 'posts';

    /**
     * Attributes to cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'message' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function getIdentifier()
    {
        return slugify($this->id . ' ' . $this->subject);
    }


}
