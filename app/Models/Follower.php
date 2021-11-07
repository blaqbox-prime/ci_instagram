<?php

namespace App\Models;

use CodeIgniter\Model;

class Follower extends Model
{
    protected $table = 'followers';
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['user_id','follower_id'];
}
