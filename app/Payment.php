<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['trade_no','amount','subject'];

    public function paid()
    {
        return $this->is_paid === 'T';
    }
}
