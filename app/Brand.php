<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model {
    /**
     * Возвращает список товаров выбранного бренда
     */
    public function getProducts() {
        return Product::where('brand_id', $this->id)->get();
    }
    /**
     * Связь «один ко многим» таблицы `brands` с таблицей `products`
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products() {
        return $this->hasMany(Product::class);
    }
    public static function popular() {
        return self::withCount('products')->orderByDesc('products_count')->limit(5)->get();
    }
}
