
		<div class="actions">
				<div class="btn-group">
						<a class="btn btn-default btn-outlines btn-circle" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false">
								<i class="fa fa-wrench"></i>
						{{ trans('admin.actions') }}
								<i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu pull-right">
								<li>
										<a href="{{ aurl('/setting/'.$id.'/edit')}}"><i class="fa fa-pencil-square-o"></i> {{trans('admin.edit')}}</a>
								</li>
								<li class="divider"> </li>
								<li>
										<a href="{{ aurl('/setting/'.$id)}}"><i class="fa fa-eye"></i> {{trans('admin.show')}}</a>
								</li>
								
						</ul>
				</div>
		</div>
	