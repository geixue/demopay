<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Payment
 * @package App
 */
class Payment extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['trade_no','amount','subject'];

    /**
     * @return bool
     */
    public function paid()
    {
        return $this->is_paid === 'T';
    }
}
