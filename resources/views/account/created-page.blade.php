@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Account has created</div>
                <div class="card-body text-center">
                    <p>You account has been created, please kindly check your email for get confirmation code</p>
                    <p>Thank you very much for choosing Canadia Bank.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Account created</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <p>You account has been created, please kindly check your email for get confirmation code</p>
        <h3>{{ $customer->account_code }}</h3>
        <p>Thank you very much for choosing Canadia Bank.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close_account_modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
    <script type="text/javascript">
        $('document').ready(function(){
            $('#myModal').modal({
                keyboard: false,
                show: true
            });
            $('.close').click(function(event){
                window.location.href="http://localhost:800";
            });
            $('#close_account_modal').click(function(event){
                window.location.href="http://localhost:800";
            });
        });
    </script>
@endsection