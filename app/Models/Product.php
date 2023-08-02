<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;
use Str;

class Product extends Model
{

    protected $guarded = ['choice_attributes'];

    protected $with = ['product_translations', 'taxes'];

    public function getTranslation($field = '', $lang = false)
    {
        $lang = $lang == false ? App::getLocale() : $lang;
        $product_translations = $this->product_translations->where('lang', $lang)->first();
        return $product_translations != null ? $product_translations->$field : $this->$field;
    }

    public function product_translations()
    {
        return $this->hasMany(ProductTranslation::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class)->where('status', 1);
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function stocks()
    {
        return $this->hasMany(ProductStock::class);
    }

    public function taxes()
    {
        return $this->hasMany(ProductTax::class);
    }

    public function flash_deal_product()
    {
        return $this->hasOne(FlashDealProduct::class);
    }

    public function bids()
    {
        return $this->hasMany(AuctionProductBid::class);
    }

    public function scopePhysical($query)
    {
        return $query->where('digital', 0);
    }

    public function scopeDigital($query)
    {
        return $query->where('digital', 1);
    }

    /**
     * get the name limited to display in a product box
     */
    public function getShowName()
    {
        return Str::limit($this->name  , 40 , '..');
    }

    //translate variations
    function getTranslatedVariations($varations)
    {
        $varations_array = explode('-' , $varations);
        $translated_variations = [];
        foreach($varations_array as $value)
        {
            $taranslated_value = AttributeValue::query()->whereValue($value)->first()?->getTranslation('value')  ?? $value;

            array_push($translated_variations , $taranslated_value);
        }
        return implode('-' , $translated_variations);
    }
}
