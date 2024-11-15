<div class="container mt-3">
  <h2>Cart</h2>          
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Product Image</th>
        <th>Name product</th>
        <th>Price</th>
        <th>Quantity</th>
         <th>Subtotal</th>
        
      </tr>
    </thead>
    <tbody>
    <?php
            // var_dump($results);
            if (isset($cart) && (count($cart) > 0)) {
                $i = 1;
                // từ cái mảng result chạy qua các item là product
                foreach ($cart as $cart) {
                    echo '
                        <tr>
                            <td>' . $i . '</td>
                            <td>' . htmlspecialchars($cart[0]) . '</td>
                           
                        </tr>
                            ';
                    $i++;
                }
            }
            ?>
            <tr>
      </tr>
    </tbody>
  </table>
</div>