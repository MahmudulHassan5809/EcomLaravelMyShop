@extends('layouts.app')

@section('content')

    @include('errors.errors')

    <div class="panel panel-default">
        <div class="panel-heading">Create New Post</div>
        <div class="panel-body">

            {!! Form::model($productById,['method'=>'PATCH','route'=>['products.update',$productById->id],'files'=>true,]) !!}

            <div class="form-group">
                {!! Form::label('name','Name:') !!}
                {!! Form::text('name',$productById->name,['class'=>'form-control']) !!}
            </div>


            <div class="form-group">
                {!! Form::label('price','Price:') !!}
                {!! Form::text('price',$productById->price,['class'=>'form-control']) !!}
            </div>



            <div class="form-group">
                <img style="width:30%;" src="{{$productById->image}}">
                {!! Form::file('image',null,['class'=>'form-control']) !!}



            <div class="form-group">
                {{Form::label('description', 'Content')}}
                {{ Form::textarea('description',$productById->description,['class' => 'form-control','placeholder'=>'Body']) }}
            </div>





            <div class="form-group">
                {!! Form::submit('Update Product',['class'=>'btn btn-info']) !!}
            </div>
            {!! Form::close() !!}






        </div>
    </div>




@stop
@section('scripts')

    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>

    <script>tinymce.init({ selector:'textarea' });</script>


@stop
