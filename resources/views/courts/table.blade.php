<div class="table-responsive">
    <table class="table" id="courts-table">
        <thead>
            <tr>
                <th>Surface</th>
        <th>Floodlights</th>
        <th>Indoor</th>
		<th>Average Rating</th>
		<th>Stars</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($courts as $court)
            <tr>
                <td>{{ $court->surface }}</td>
            <td>{{ $court->floodlights }}</td>
            <td>{{ $court->indoor }}</td>
			<td>{!! round($court->courtratings->avg('rating'),2); !!}</td> 
			<td><a href="{{ route('courtratings.showcourtratings', [$court->id] )}}">
				<input id="fieldRating" name="rating" value="{!! round($court->courtratings->avg('rating'),2); !!}" type="text" class="rating rating-loading" data-min=0 data-max=5 data-step=1 data-size="sm" data-display-only="true"> </td>
				</a>

                <td>
                    {!! Form::open(['route' => ['courts.destroy', $court->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('courts.show', [$court->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('courts.edit', [$court->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
						<a href="{!! route('courtratings.ratecourt', [$court->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-ok"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
