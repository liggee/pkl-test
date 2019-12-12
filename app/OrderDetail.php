<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $id_order
 * @property integer $id_product
 * @property integer $id_status
 * @property int $quantity
 * @property string $created_at
 * @property string $updated_at
 * @property Order $order
 * @property Product $product
 * @property StatusOrder $statusOrder
 */
class OrderDetail extends Model
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
    protected $fillable = ['id_order', 'id_product', 'id_status', 'quantity', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo('App\Order', 'id_order');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Product', 'id_product');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function statusOrder()
    {
        return $this->belongsTo('App\StatusOrder', 'id_status');
    }
}
