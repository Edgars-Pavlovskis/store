<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'provider',
        'provider_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'profiledata' => 'array',
    ];


    public function shoppingCart()
    {
        return $this->hasOne(ShoppingCart::class);
    }

    public function saveShoppingCart(array $cartData)
    {
        $cart = $this->shoppingCart()->first();
        if (empty($cartData)) {
            if ($cart) {
                $cart->delete();
            }
            return;
        }

        if ($cart) {
            $cart->update(['cart_data' => $cartData]);
        } else {
            $this->shoppingCart()->create(['cart_data' => $cartData]);
        }
    }

    public function getShoppingCart()
    {
        $cart = $this->shoppingCart()->first();
        return $cart ? $cart->cart_data : [];
    }


    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function($query) use ($term) {
            $query->whereRaw("name LIKE ?", ["$term"])
                ->orWhere('email', 'like', "$term");
        });
    }

}
