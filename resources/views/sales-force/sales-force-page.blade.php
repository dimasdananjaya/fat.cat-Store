@extends('layouts.sales-force-layout')

@section('content')
<section id="sales-force-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
            </div>

            <div class="sales-card col-lg-4 text-left">
                <div class="fdb-box p-0">
                    <div class="d-flex justify-content-center">
                        <img alt="image" class="img-fluid profile-img" src="{{URL::asset('/images/sales-force/hanna.jpg')}}">
                    </div>        
                    <div class="text-center content p-3">
                        <h5><strong>Hanna Dyarta</strong></h5>
                        <p>Sales</p>
                    </div>
                    <div class="d-flex justify-content-start">
                        <img class="profile-stats-icon" src="{{URL::asset('/images/logo/money.svg')}}" alt="...">
                        <p class="stats-text">Total Profits : </p>
                    </div>
                    <div class="d-flex justify-content-start">
                        <img class="profile-stats-icon" src="{{URL::asset('/images/logo/money.svg')}}" alt="...">
                        <p class="stats-text">Orders Completed : </p>
                    </div>
                    
                    
                </div><!--end box-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!-- end container-->
</section>

<section id="sales-pending-orders">
    <div class="container">
        <h4>Pending Orders</h4>
        <hr>
        <div class="sales-pending-orders-carousel">
            @foreach($orders_products as $ord)
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><b>Order Id : {{$ord->id_order}} </b></h5>
                </div>
                <div class="card-body">
                    <p>Pembeli : {{$ord->nama_pembeli}}</p>
                    <p>Kontak : {{$ord->kontak_pembeli}}</p>
                  <p class="card-text"><b>Items : </b></p>
                  <ul>
                    @foreach($ord->products as $orp)
                        <li>{{$orp->name}} x {{$orp->pivot->quantity}}</li>
                    @endforeach
                  </ul>
                  <p class="card-text"><b>Total Price : Rp. {{ number_format($ord->total_price, 0, ',', '.') }}</b></p>
                  <div class="d-flex justify-content-start">
                    <a href="#" class="btn btn-md btn-orders-finish">Finish</a>
                    {!!Form::open(['action'=>['OrderController@destroy', $ord->id_order], 'method'=>'POST','id'=>'cancel-button'.$ord->id_order])!!}
                        {{Form::hidden('_method', 'DELETE')}}       
                        {{Form::submit('Cancel',['class'=>'btn btn-danger btn-orders-cancel'])}}
                    {!!Form::close()!!}
                    <script>
                            document.querySelector('#cancel-button{{$ord->id_order}}').addEventListener('click', function(e){
                            var form =this;
                            e.preventDefault();
                            swal({
                            title: "Hapus data order : {{$ord->id_order}}",
                            text: "Klik Hapus untuk menghapus data !",
                            type: 'warning',
                            buttons:{
                                cancel:"Batal",
                                confirm:{
                                    text:"Hapus",
                                    value:"catch",
                                }
                            }
                            }).then((value) => {
                            switch(value){
                                case "catch":
                                form.submit();
                                break;
                        
                                default:
                                
                                    break;
                            }
                            })
                        });
                    </script>
                  </div><!--end flex-->
                </div><!--card-body-->
            </div><!--end card-->
            @endforeach
        </div><!--end carousel-->
    </div><!--end container-->
</section>

