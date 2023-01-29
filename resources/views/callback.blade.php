<!DOCTYPE html>
<html>
<head>
  <title>Iyizico result</title>
</head>
<body>
  <style>
    body { text-align: center; padding: 150px; }
    h1 { font-size: 50px; }
    body { font: 20px Helvetica, sans-serif; color: #333; }
    article { display: block; text-align: left; width: 650px; margin: 0 auto; }
  </style>

  <article>
    <?php if($paymentStatus == 'SUCCESS'){ ?>
        <h1>Paid Successfully</h1>
    <?php }else{ ?>
        <h1>An error occured</h1>
    <?php } ?>

  </article>
</body>
</html>
