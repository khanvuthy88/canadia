@extends('layouts.app')

@section('content')

<section id="intro">
    <div class="intro">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="wrapper">
                        <h1 class="text-center text-white">Accounts for Daily Needs</h1>
                        <p class="text-center text-white">Find out more about our range of current and savings accounts for your daily needs.</p>
                        <button class="btn btn-canadia text-center"><a id="create-account"  href="#account-types">Choose account type</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
k
<section id="account-types">
    <div class="account-types">
        <div class="type clearfix">
            <div class="background-option1">
            </div>
            <div class="content primary-background">
                <div class="wrapper">
                    <h2>Accounts for Daily Needs</h2>
                    <p>Find out more about our range of current and savings accounts for your daily needs.</p>   
                    <button class="btn btn-canadia" id="action-dialy-need"><a class="text-white" href="#type-grow-need" onclick="hideAccountType('type-dialy-need')">discover</a></button>                 
                </div>
            </div>
        </div>
        <div class="type clearfix">
            <div class="background-option2">
            </div>
            <div class="content secondary-background">
                <div class="wrapper">
                    <h2>Accounts to Grow Your Money</h2>
                    <p>Find out more about our range of current and savings accounts for your daily needs.</p>
                    <button class="btn btn-canadia" id="action-grow-money-account"><a class="text-white" href="#type-grow-need" onclick="hideAccountType('type-grow-need')">discover</a></button>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="type-dialy-need">
    <div class="type-detail">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center mt-3 mb-5 text-white">Accounts for Daily Needs</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-12 mb-3">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('images/icons/cnb-join-saving-icon.svg') }}">
                        <div class="card-body">
                            <h1>Savings</h1>
                            <p>Our most popular bank account that helps you reach saving goal with 0.45% p.a. interest rate when you regularly save each month.</p>
                            <button data-toggle="modal" data-target="#saving_account" class="btn btn-primary btn-canadia">Learn more</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 mb-3">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('images/icons/cnb-join-current-icon.svg') }}">
                        <div class="card-body">
                            <h1>Current</h1>
                            <p>Our traditional bank account to help manage your daily financial needs. Enjoy easy payments or transfers whether in Cambodia or overseas 24/7.</p>
                            <button data-toggle="modal" data-target="#current_account" class="btn btn-primary btn-canadia">Learn more</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 mb-3">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('images/icons/cnb-join-current-plus-icon.svg') }}">
                        <div class="card-body">
                            <h1>Current Plus</h1>
                            <p>Get the maximum value from your daily activity and earn 0.45% p.a. interest on top of your balance.</p>
                            <button data-toggle="modal" data-target="#current_plus" class="btn btn-primary btn-canadia">Learn more</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>  
<section id="type-grow-need">
    <div class="type-detail">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center mt-3 mb-5 text-white">Accounts to Grow Your Money</h1>
                </div>
            </div>
            <div class="row">
                
                <div class="col-md-6 col-sm-12 mt15">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('images/icons/cnb-join-fixed-deposit.svg') }}">
                        <div class="card-body">
                            <h1>Fixed Deposit</h1>
                            <p>Make your money work hard for you and get high return of up to 4.75% p.a. on your savings. You can choose the term of the deposit between 1 month and 2 years.</p>
                            <button data-toggle="modal" data-target="#fixed_deposit" class="btn btn-primary secondary-background">Learn more</button>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</section>  

