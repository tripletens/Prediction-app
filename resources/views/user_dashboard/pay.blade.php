@extends('layouts.userapp')

@section('content')
<div id="right-panel" class="right-panel">

    @include('user_dashboard.const.header')

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Payment </strong>
                        </div>
                        <div class="card-body text-center">
                           <h2 class="text-center"> {{ strtoupper($package[0]->name)}} Package </h2>
                           <p>Info about the package </p>
                           <span class="alert alert-info">Price of package (e.g # {{ $package[0]->price}} / {{ $package[0]->duration }}days )</span>
                           <br><br>
                           <form>
                              <script src="https://js.paystack.co/v1/inline.js"></script>
                        
                              <button type="button" class="btn btn-lg btn-success" onclick="payWithPaystack()"> Pay </button> 
                            </form>
                             
                            <script>
                              function payWithPaystack(){
                                var handler = PaystackPop.setup({
                                  key: 'pk_test_8ac2a629cadfc6314ab7849a397a8b6f3fed2a14',
                                  email: '{{ auth()->user()->email}}',
                                  amount: '{{$package[0]->price}}' * 100,
                                  currency: "NGN",
                                  ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                                  metadata: {
                                     custom_fields: [
                                        {
                                            display_name: "Mobile Number",
                                            variable_name: "mobile_number",
                                            value: "+2348012345678"
                                        }
                                     ]
                                  },
                                  callback: function(response){
                                      // alert(response);
                                      window.location.href = "/user/pay/process/{{$package[0]->id}}/"+response.reference;  
                                      alert('success. transaction ref is ' + response.reference);     
                                  },
                                  onClose: function(){
                                      alert('window closed');
                                  }
                                });
                                handler.openIframe();
                              }
                            </script>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
        <!-- .animated -->
</div>
    <!-- .content -->

                            
                            
                        
<!-- .content -->

<!-- /#right-panel -->

@endsection