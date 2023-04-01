<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderCase extends Model
{
    use HasFactory;

    protected $guarded = [];

    const CASE_DRAFT = 1;
    const CASE_PAID = 2;
    const CASE_SHIPPED = 3;
    const CASE_DELIVERED = 4;

  
}