<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // 主キーカラムを変更
    protected $primaryKey = 'id';
    // 操作可能なカラムを定義
    protected $fillable = [
        'user_id',
        'user_name',
        'password',
        'role_id',
        'status',
    ];
    // 全て取得
    public static function getAll()
    {
        return self::orderBy('id', 'asc');
    }
    // 指定したレコードを取得
    public static function getSpecify($user_id)
    {
        return self::where('user_id', $user_id);
    }
    // rolesテーブルとのリレーション
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'role_id');
    }

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
    ];
}
