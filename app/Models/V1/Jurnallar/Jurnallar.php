<?php

namespace App\Models\V1\Jurnallar;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Jurnallar
 * @package App\Models\V1\Jurnallar
 * @version January 21, 2022, 11:38 pm UTC
 *
 * @property string $title
 * @property string $image
 * @property string $authors
 * @property string $abstr_content
 * @property string $abstraksiya_pdf
 * @property string $abiut_cite_article
 * @property string $full_journal_pdf
 * @property integer $created_user_id
 * @property integer $send_user_id
 * @property integer $volume_journal_id
 * @property boolean $status
 * @property integer $views_count
 * @property integer $down_count_abstr
 * @property integer $down_count_fulls
 */
class Jurnallar extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'jurnallar';
    

    protected $dates = ['deleted_at'];


    protected $primaryKey = 'id';

    public $fillable = [
        'title',
        'image',
        'authors',
        'abstr_content',
        'abstraksiya_pdf',
        'abiut_cite_article',
        'full_journal_pdf',
        'created_user_id',
        'send_user_id',
        'volume_journal_id',
        'status',
        'views_count',
        'down_count_abstr',
        'down_count_fulls'
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
        'authors' => 'string',
        'abstr_content' => 'string',
        'abstraksiya_pdf' => 'string',
        'abiut_cite_article' => 'string',
        'full_journal_pdf' => 'string',
        'created_user_id' => 'integer',
        'send_user_id' => 'integer',
        'volume_journal_id' => 'integer',
        'status' => 'boolean',
        'views_count' => 'integer',
        'down_count_abstr' => 'integer',
        'down_count_fulls' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'slug' => 'required',
        'authors' => 'required',
        'full_journal_pdf' => 'required',
        'volume_journal_id' => 'required'
    ];

    
}
