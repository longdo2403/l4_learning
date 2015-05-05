@extends('frontend.layouts.master')
@section('content')
@if(Session::has('message_coupon'))
    <div class="alert alert-<?= @Session::get('message_coupon')['type'] ?>">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <p>{{ Session::get('message_coupon')['mess'] }}</p>
    </div>
@endif
 <div class="w-row">
    <div class="w-col w-col-9">
       <h1>Checkout</h1>
    </div>
    <div class="w-col w-col-3">
       <div>User {{Auth::user()->user_name}}, <a href="{{route('member.logout')}}">logout</a></div>
    </div>
 </div>
 <?php if (!$cartContent->isEmpty()): ?>
 <div class="w-row">
    <div class="w-col w-col-1">
       <div><strong>No</strong></div>
    </div>
    <div class="w-col w-col-5">
       <div><strong>Product</strong></div>
    </div>
    <div class="w-col w-col-2">
       <div><strong>Price</strong></div>
    </div>
    <div class="w-col w-col-2">
       <div><strong>Quantity<br></strong></div>
    </div>
    <div class="w-col w-col-2">
       <div><strong>Total Price</strong></div>
    </div>
 </div>
 <?php $i = 1; ?>
 <?php foreach ($cartContent as $index => $item): ?>
  <div class="w-row">
    <div class="w-col w-col-1">
       <div>{{$i;}}</div>
    </div>
    <div class="w-col w-col-5">
       <div><?= SecurityHelper::xss_clean($item->name); ?></div>
    </div>
    <div class="w-col w-col-2">
       <div><?= number_format(SecurityHelper::xss_clean($item->price)); ?> VND</div>
    </div>
    <div class="w-col w-col-2">
       <div><?= SecurityHelper::xss_clean($item->qty); ?></div>
    </div>
    <div class="w-col w-col-2">
       <div><?= number_format(SecurityHelper::xss_clean($item->subtotal)); ?> VND</div>
    </div>
 </div>
 <?php $i++; ?>
 <?php endforeach; ?>
 <div class="w-row">
    <div class="w-col w-col-1"></div>
    <div class="w-col w-col-5"></div>
    <div class="w-col w-col-2"></div>
    <div class="w-col w-col-2">
       <div><strong>Total Price:</strong></div>
    </div>
    <div class="w-col w-col-2">
       <div><strong>{{number_format($total_price);}} VND</strong></div>
    </div>
 </div>
  <div class="w-row">
    <div class="w-col w-col-9">
       <div class="w-form">
          <form method="post" action="" id="email-form" name="email-form" data-name="Email Form">
             <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
             <input type="hidden" name="checkCoupon" value="1">
             <div>Please enter coupon if needed</div>
             @if ($errors->has('coupon')) <p class="label label-danger">{{ $errors->first('coupon') }}</p> @endif
             <input class="w-input" id="coupon-2" type="text" placeholder="Coupon code" name="coupon" value="<?= Input::old("coupon") ?>" data-name="Coupon">
             <input class="w-button" type="submit" value="Check Coupon" data-wait="Please wait...">
          </form>
       </div>
    </div>
    <div class="w-row">
        <div class="w-col w-col-9">
           
        </div>
        <div class="w-col w-col-3" vertical-align="true">
           
        </div>
     </div>
     <div class="w-row">
        <div class="w-col w-col-9">
           <div class="w-form">
              <form method="post" action="" id="email-form" name="email-form" data-name="Email Form">
                 <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                 <div>Enter address information&nbsp;(*)</div>
                 <textarea class="w-input" id="field" placeholder="Enter your address" name="email"></textarea>
              </form>
           </div>
        </div>
        <div class="w-col w-col-3">
           
        </div>
     </div>
      <div class="w-row">
        <div class="w-col w-col-9">
           
        </div>
        <div class="w-col w-col-3">
            <div class="w-form">
             <div class="w-row">
                <form id="email-form" name="email-form" data-name="Email Form" action="{{route('member.product')}}">
                    <div class="w-col w-col-8">
                        <input class="w-button" type="submit" value="Continue Shopping" data-wait="Please wait...">
                    </div>
                </form>
                <form method="post" id="email-form" name="email-form" data-name="Email Form" action="{{route('member.register_order')}}">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="w-col w-col-4">
                        <input class="w-button" type="submit" value="Register Order" data-wait="Please wait..." style="background-color:blue">
                    </div>
                 </form>
             </div>
           </div>
      </div>
     </div>
 </div>
 <?php else: ?>
 <div class="w-col w-col-3">
    <div class="w-form">
      <form id="email-form" name="email-form" data-name="Email Form" action="{{route('member.product')}}">
         <div class="w-row">
            <div class="w-col w-col-8"><input class="w-button" type="submit" value="Continue Shopping" data-wait="Please wait..."></div>
         </div>
      </form>
   </div>
 </div>
 <?php endif; ?>

@stop