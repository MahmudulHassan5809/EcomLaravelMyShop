@extends('layouts.app')

@section('content')

    @include('errors.errors')

    <div class="panel panel-default">
        <div class="panel-heading">Create New Product</div>
        <div class="panel-body">

            {!! Form::open(['method'=>'POST','route'=>'products.store','files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('name','Name:') !!}
                {!! Form::text('name',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('price','Price:') !!}
                {!! Form::text('price',null,['class'=>'form-control']) !!}
            </div>



            <div class="form-group">
                {!! Form::label('image','Photo:') !!}
                {!! Form::file('image',null,['class'=>'form-control']) !!}
            </div>



            <div class="form-group">
                {!! Form::label('description','Content:') !!}
                {!! Form::textarea('description',null,['class'=>'form-control' ,'id'=>'content','rows'=>3]) !!}
            </div>





            <div class="form-group">
                {!! Form::submit('Create Post',['class'=>'btn btn-info']) !!}
            </div>
            {!! Form::close() !!}






        </div>
    </div>




@stop



@section('scripts')

    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>

    <script>tinymce.init({ selector:'textarea' });</script>


@stop