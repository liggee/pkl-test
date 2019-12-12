<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name_product
 * @property string $description
 * @property string $image
 * @property string $created_at
 * @property string $updated_at
 * @property OrderDetail[] $orderDetails
 * @property UnitPrice[] $unitPrices
 */
class Product extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['name_product', 'description', 'image', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderDetails()
    {
        return $this->hasMany('App\OrderDetail', 'id_product');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function unitPrices()
    {
        return $this->hasMany('App\UnitPrice', 'id_product');
    }
}