<!-- Button add orders modal -->
<div class="container">
    <div class="d-flex justify-content-end">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-orders-modal">
        Add Orders
    </button>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="add-orders-modal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Order</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-content">
            <form action="{{ route('add-order') }}"  method="POST">
                @csrf
                <label>Nama Pemesan :</label>
                {{ Form::text('nama_pembeli','',['class' => 'form-control form-group'])}}
                <label>Kontak Pemesan :</label>
                {{ Form::text('kontak_pembeli','',['class' => 'form-control form-group'])}}
                {{Form::hidden('id_user', Auth::user()->id_user) }}
                {{Form::hidden('status', 'pending') }}
                {{-- ... customer name and email fields --}}
            
                <div class="card">
                    <div class="card-header">
                        Products
                    </div>
            
                    <div class="card-body">
                        <table class="table" id="products_table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="product0">
                                    <td>
                                        <select name="products[]" class="form-control form-group">
                                            <option value="">-- choose product --</option>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id_product }}">
                                                    {{ $product->name }} (${{ number_format($product->price, 2) }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" name="quantities[]" class="form-control" />
                                    </td>
                                </tr>
                                <tr id="product1"></tr>
                            </tbody>
                        </table>
            
                        <div class="row">
                            <div class="col-md-12">
                                <button id="add_row" class="btn btn-success pull-left">+ Add Row</button>
                                <button id='delete_row' class="pull-right btn btn-danger">- Delete Row</button>
                            </div>
                        </div>
                    </div>
                </div>
                <label>Total Price :</label>
                {{ Form::number('total_price','',['class' => 'form-control form-group'])}}
                <div>
                    <input class="btn btn-danger" type="submit">
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div><!--end modal content-->
    </div><!--end modal dialog-->
</div><!--end modal-->

<section id="sales-completed-orders">
    <div class="container">
        <h4>Completed Orders</h4>
        <hr>
        <div class="sales-completed-orders-carousel">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><b>Order Id : </b></h5>
                </div>
                <div class="card-body">                 
                  <p class="card-text"><b>Items : </b></p>
                  <ul>
                      <li>Product 1</li>
                      <small><p>Qty : 3</p></small>
                      <small><p>Price : Rp.10.000</p></small>
                      <li>Product 1</li>
                      <small><p>Qty : 3</p></small>
                      <small><p>Price : Rp.10.000</p></small>
                      <li>Product 1</li>
                      <small><p>Qty : 3</p></small>
                      <small><p>Price : Rp.10.000</p></small>
                  </ul> 
                  <p class="card-text"><b>Total Price : </b></p>
                </div><!--end card body-->
                <div class="d-flex justify-content-center">
                    <a href="#" class="btn completed-badge">Completed</a>
                </div><!--end flex-->
            </div><!--end card-->

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><b>Order Id : </b></h5>
                </div>
                <div class="card-body">
                  <p class="card-text"><b>Items : </b></p>                 
                  <ul>
                      <li>Product 1</li>
                      <small><p>Qty : 3</p></small>
                      <small><p>Price : Rp.10.000</p></small>
                      <li>Product 1</li>
                      <small><p>Qty : 3</p></small>
                      <small><p>Price : Rp.10.000</p></small>
                      <li>Product 1</li>
                      <small><p>Qty : 3</p></small>
                      <small><p>Price : Rp.10.000</p></small>
                  </ul>
                  <p class="card-text"><b>Total Price : </b></p>
                </div><!--end card body-->
                <div class="d-flex justify-content-center">
                    <a href="#" class="btn completed-badge">Completed</a>
                </div><!--end flex-->
            </div><!--end card-->

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><b>Order Id : </b></h5>
                </div>
                <div class="card-body">
                    <p class="card-text"><b>Items : </b></p>                 
                  <ul>
                      <li>Product 1</li>
                      <small><p>Qty : 3</p></small>
                      <small><p>Price : Rp.10.000</p></small>
                      <li>Product 1</li>
                      <small><p>Qty : 3</p></small>
                      <small><p>Price : Rp.10.000</p></small>
                      <li>Product 1</li>
                      <small><p>Qty : 3</p></small>
                      <small><p>Price : Rp.10.000</p></small>
                  </ul>
                  <p class="card-text"><b>Total Price : </b></p>
                </div><!--end card body-->
                <div class="d-flex justify-content-center">
                    <a href="#" class="btn completed-badge">Completed</a>
                </div><!--end flex-->
            </div><!--end card-->
        </div><!-- pending-orders carousel-->
    </div>
</section>
@endsection