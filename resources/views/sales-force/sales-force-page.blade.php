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
                        <img alt="image" class="img-fluid profile-img" src="images/sales-force/hanna.jpg">
                    </div>        
                    <div class="text-center content p-3">
                        <h5><strong>Hanna Dyarta</strong></h5>
                        <p>Sales</p>
                    </div>
                    <div class="d-flex justify-content-start">
                        <img class="profile-stats-icon" src="images/logo/money.svg" alt="...">
                        <p class="stats-text">Total Profits : </p>
                    </div>
                    <div class="d-flex justify-content-start">
                        <img class="profile-stats-icon" src="images/logo/money.svg" alt="...">
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
                  <div class="d-flex justify-content-start">
                    <a href="#" class="btn btn-md btn-orders-finish">Finish</a>
                    <a href="#" class="btn btn-md btn-orders-cancel">Cancel</a>
                  </div>
                </div><!--card-body-->
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
                  <div class="d-flex justify-content-start">
                    <a href="#" class="btn btn-md btn-orders-finish">Finish</a>
                    <a href="#" class="btn btn-md btn-orders-cancel">Cancel</a>
                  </div>
                </div><!--card-body-->
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
                  <div class="d-flex justify-content-start">
                    <a href="#" class="btn btn-md btn-orders-finish">Finish</a>
                    <a href="#" class="btn btn-md btn-orders-cancel">Cancel</a>
                  </div>
                </div><!--card-body-->
            </div><!--end card-->
        </div><!--end carousel-->
    </div><!--end container-->
</section>

<!-- Button add orders modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-orders-modal">
    Add Orders
</button>

<!-- Modal -->
<div class="modal fade" id="add-orders-modal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form  method="POST">
                @csrf
            
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

                                    <td>
                                        <input type="number" name="quantities[]" class="form-control" value="1" />
                                    </td>
                                </tr>
                                <tr id="product1"></tr>
                            </tbody>
                        </table>
            
                        <div class="row">
                            <div class="col-md-12">
                                <button id="add_row" class="btn btn-default pull-left">+ Add Row</button>
                                <button id='delete_row' class="pull-right btn btn-danger">- Delete Row</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <input class="btn btn-danger" type="submit">
                </div>
            </form>
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