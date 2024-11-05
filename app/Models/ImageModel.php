<?php

namespace App\Models;

use CodeIgniter\Model;

class ImageModel extends Model
{
    protected $table = 'certificate_images';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'id',
        'image_data',
        'pledge_id',
    ];
}
