<?php

namespace App\Models\Shop;

use App\Models\Blog\Post;
use App\Models\Shop\Order\Order;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\MassPrunable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use MassPrunable;


    const IS_BANNED = 0;
    const IS_ACTIVE = 1;
    const IS_ADMIN = 3;

//    public $timestamps = false;

    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'delivery' => 'array'
        ];
    }

     public function prunable()
    {
        return static::where('role', 0)->where('created_at', '<=', now()->subMonth());
    }

    public function roles() :array
    {
        return [
            self::IS_BANNED => 'Banned',
            self::IS_ACTIVE => 'Active',
            self::IS_ADMIN => 'Admin'
        ];
    }

    public function getRole()
    {
        return $this->roles()[$this->role];
    }

    public function colors() :array
    {
        return [
            self::IS_BANNED => 'red',
            self::IS_ACTIVE => 'green',
            self::IS_ADMIN => 'purple'
        ];
    }

    public function getColor()
    {
        return $this->colors()[$this->role];
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function wishlistItems()
    {
        return $this->hasMany(WishlistItem::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function isBan()
    {
        return $this->role === self::IS_BANNED;
    }

    public function isActive()
    {
        return $this->role === self::IS_ACTIVE;
    }

    public function verify()
    {
        if (!$this->isBan()) {
            throw new \DomainException('Пользователь уже подтвержден.');
        }
        $this->role = self::IS_ACTIVE;
        $this->save();
    }

    public static function add($fields)
    {
        $user = new static;
        $user->fill($fields);
        $user->password = bcrypt($fields['password']);
        $user->role = self::IS_BANNED;
        $user->save();

        return $user;
    }


    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function generatePassword($password)
    {
        if($password != null)
        {
            $this->password = bcrypt($password);
            $this->save();
        }
    }

    public function remove()
    {
        //$this->removeAvatar();
        $this->delete();
    }

    public function ban()
    {
        $this->role = User::IS_BANNED;
        $this->save();
    }

    public function unban()
    {
        $this->role = User::IS_ACTIVE;
        $this->save();
    }

    public function toggleBan($value)
    {
        return $value == null ? $this->unban() : $this->ban();
    }
}
