<?php

namespace Webup\CMS\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * CMS Module Entry
 *
 * @property-read int $id
 * @property string $key
 * @property string $content
 * @property-read Carbon\Carbon $created_at
 * @property-read Carbon\Carbon $updated_at
 */
class CmsEntry extends Model
{
    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = ['key', 'content'];
}
