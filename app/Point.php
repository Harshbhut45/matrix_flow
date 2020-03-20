<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use App\Points;

class Point extends Model
{
    use Sortable;

    protected $table='points';
   
    protected $fillable = [
        'content', 'version',
    ];
    
    public $sortable = [
        'content', 'version',
    ];

    public function flow()
    {
        return $this->belongsTo('App\Flow', 'flow_id');
    }
}
