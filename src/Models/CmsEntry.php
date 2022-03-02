<?php

namespace Webup\CMS\Models;

use Illuminate\Database\Eloquent\Model;

class CmsEntry extends Model
{
    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = ['key', 'content'];
}
