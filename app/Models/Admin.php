<?php

namespace App\Models;

use App\Helpers\ImageUploaderTrait;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable, HasRoles, ImageUploaderTrait;

    public $table = 'admins';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'photo',
        'status', // '1 = inactive, default(2) = active
        'two_factor_secret',
        'otp',
        'otp_expired_at',
        'last_login_at',
        'last_login_ip',
        'last_login_device',
        'remember_token'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name'              => 'string',
        'email'             => 'string',
        'password'          => 'string',
        'photo'             => 'string',
        'status'            => 'integer',
        'two_factor_secret' => 'string',
        'otp'               => 'string',
        'otp_expired_at'    => 'datetime',
        'email_verified_at' => 'datetime',
        'last_login_at'     => 'datetime',
        'last_login_ip'     => 'string',
        'last_login_device' => 'string',
        'remember_token'    => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name'              => 'required|string|max:191',
        'email'             => 'required|email|max:191|unique:admins',
        'photo'             => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'password'          => 'required|min:6|max:191|confirmed',
        'status'            => 'required|in:0,1'
    ];

    const STATUS_INACTIVE = 1;
    const STATUS_ACTIVE = 2;

    public static function statuses()
    {
        return [
            self::STATUS_INACTIVE => __('lang.inactive'),
            self::STATUS_ACTIVE => __('lang.active'),
        ];
    }

    // photo
    public function setPhotoAttribute($file)
    {
        try {
            if ($file) {

                $fileName = $this->createFileName($file);

                $this->originalImage($file, $fileName);

                $this->thumbImage($file, $fileName, 200, 200);

                $this->attributes['photo'] = $fileName;
            }
        } catch (\Throwable $th) {
            $this->attributes['photo'] = $file;
        }
    }

    public function getPhotoOriginalPathAttribute()
    {
        return $this->photo ? asset('uploads/images/original/' . $this->photo) : null;
    }

    public function getPhotoThumbnailPathAttribute()
    {
        return $this->photo ? asset('uploads/images/thumbnail/' . $this->photo) : null;
    }
    // photo

    // append and accessor status_text input
    public function getStatusTextAttribute()
    {
        return self::statuses()[$this->status];
    }

    // append and accessor status_icon input
    public function getStatusBadgeAttribute()
    {
        $statuses = [
            self::STATUS_INACTIVE => 'badge badge-danger',
            self::STATUS_ACTIVE => 'badge badge-success',
        ];
        return $this->status == 1 ? 'badge badge-success' : 'badge badge-danger';
    }

    /**
     * Set the admin's password.
     *
     * @param  string  $value
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        if ($value) $this->attributes['password'] = bcrypt($value);
    }

    /**
     * Scope a query to only include inactive users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeInactive($query)
    {
        return $query->where('status', self::STATUS_INACTIVE);
    }

    /**
     * Scope a query to only include active users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('status', self::STATUS_ACTIVE);
    }
}