<div class="modal fade" id="current_account" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">            
            <div class="modal-body">
                <ul class="nav nav-tabs shadow-sm">
                  <li><a class="active" data-toggle="tab" href="#current_account_feature">Main Features</a></li>
                  <li><a data-toggle="tab" href="#current_account_condition">Conditions</a></li>
                  <li style="position: absolute;right: 0px;"><button type="button" class="close" data-dismiss="modal">&times;</button></li>
                </ul>

                <div class="tab-content">
                  <div id="current_account_feature" class="tab-pane fade show in active">
                    <table class="table account-feature">
                        <tbody>
                            <tr>
                                <td><img src="{{ asset('images/icons/1.png') }}" style="max-width: 38px; margin: 0px; padding: 0px;"></td>
                                <td >No monthly service fee</td>
                            </tr>
                            <tr>
                                <td><img src="{{ asset('images/icons/2.png') }}" style="max-width: 38px; margin: 0px; padding: 0px;"></td>
                                <td >0.45% p.a. of interest</td>
                            </tr>
                            <tr>
                                <td><img src="{{ asset('images/icons/5.png') }}" style="max-width: 38px; margin: 0px; padding: 0px;"></td>
                                <td >Deposit and withdrawal anytime</td>
                            </tr>
                            <tr>
                                <td><img src="{{ asset('images/icons/4.png') }}" style="max-width: 38px; margin: 0px; padding: 0px;"></td>
                                <td >Free iBanking & Mobile App</td>
                            </tr>
                        </tbody>
                    </table>
                   
                  </div>
                  <div id="current_account_condition" class="tab-pane fade">
                    <table class="table account-condition">
                        <tbody>
                            <tr>
                                <td>Account eligibility</td>
                                <td>Be at least 15 years old for Cambodian citizen and 18 years old for foreigner</td>
                            </tr>
                            <tr>
                                <td>Currency</td>
                                <td>USD, KHR</td>
                            </tr>
                            <tr>
                                <td>Minimum opening and ongoing balance</td>
                                <td>USD 10*</td>
                            </tr>
                            <tr>
                                <td>Interest rate</td>
                                <td>USD 0.45% p.a., KHR 1.00% p.a.</td>
                            </tr>
                            <tr>
                                <td>Interest payment</td>
                                <td>Semi-annually or upon account closure</td>
                            </tr>
                            <tr>
                                <td>Monthly account service</td>
                                <td>Free</td>
                            </tr>
                            <tr>
                                <td>Access to account</td>
                                <td>
                                    <ul>
                                        <li>Canadia Bank branches</li>
                                        <li>Cash-In kiosks</li>
                                        <li>ATM</li>
                                        <li>Internet Banking</li>
                                        <li>Mobile Banking</li>
                                        <li>UnionPay Card / MasterCard / Visa Card</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">*Minimum opening balance of USD 50 for non-resident customer</td>
                            </tr>
                        </tbody>
                    </table>
                  </div>
                  
                </div>
            </div>
            <div class="modal-footer">
                {!! Form::open([
                        'route'=>'create-account',
                        'method'=>'get'
                    ]) !!}
                    {!! Form::hidden('saving_account', 'current_account', []) !!}
                    {!! Form::radio('agree_condition', NULL, '', ['id'=>'agree_condition','required'=>true]) !!}
                    {!! Form::label(" I agree to Canadia Bank's term and condition", NULL, []) !!}

                    {!! Form::submit('Submit', ['class'=>'btn btn-primary','id'=>'btn_create_account']) !!}

                {!! Form::close() !!}
                
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="saving_account" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">            
            <div class="modal-body">
                <ul class="nav nav-tabs shadow-sm">
                  <li><a class="active" data-toggle="tab" href="#saving_account_feature">Main Features</a></li>
                  <li><a data-toggle="tab" href="#saving_account_condition">Conditions</a></li>
                  <li style="position: absolute;right: 0px;"><button type="button" class="close" data-dismiss="modal">&times;</button></li>
                </ul>

                <div class="tab-content">
                  <div id="saving_account_feature" class="tab-pane fade show in active">
                    <table class="table account-feature">
                        <tbody>
                            <tr>
                                <td><img src="{{ asset('images/icons/1.png') }}" style="max-width: 38px; margin: 0px; padding: 0px;"></td>
                                <td >No monthly service fee</td>
                            </tr>
                            <tr>
                                <td><img src="{{ asset('images/icons/2.png') }}" style="max-width: 38px; margin: 0px; padding: 0px;"></td>
                                <td >0.45% p.a. of interest</td>
                            </tr>
                            <tr>
                                <td><img src="{{ asset('images/icons/5.png') }}" style="max-width: 38px; margin: 0px; padding: 0px;"></td>
                                <td >Deposit and withdrawal anytime</td>
                            </tr>
                            <tr>
                                <td><img src="{{ asset('images/icons/4.png') }}" style="max-width: 38px; margin: 0px; padding: 0px;"></td>
                                <td >Free iBanking & Mobile App</td>
                            </tr>
                        </tbody>
                    </table>
                   
                  </div>
                  <div id="saving_account_condition" class="tab-pane fade">
                    <table class="table account-condition">
                        <tbody>
                            <tr>
                                <td>Account eligibility</td>
                                <td>Be at least 15 years old for Cambodian citizen and 18 years old for foreigner</td>
                            </tr>
                            <tr>
                                <td>Currency</td>
                                <td>USD, KHR</td>
                            </tr>
                            <tr>
                                <td>Minimum opening and ongoing balance</td>
                                <td>USD 10*</td>
                            </tr>
                            <tr>
                                <td>Interest rate</td>
                                <td>USD 0.45% p.a., KHR 1.00% p.a.</td>
                            </tr>
                            <tr>
                                <td>Interest payment</td>
                                <td>Semi-annually or upon account closure</td>
                            </tr>
                            <tr>
                                <td>Monthly account service</td>
                                <td>Free</td>
                            </tr>
                            <tr>
                                <td>Access to account</td>
                                <td>
                                    <ul>
                                        <li>Canadia Bank branches</li>
                                        <li>Cash-In kiosks</li>
                                        <li>ATM</li>
                                        <li>Internet Banking</li>
                                        <li>Mobile Banking</li>
                                        <li>UnionPay Card / MasterCard / Visa Card</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">*Minimum opening balance of USD 50 for non-resident customer</td>
                            </tr>
                        </tbody>
                    </table>
                  </div>
                  
                </div>
            </div>
            <div class="modal-footer">
                {!! Form::open([
                        'route'=>'create-account',
                        'method'=>'get'
                    ]) !!}
                    {!! Form::hidden('saving_account', 'saving_account', []) !!}
                    {!! Form::radio('agree_condition', NULL, '', ['id'=>'agree_condition','required'=>true]) !!}
                    {!! Form::label(" I agree to Canadia Bank's term and condition", NULL, []) !!}

                    {!! Form::submit('Submit', ['class'=>'btn btn-primary','id'=>'btn_create_account']) !!}

                {!! Form::close() !!}
                
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="current_plus" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">            
            <div class="modal-body">
                <ul class="nav nav-tabs shadow-sm">
                  <li><a class="active" data-toggle="tab" href="#current_plus_feature">Main Features</a></li>
                  <li><a data-toggle="tab" href="#current_plus_condition">Conditions</a></li>
                  <li style="position: absolute;right: 0px;"><button type="button" class="close" data-dismiss="modal">&times;</button></li>
                </ul>

                <div class="tab-content">
                  <div id="current_plus_feature" class="tab-pane fade show in active">
                    <table class="table account-feature">
                        <tbody>
                            <tr>
                                <td><img src="{{ asset('images/icons/1.png') }}" style="max-width: 38px; margin: 0px; padding: 0px;"></td>
                                <td >No monthly service fee</td>
                            </tr>
                            <tr>
                                <td><img src="{{ asset('images/icons/2.png') }}" style="max-width: 38px; margin: 0px; padding: 0px;"></td>
                                <td >0.45% p.a. of interest</td>
                            </tr>
                            <tr>
                                <td><img src="{{ asset('images/icons/5.png') }}" style="max-width: 38px; margin: 0px; padding: 0px;"></td>
                                <td >Deposit and withdrawal anytime</td>
                            </tr>
                            <tr>
                                <td><img src="{{ asset('images/icons/4.png') }}" style="max-width: 38px; margin: 0px; padding: 0px;"></td>
                                <td >Free iBanking & Mobile App</td>
                            </tr>
                        </tbody>
                    </table>
                   
                  </div>
                  <div id="current_plus_condition" class="tab-pane fade">
                    <table class="table account-condition">
                        <tbody>
                            <tr>
                                <td>Account eligibility</td>
                                <td>Be at least 15 years old for Cambodian citizen and 18 years old for foreigner</td>
                            </tr>
                            <tr>
                                <td>Currency</td>
                                <td>USD, KHR</td>
                            </tr>
                            <tr>
                                <td>Minimum opening and ongoing balance</td>
                                <td>USD 10*</td>
                            </tr>
                            <tr>
                                <td>Interest rate</td>
                                <td>USD 0.45% p.a., KHR 1.00% p.a.</td>
                            </tr>
                            <tr>
                                <td>Interest payment</td>
                                <td>Semi-annually or upon account closure</td>
                            </tr>
                            <tr>
                                <td>Monthly account service</td>
                                <td>Free</td>
                            </tr>
                            <tr>
                                <td>Access to account</td>
                                <td>
                                    <ul>
                                        <li>Canadia Bank branches</li>
                                        <li>Cash-In kiosks</li>
                                        <li>ATM</li>
                                        <li>Internet Banking</li>
                                        <li>Mobile Banking</li>
                                        <li>UnionPay Card / MasterCard / Visa Card</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">*Minimum opening balance of USD 50 for non-resident customer</td>
                            </tr>
                        </tbody>
                    </table>
                  </div>
                  
                </div>
            </div>
            <div class="modal-footer">
                {!! Form::open([
                        'route'=>'create-account',
                        'method'=>'get'
                    ]) !!}
                    {!! Form::hidden('saving_account', 'current_plus', []) !!}
                    {!! Form::radio('agree_condition', NULL, '', ['id'=>'agree_condition','required'=>true]) !!}
                    {!! Form::label(" I agree to Canadia Bank's term and condition", NULL, []) !!}

                    {!! Form::submit('Submit', ['class'=>'btn btn-primary','id'=>'btn_create_account']) !!}

                {!! Form::close() !!}
                
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="fixed_deposit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">            
            <div class="modal-body">
                <ul class="nav nav-tabs shadow-sm">
                  <li><a class="active" data-toggle="tab" href="#fixed_deposit_home">Main Features</a></li>
                  <li><a data-toggle="tab" href="#fixed_deposit_home_condition">Conditions</a></li>
                  <li style="position: absolute;right: 0px;"><button type="button" class="close" data-dismiss="modal">&times;</button></li>
                </ul>

                <div class="tab-content">
                  <div id="fixed_deposit_home" class="tab-pane fade show in active">
                    <table class="table account-feature">
                        <tbody>
                            <tr>
                                <td><img src="{{ asset('images/icons/1.png') }}" style="max-width: 38px; margin: 0px; padding: 0px;"></td>
                                <td >No monthly service fee</td>
                            </tr>
                            <tr>
                                <td><img src="{{ asset('images/icons/2.png') }}" style="max-width: 38px; margin: 0px; padding: 0px;"></td>
                                <td >0.45% p.a. of interest</td>
                            </tr>
                            <tr>
                                <td><img src="{{ asset('images/icons/5.png') }}" style="max-width: 38px; margin: 0px; padding: 0px;"></td>
                                <td >Deposit and withdrawal anytime</td>
                            </tr>
                            <tr>
                                <td><img src="{{ asset('images/icons/4.png') }}" style="max-width: 38px; margin: 0px; padding: 0px;"></td>
                                <td >Free iBanking & Mobile App</td>
                            </tr>
                        </tbody>
                    </table>
                   
                  </div>
                  <div id="fixed_deposit_home_condition" class="tab-pane fade">
                    <table class="table account-condition">
                        <tbody>
                            <tr>
                                <td>Account eligibility</td>
                                <td>Be at least 15 years old for Cambodian citizen and 18 years old for foreigner</td>
                            </tr>
                            <tr>
                                <td>Currency</td>
                                <td>USD, KHR</td>
                            </tr>
                            <tr>
                                <td>Minimum opening and ongoing balance</td>
                                <td>USD 10*</td>
                            </tr>
                            <tr>
                                <td>Interest rate</td>
                                <td>USD 0.45% p.a., KHR 1.00% p.a.</td>
                            </tr>
                            <tr>
                                <td>Interest payment</td>
                                <td>Semi-annually or upon account closure</td>
                            </tr>
                            <tr>
                                <td>Monthly account service</td>
                                <td>Free</td>
                            </tr>
                            <tr>
                                <td>Access to account</td>
                                <td>
                                    <ul>
                                        <li>Canadia Bank branches</li>
                                        <li>Cash-In kiosks</li>
                                        <li>ATM</li>
                                        <li>Internet Banking</li>
                                        <li>Mobile Banking</li>
                                        <li>UnionPay Card / MasterCard / Visa Card</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">*Minimum opening balance of USD 50 for non-resident customer</td>
                            </tr>
                        </tbody>
                    </table>
                  </div>
                  
                </div>
            </div>
            <div class="modal-footer">
                {!! Form::open([
                        'route'=>'create-account',
                        'method'=>'get'
                    ]) !!}
                    {!! Form::hidden('saving_account', 'fixed_deposit', []) !!}
                    {!! Form::radio('agree_condition', NULL, '', ['id'=>'agree_condition','required'=>true]) !!}
                    {!! Form::label(" I agree to Canadia Bank's term and condition", NULL, []) !!}

                    {!! Form::submit('Submit', ['class'=>'btn btn-primary','id'=>'btn_create_account']) !!}

                {!! Form::close() !!}
                
            </div>
        </div>
    </div>
