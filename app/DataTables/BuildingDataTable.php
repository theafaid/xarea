<?php
namespace App\DataTables;
use App\Building;
//use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Services\DataTable;
// Auto DataTable By Baboon Script
// Baboon Maker has been Created And Developed By [It V 1.0 | https://it.phpanonymous.com]
// Copyright Reserved [It V 1.0 | https://it.phpanonymous.com]
class BuildingDataTable extends DataTable
{
    	

    public function dataTable(DataTables $dataTables, $query)
    {
        return datatables($query)
            ->addColumn('actions', 'admin.building.buttons.actions')
			->addColumn('checkbox', '<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
			<input type="checkbox" class="selected_data" name="selected_data[]" value="{{ $id }}"> <span></span></label>')
            ->addColumn('setActive',function(Building $flat){//active button
                $word = $flat->active == '0' ? 'تفعيل' : 'إلغاء التفعيل';

               return  "<a href='" .  aurl('flat/'.$flat->id.'/activation') . "''>" . $word 
                 . "</a>";
            })->addColumn('owner', function(Building $flat){
                return "<a href='" .  aurl('user/'.$flat->adOwner['id']) . "'>".  $flat->adOwner['name'] . "</a>";
            })
            ->rawColumns(['checkbox','show_action','actions','user','date', 'setActive', 'owner']);
    }
  

	public function query()
    {
            if($this->type == 'active'){
                return Building::query()->where('active', '1')->with('adOwner')->orderBy('id','desc');
            }elseif($this->type == 'inactive'){
                return Building::query()->where('active', '0')->with('adOwner')->orderBy('id','desc');
            }else{
                return Building::query()->with('adOwner')->orderBy('id','desc');

            }
    
        

    }
    	

    	public function html()
	    {
	      $html =  $this->builder()
            ->columns($this->getColumns())
            ->ajax('')
            ->parameters([
                'dom' => 'Blfrtip',
                "lengthMenu" => [[10, 25, 50,100, -1], [10, 25, 50,100, trans('admin.all_records')]],
                'buttons' => [
                    ['extend' => 'print', 'className' => 'btn dark btn-outline', 'text' => '<i class="fa fa-print"></i> '.trans('admin.print')],
                    ['extend' => 'excel', 'className' => 'btn green btn-outline', 'text' => '<i class="fa fa-file-excel-o"> </i> '.trans('admin.export_excel')],
                    /*['extend' => 'pdf', 'className' => 'btn red btn-outline', 'text' => '<i class="fa fa-file-pdf-o"> </i> '.trans('admin.export_pdf')],*/
                    ['extend' => 'csv', 'className' => 'btn purple btn-outline', 'text' => '<i class="fa fa-file-excel-o"> </i> '.trans('admin.export_csv')],
                    ['extend' => 'reload', 'className' => 'btn blue btn-outline', 'text' => '<i class="fa fa fa-refresh"></i> '.trans('admin.reload')],
                    [
                        'text' => '<i class="fa fa-trash"></i> '.trans('admin.delete'),
                        'className'    => 'btn red btn-outline deleteBtn',
                    ], [
                        'text' => '<i class="fa fa-plus"></i> '.trans('admin.add'),
                        'className'    => 'btn btn-primary',
                        'action'    => 'function(){
                        	window.location.href =  "'.\URL::current().'/create";
                        }',
                    ],
                ],
                'initComplete' => "function () {
                this.api().columns([1,2,3,4,5,6,7]).every(function () {
                var column = this;
                var input = document.createElement(\"input\");
                $(input).attr( 'style', 'width: 100%');
                $(input).attr( 'class', 'form-control');
                $(input).appendTo($(column.footer()).empty())
                .on('keyup', function () {
                    column.search($(this).val()).draw();
                });
            });
            }",
                'order' => [[1, 'desc']],

                    'language' => [
                       'sProcessing' => trans('admin.sProcessing'),
							'sLengthMenu'        => trans('admin.sLengthMenu'),
							'sZeroRecords'       => trans('admin.sZeroRecords'),
							'sEmptyTable'        => trans('admin.sEmptyTable'),
							'sInfo'              => trans('admin.sInfo'),
							'sInfoEmpty'         => trans('admin.sInfoEmpty'),
							'sInfoFiltered'      => trans('admin.sInfoFiltered'),
							'sInfoPostFix'       => trans('admin.sInfoPostFix'),
							'sSearch'            => trans('admin.sSearch'),
							'sUrl'               => trans('admin.sUrl'),
							'sInfoThousands'     => trans('admin.sInfoThousands'),
							'sLoadingRecords'    => trans('admin.sLoadingRecords'),
							'oPaginate'          => [
								'sFirst'            => trans('admin.sFirst'),
								'sLast'             => trans('admin.sLast'),
								'sNext'             => trans('admin.sNext'),
								'sPrevious'         => trans('admin.sPrevious'),
							],
							'oAria'            => [
								'sSortAscending'  => trans('admin.sSortAscending'),
								'sSortDescending' => trans('admin.sSortDescending'),
							],
                    ]
                ]);

        return $html;

	    }

    

	    protected function getColumns()
	    {
	        return [
	        [
                'name' => 'checkbox',
                'data' => 'checkbox',
                'title' => '<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                  <input type="checkbox" class="select-all" onclick="select_all()" >
                  <span></span></label>',
                'orderable'      => false,
                'searchable'     => false,
                'exportable'     => false,
                'printable'      => false,
                'width'          => '10px',
                'aaSorting'      => 'none'
            ],

				[
                 'name'=>'owner',
                 'data'=>'owner',
                 'title'=>trans('admin.ad_owner'),
		    ],
				[
                 'name'=>'ad_town',
                 'data'=>'ad_town',
                 'title'=>trans('admin.ad_town'),
		    ],
				[
                 'name'=>'ad_owner_phone',
                 'data'=>'ad_owner_phone',
                 'title'=>trans('admin.ad_owner_phone'),
		    ],
				[
                 'name'=>'ad_price',
                 'data'=>'ad_price',
                 'title'=>trans('admin.ad_price'),
		    ],
				[
                 'name'=>'ad_sort',
                 'data'=>'ad_sort',
                 'title'=>trans('admin.ad_sort'),
		    ],
            [
                'name' => 'setActive',
                'data' => 'setActive',
                'title' => 'التفعيل'
            ],
 [
	                'name' => 'actions',
	                'data' => 'actions',
	                'title' => trans('admin.actions'),
	                'exportable' => false,
	                'printable'  => false,
	                'searchable' => false,
	                'orderable'  => false,
	            ]
	        ];
	    }
    	

	    /**
	     * Get filename for export.
	     * Auto filename Method By Baboon Script
	     * @return string
	     */
	    protected function filename()
	    {
	        return 'building_' . time();
	    }
    	
}