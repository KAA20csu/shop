<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Basket;

class Basket extends Model {
    /**
     * Связь «многие ко многим» таблицы `baskets` с таблицей `products`
     */
    public function products() {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }
    public static function getBasket() {
        $basket_id = (int)request()->cookie('basket_id');
        if (!empty($basket_id)) {
            try {
                $basket = Basket::findOrFail($basket_id);
            } catch (ModelNotFoundException $e) {
                $basket = Basket::create();
            }
        } else {
            $basket = Basket::create();
        }
        Cookie::queue('basket_id', $basket->id, 525600);
        return $basket;
    }
}
