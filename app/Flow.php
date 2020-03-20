<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use App\Flows;


class Flow extends Model
{
    use Sortable;

    
    public $sortable = [
        'title', 'department',
    ];

    public function department()
    {
        return $this->belongsTo('App\Department', 'department_id');
    }
}

