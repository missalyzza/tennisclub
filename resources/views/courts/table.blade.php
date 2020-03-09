<div class="table-responsive">
    <table class="table" id="courts-table">
        <thead>
            <tr>
                <th>Surface</th>
        <th>Floodlights</th>
        <th>Indoor</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($courts as $court)
            <tr>
                <td>{{ $court->surface }}</td>
            <td>{{ $court->floodlights }}</td>
            <td>{{ $court->indoor }}</td>
                <td>
                    {!! Form::open(['route' => ['courts.destroy', $court->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('courts.show', [$court->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('courts.edit', [$court->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
