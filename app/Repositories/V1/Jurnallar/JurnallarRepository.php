<?php

namespace App\Repositories\V1\Jurnallar;

use App\Models\V1\Jurnallar\Jurnallar;
use App\Repositories\BaseRepository;

/**
 * Class JurnallarRepository
 * @package App\Repositories\V1\Jurnallar
 * @version January 21, 2022, 11:38 pm UTC
*/

class JurnallarRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'abstr_content',
        'abstraksiya_pdf',
        'created_user_id',
        'send_user_id',
        'volume_journal_id',
        'status',
        'views_count',
        'down_count_abstr',
        'down_count_fulls'
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
        return Jurnallar::class;
    }
}
