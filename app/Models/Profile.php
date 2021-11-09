<?php

namespace App\Models;

use CodeIgniter\Model;

class Profile extends Model
{
    protected $table = 'ciprofiles';
    protected $primaryKey = 'id';
    protected $allowedFields = ['bio', 'website' ,'category', 'picture' ,'user'];
}
