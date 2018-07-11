<?php

namespace App\DataTables;

use App\Nilai;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTablesEditor;
use Illuminate\Database\Eloquent\Model;

class NilaiDataTablesEditor extends DataTablesEditor
{
    protected $model = Nilai::class;

    /**
     * Get create action validation rules.
     *
     * @return array
     */
    public function createRules()
    {
        return [
            'id_murid' => 'required',
            'id_murid' => 'required',
            'id_kelas'  => 'required',
            'id_pelajaran'  => 'required',
            'nilai'  => 'required',
        ];
    }

    /**
     * Get edit action validation rules.
     *
     * @param Model $model
     * @return array
     */
    public function editRules(Model $model)
    {
        return [
            'id_bilai' => 'sometimes| required',
            'id_murid' => 'sometimes| required',
            'id_kelas'  => 'sometimes| required',
            'id_pelajaran'  => 'sometimes| required',
            'nilai'  => 'sometimes| required',
        ];
    }

    /**
     * Get remove action validation rules.
     *
     * @param Model $model
     * @return array
     */
    public function removeRules(Model $model)
    {
        return [];
    }

    public function creating(Model $model, array $data)
    {
        $data['nilai'] = $data['nilai'];
        return $data;
    }
    /**
    * Pre-update action event hook.
    *
    * @param Model $model
    * @return array
    */
    public function updating(Model $model, array $data)
    {
        if (empty($data['nilai'])) {
            unset($data['nilai']);
        } else {
            $data['nilai'] = $data['nilai'];
        }
        return $data;
    }
}
