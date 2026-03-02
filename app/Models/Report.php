<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;   // ← добавляем

class Report extends Model
{
    use HasFactory;
    use SoftDeletes;   // ← добавляем

    protected $fillable = [
        'registration_number',   // подставь свои реальные поля
        'description',
        'status_id',
        'user_id',
        // все поля, которые можно массово заполнять
    ];

    // если ещё нет связи со статусом — добавь
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    // если нужно — связь с пользователем
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}