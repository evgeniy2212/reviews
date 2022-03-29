<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Chat extends Model
{
    public $fillable = ['id'];
    public $incrementing = false;
    protected $keyType = 'string';

    public function chatUsers(): HasMany
    {
        return $this->hasMany(ChatUser::class);
    }

    public function messages(): HasMany
    {
        return $this->hasMany(ChatMessage::class);
    }

    public function lastMessage(): HasOne
    {
        return $this->hasOne(ChatMessage::class)->latest();
    }

    public function unreadMessages(): HasMany
    {
        return $this->hasMany(MessageUser::class);
    }
}
