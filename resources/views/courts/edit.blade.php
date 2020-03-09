@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Court
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($court, ['route' => ['courts.update', $court->id], 'method' => 'patch']) !!}

                        @include('courts.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection