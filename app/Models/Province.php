<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    protected $primaryKey = 'code'; // Đặt 'code' làm khóa chính
    public $incrementing = false;   // Tắt auto-increment nếu không phải số nguyên
    protected $keyType = 'string';
}
