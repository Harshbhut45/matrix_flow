<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use App\Departments;

class Department extends Model
{
    use Sortable;

    
    public $sortable = [
        'name',
    ];
}
