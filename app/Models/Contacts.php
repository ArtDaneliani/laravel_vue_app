<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contacts extends Model
{
    use HasFactory;
    use SoftDeletes;

    // убрали заполнение полей из базы - created_at/updated_at
    public $timestamps = false;

    protected $table = 'contacts';
    protected $guarded = false;
}
