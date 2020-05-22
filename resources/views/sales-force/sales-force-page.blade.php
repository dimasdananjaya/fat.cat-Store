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
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title"><b>Order Id</b></h5>
                  <p class="card-text">Product Name : </p>
                  <p class="card-text">Scrunchies Type 1</p>
                  <small><p>Qty : 3</p></small>
                  <p class="card-text">Total Price : </p>
                  <div class="d-flex justify-content-start">
                    <a href="#" class="btn btn-sm btn-primary">Finish</a>
                    <a href="#" class="btn btn-sm btn-danger">Cancel</a>
                  </div>
                </div><!--flexbox-->
              </div><!--end card body-->
            </div><!--end card-->
        </div><!-- pending-orders carousel-->
    </div>
</section>

<section id="sales-completed-orders">
    <div class="container">
        <h4>Completed Orders</h4>
        <hr>
        <div class="sales-completed-orders-carousel">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title"><b>Order Id</b></h5>
                  <p class="card-text">Product Name : </p>
                  <p class="card-text">Scrunchies Type 1</p>
                  <small><p>Qty : 3</p></small>
                  <p class="card-text">Total Price : </p>
                  <div class="d-flex justify-content-start">
                    <a href="#" class="btn btn-sm btn-primary">Finish</a>
                    <a href="#" class="btn btn-sm btn-danger">Cancel</a>
                  </div>
                </div><!--flexbox-->
              </div><!--end card body-->
            </div><!--end card-->
        </div><!-- pending-orders carousel-->
    </div>
</section>
@endsection