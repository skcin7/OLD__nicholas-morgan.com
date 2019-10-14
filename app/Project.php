<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    public $table = 'projects';

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'name' => '',
        'url' => '',
        'dates_completed' => '',
        'built_with' => '',
        'notes' => '',
        'published' => false,
    ];

    /**
     * Attributes to cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'url' => 'string',
        'dates_completed' => 'string',
        'built_with' => 'string',
        'notes' => 'string',
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
        'name',
        'url',
        'dates_completed',
        'built_with',
        'notes',
        'published',
    ];

    /**
     * Set the project's URL.
     *
     * @param  string  $value
     * @return void
     */
    public function setUrlAttribute($value)
    {
        $this->attributes['url'] = (string) $value;
    }

    /**
     * Set the project's dates completed.
     *
     * @param  string  $value
     * @return void
     */
    public function setDatesCompletedAttribute($value)
    {
        $this->attributes['dates_completed'] = (string) $value;
    }

    /**
     * Set the project's built with.
     *
     * @param  string  $value
     * @return void
     */
    public function setBuiltWithAttribute($value)
    {
        $this->attributes['built_with'] = (string) $value;
    }

    /**
     * Set the project's notes.
     *
     * @param  string  $value
     * @return void
     */
    public function setNotesAttribute($value)
    {
        $this->attributes['notes'] = (string) $value;
    }




}
