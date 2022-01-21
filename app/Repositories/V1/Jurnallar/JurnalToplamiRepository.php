<?php

namespace App\Repositories\V1\Jurnallar;

use App\Models\V1\Jurnallar\JurnalToplami;
use App\Repositories\BaseRepository;

/**
 * Class JurnalToplamiRepository
 * @package App\Repositories\V1\Jurnallar
 * @version January 21, 2022, 10:28 pm UTC
*/

class JurnalToplamiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'slug',
        'image',
        'status',
        'full_content',
        'views_count',
        'down_count_fulls',
        'complite',
        'archive',
        'created_at',
        'updated_at'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return JurnalToplami::class;
    }
}
