<!DOCTYPE html>
<html>
<head>
  <title>Iyizico Payment</title>
</head>
<body>
  <style>
    body { text-align: center; padding: 150px; }
  </style>

  <article>
    <div>
        @if ($paymentStatus == 'success')
        <div id="iyzipay-checkout-form" class="responsive"></div>
        {!! $paymentContent !!}
        @else
        Failed
        @endif
    </div>
  </article>
</body>
</html>
