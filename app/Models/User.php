<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use  HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'street',
        'house_no',
        'postal_code',
        'city',
        'phone',
        'description',
        'email'
    ];

    /**
     * Cast type of the return
     *
     * @var string[]
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Set house no and street from adress
     *
     * @param $value
     * @return void
     */
    public function setAddressAttribute($value)
    {
        $words = preg_split('/( |,)/', $value);
        $houseNo = array_pop($words);
        $street = rtrim(implode(' ', $words), ',');

        $this->street = $street;
        $this->house_no = $houseNo;
    }

    /**
     * Final insert or update operation
     *
     * @param array $attributes
     * @return mixed
     */
    public function fill(array $attributes)
    {
        if (isset($attributes['address']))
        {
            $this->setAddressAttribute($attributes['address']);
        }

        return parent::fill($attributes);
    }
}
