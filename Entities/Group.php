<?php

namespace Modules\Group\Entities;

use App\Models\User;
use App\Scopes\OrderingScope;
use Database\Factories\GroupsFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Group\Enum\GroupStateEnum;
use Modules\Group\Scopes\GroupScope;

class Group extends Model
{
    use SoftDeletes , HasFactory;

    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'id';
    }
    protected static function booted()
    {
        static::addGlobalScope(new OrderingScope);
    }

    // public function supervisors()
    // {
    //     return $this->belongsToMany(User::class , 'group_supervisors');
    // }

    // public function owner()
    // {
    //     return $this->belongsToMany(User::class , 'group_supervisors')->wherePivot('is_owner' , 1);
    // }

    // public function invitations() {
    //     return $this->belongsToMany(User::class , 'group_members')->wherePivot('invite_status' , 0);
    // }

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id','id');
    }

    public function members() {
        return $this->belongsToMany(User::class , 'group_members')->withPivot('id','state');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    protected static function newFactory()
    {
        return GroupsFactory::new();
    }
}
