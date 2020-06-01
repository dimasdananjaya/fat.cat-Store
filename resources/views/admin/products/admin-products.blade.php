@extends('layouts.admin-layout')

@section('content')
<section id="admin-products-page">
    <div class="container">
        <h3>Admin Products Page</h3>
        <hr>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-add-product" data-toggle="modal" data-target="#addProductModal">
            Add Product
        </button>
        
        <!-- Modal -->
        <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['action' => 'ProductsController@addProduct', 'method'=>'POST']) !!}
                        {{Form::label('name','Name :')}}
                        {{Form::text('name','',['class'=>'form-control form-group','placeholder'=>'','required'])}}
                        {{Form::label('Type','Type :')}}
                        <select id="type" name="type" class="form-control form-group">
                            <option value="1">Scrunchies</option>
                        </select>
                        {{Form::label('price','Price :')}}
                        {{Form::number('price','',['class'=>'form-control form-group','placeholder'=>'','required'])}}
                        {{Form::label('description','Description :')}}
                        {{Form::text('description','',['class'=>'form-control form-group','placeholder'=>'','required'])}}
                        {{Form::submit('Save',['class'=>'btn btn-success btn-block'])}}
                    {!! Form::close() !!}
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
            </div>
        </div>

        <table id="table-products" class="table table-striped table-hover table-sm">
            <thead>
                <th>No.</th>
                <th>Product Id</th>
                <th>Name</th>
                <th>Type</th>
                <th>Price</th>
                <th>Description</th>
            </thead>
            <tbody>
                @foreach ($products as $prd)
                <tr>
                    <td></td>
                    <td>{{$prd->id_product}}</td>
                    <td>{{$prd->name}}</td>
                    <td>{{$prd->type}}</td>
                    <td>{{$prd->price}}</td>
                    <td>{{$prd->description}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

<script type="text/javascript">
    $(document).ready(function() {
        var t = $('#table-products').DataTable( {
            "columnDefs": [ {
                "searchable": false,
                "orderable": false,
                "targets": 0
            } ],
            "order": [[ 1, 'asc' ]],
            "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Indonesian.json"
        }
        } );
    
        t.on( 'order.dt search.dt', function () {
            t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();        
    } );
</script>
@endsection