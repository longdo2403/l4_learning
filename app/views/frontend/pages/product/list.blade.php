@extends('frontend.layouts.master')
@section('content')
<div class="w-row">
    <div class="w-col w-col-9">
       <h1>List of product</h1>
    </div>
    <div class="w-col w-col-3">
       <div>User {{Auth::user()->user_name}}, <a href="{{route('member.logout')}}">logout</a></div>
    </div>
</div>
<?php if (!$listProduct->isEmpty()): ?>
    <div class="w-row">
        <div class="w-col w-col-1">
           <div><strong>No</strong></div>
        </div>
        <div class="w-col w-col-5">
           <div><strong>Product</strong></div>
        </div>
        <div class="w-col w-col-3">
           <div><strong>Price</strong></div>
        </div>
        <div class="w-col w-col-3">
           <div><strong>Quantity</strong></div>
        </div>
    </div>
    <?php foreach ($listProduct as $index => $item): ?>
     <div class="w-row">
        <div class="w-col w-col-1">
           <div>{{ $index+1 }}</div>
        </div>
        <div class="w-col w-col-5">
           <div><?= SecurityHelper::xss_clean($item->name); ?></div>
        </div>
        <div class="w-col w-col-3">
           <div><?= number_format(SecurityHelper::xss_clean($item->sale_price)); ?> VND</div>
        </div>
        <div class="w-col w-col-3">
           <div class="w-form">
              
              <form method="post" id="add-cart-form" name="add-cart-form" data-name="Add Cart Form" action="{{route('member.addtocart')}}">
                <?php $name = "pro{$item->id}_quantity"; ?>
                @if ($errors->has($name)) <p class="label label-danger">{{ $errors->first($name) }}</p> @endif
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input type="hidden" name="pro_id" value="<?= SecurityHelper::xss_clean($item->id); ?>">
                <input type="hidden" name="pro_name" value="{{$name}}">
                <input class="w-input" id="pro1_quantityuantity" type="text" placeholder="Enter product's quantity" name="{{$name}}" value="<?= Input::old("$name") ?>" data-name="pro1_quantity" style="width: 180px;">
                <input class="w-button" type="submit" value="Add to Cart" data-wait="Please wait...">
              </form>
           </div>
        </div>
     </div>
     <?php endforeach; ?>
<?php endif; ?>

@stop