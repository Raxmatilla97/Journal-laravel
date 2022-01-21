<?php

namespace App\Models\V1\Jurnallar;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class JurnalToplami
 * @package App\Models\V1\Jurnallar
 * @version January 21, 2022, 10:28 pm UTC
 *
 * @property string $title
 * @property string $slug
 * @property string $image
 * @property boolean $status
 * @property string $full_content
 * @property string $views_count
 * @property integer $down_count_fulls
 * @property boolean $complite
 * @property boolean $archive
 * @property string $full_pdf_doc
 * @property string $created_at
 * @property string $updated_at
 */
class JurnalToplami extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'jurnal_toplamlari';
    

    protected $dates = ['deleted_at'];


    protected $primaryKey = 'jurnal_toplami_id';

    public $fillable = [
        'title',
        'slug',
        'image',
        'status',
        'full_content',
        'views_count',
        'down_count_fulls',
        'complite',
        'archive',
        'full_pdf_doc',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'slug' => 'string',
        'image' => 'string',
        'status' => 'boolean',
        'full_content' => 'string',
        'views_count' => 'string',
        'down_count_fulls' => 'integer',
        'complite' => 'boolean',
        'archive' => 'boolean',
        'full_pdf_doc' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'slug' => 'required',
        'image' => 'required',    
        'full_pdf_doc' => 'required',
        'created_at' => 'required'
    ];

    
}