</div>


@endsection


@section('script')
    <script type="text/javascript">
        let acctype1= '#type-dialy-need';
        let acctype2= '#type-grow-need';
        $('document').ready(function(){
            $(acctype2).hide();           

            $('#action-dialy-need').click(function(){
                $(acctype1).addClass('animated fadeInLeft');
                $(acctype2).addClass('animated fadeInRight');
            });

            $('#create-account').click(function(){                
                if (this.hash !== "") {                  
                  event.preventDefault();
                  var hash = this.hash;
                  console.log(hash);
                  $('html, body').animate({
                    scrollTop: $(hash).offset().top
                  }, 800, function(){
                    window.location.hash = hash;
                  });
                } 
            });

        });

        function getOpset(argument) {
            let arg = '#'+argument;
            console.log(arg);
            if(arg.has !=""){
                event.preventDefault();
                var hash = arg.hash;
                $('html, body').animate({
                    scrollTop:$(arg).offset().top
                },800, function(){
                    window.location.hash= arg;
                });
            }
        }
        
        function hideAccountType(type) {
            if(type=='type-grow-need'){                
                $(acctype1).hide();
                $(acctype2).show();  
                getOpset(type);              
            }else{                
                $(acctype2).hide();
                $(acctype1).show();     
                getOpset(type);          
            }
        }
    </script>
@endsection