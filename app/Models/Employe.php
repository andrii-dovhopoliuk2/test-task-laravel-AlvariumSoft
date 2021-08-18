<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;

    const TYPE_PAYMENT_MONTHLY = 1;
    const TYPE_PAYMENT_HOURLY = 2;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
        

    }

    /**
     * @return string[]
     */
    public static function getTypesPayment()
    {
        return [
            self::TYPE_PAYMENT_MONTHLY => 'Ежемесячная оплата',
            self::TYPE_PAYMENT_HOURLY => 'Почасовая оплата',
        ];
    }

    /**
     * @return string[]
     */
    public function getTypePayment()
    {
        return self::getTypesPayment()[$this->type];
    }
}
