<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * The table (pour dire à quelle table on est relié)
     *
     * @var string
     */
    protected $table = "articles";

    /**
     * The attributes that are mass assignable (ce qu'on peut modifier dans le formulaire)
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'title', 'content',
    ];

    /**
     * The attributes that should be hidden for arrays (ce qui doit être caché dans la BDD, genre un mdp)
     *
     * @var array
     */
    protected $hidden = [

    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

}
