@extends('layouts.app')

@section('content')


    <table class="table table-hover table-dark">
        <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>

            <th scope="col"> Edit </th>
            <th scope="col"> Delete </th>
        </tr>
        </thead>
        <tbody>
        @if(count($products) > 0)
            <?php  $i =0 ; ?>
            @foreach($products as $product)
                <?php $i++ ;  ?>
                <tr>
                    <th scope="row">{{$i}}</th>

                    <td>{{$product->name}}</td>

                    <td>{{$product->price}}</td>
                    <td>
                        <a href="{{route('products.edit',['id'=>$product->id])}}" class="btn btn-primary btn-sm">
                            <span class="glyphicon glyphicon-pencil"></span>
                            Edit</a>
                    </td>
                    <td>

                        {!! Form::open(['route' => ['products.destroy',$product->id],'method'=>'POST']) !!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete',['class' => 'btn btn-danger btn-sm glyphicon glyphicon-trash'])}}
                        {!! Form::close() !!}

                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <th colspan="5"> No  Posts</th>
            </tr>
        @endif
        </tbody>
    </table>




@stop