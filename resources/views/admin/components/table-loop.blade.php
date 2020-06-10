<table style="width: 100%" class="table table-stripped">
	<thead>
        <tr>
        	@foreach($headings as $heading)
            	<th>{{$heading}}</th>
            @endforeach
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>

    	@foreach($items as $item )
        <tr>
        	@foreach($item as $key => $value)

        		@if($loop->first)
        			@php $itemId = $value @endphp
        		@endif

            	<td>
                    @if(is_array($value))
                        @foreach($value as $k => $v)
                           
                            {{ $v['name'] }}
                           
                        @endforeach
                    @else
                        @if( $key == 'image' )
                            <img src="{{$value}}" class="img-fluid">
                        @else
                            {{$value}}
                        @endif
            		  
                    @endif
            	</td>

            @endforeach
            <td>
            	<a 	class="btn btn-outline-primary" 
            		href="{{ route($route_edit, $itemId)}}">
            		Editar
            	</a>
            	<a 	class="btn btn-outline-danger ml-2" 
            		href="{{ route($route_delete, $itemId)}}">
            		Eliminar
            	</a>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            @foreach($headings as $heading)
            	<th>{{$heading}}</th>
            @endforeach
            <th>Acciones</th>
        </tr>
    </tfoot>
</table>