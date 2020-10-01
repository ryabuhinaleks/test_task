<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;

    /**
     * The name attribute of the table
     *
     * @var string
     */
    protected $table = 'events';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'start',
        'color',
        'repeat',
        'user_id'
    ];
    /**
     * @return belongsTo|User
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
