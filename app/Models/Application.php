<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use Filterable;
    use HasFactory;

    protected $table = 'applications';
    protected $guarded=false;
    const STATUS = ['В очереди', 'В работе', 'Завершена'];

    public function client(){
        return $this->belongsTo(User::class, 'client_id', 'id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function statusName()
    {
        return self::STATUS[$this->status];
    }
}
