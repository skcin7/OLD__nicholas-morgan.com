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
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'title' => '',
        'body' => '',
        'published' => false,
    ];

    /**
     * Attributes to cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'body' => 'string',
        'published' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'body',
        'published',
    ];

    /**
     * Get slug of this post.
     *
     * @return \type
     */
    public function slug()
    {
        return slugify($this->id . ' ' . $this->title);
    }


}
