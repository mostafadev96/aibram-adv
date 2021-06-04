<?php

namespace App\DataTables;

use App\Classes\DatatableAction;
use App\Models\Advertisement;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;

class AdvertisementDataTable extends BaseDatatable
{

    public function __construct()
    {
        parent::__construct('advertisementsdatatable-table',[
            'id'           =>  'id',
            'photo'        =>  __('pages.advertisements.columns.photo'),
            'title'        =>  __('pages.advertisements.columns.title'),
            'mobile'       =>  __('pages.advertisements.columns.mobile'),
            'user'         =>  __('pages.advertisements.columns.user'),
            'city_name'    =>  __('pages.advertisements.columns.city'),
            'category_name'=>  __('pages.advertisements.columns.category'),
            'featured'     =>  __('pages.columns.featured'),
            'home'         =>  __('pages.columns.home'),
            'status'       =>  __('pages.columns.status'),
            'no_properties'=>  __('pages.advertisements.columns.no_properties'),
            'no_chatlists' =>  __('pages.advertisements.columns.no_chatlists'),
            'no_ratings'   =>  __('pages.advertisements.columns.no_ratings'),
            'no_favorites' =>  __('pages.advertisements.columns.no_favorites'),
            'created_at'   =>  __('pages.columns.created_at'),
        ],new DatatableAction(),'pages.advertisements.get');      
    }
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $this->datatable = $this->datatable
            ->eloquent($query)
            ->editColumn('user',function ($model) {
                return $model->user->name;
            })
            ->editColumn('mobile',function ($model) {
                return $model->ad_mobile;
            })
            ->editColumn('photo',function ($model) {
                return '<span class="kt-userpic kt-margin-t-5">
                            <img src="'.$model->photo.'" alt="user">
                        </span>';
            })
            ->editColumn('action',function ($model) {
//                $actions=['edit','view','delete'];
                return (string)view('admin::partials.datatables.actions',
                    [
                        'model'=>$model,
                        'model_name'=>$model->getTable(),
                        'viewPrefix' => 'admin.',
                        'actions'=>[
                            // 'edit'=>'advertisements.edit',
                            // 'delete'=>'advertisements.destroy',
                        ]
                    ]);
            });
            $this->formatDateColumn(['created_at']);
            $this->formatBooleanColumn('status');
            $this->formatBooleanColumn('featured');
            $this->formatBooleanColumn('home');
        return $this->datatable->rawColumns(['action','status','featured','home','photo']);
    }

    public function query(Advertisement $model)
    {
        return $model->newQuery();
    }
}