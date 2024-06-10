

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Checkout</title>
    <link rel="stylesheet" href="../css/artist.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="../css/header.css" />

    <script src="../js/common.js" defer></script>
    <script src="../js/checkout.js" defer></script>
  </head>
  <body>
    <main>
      <!-- Header -->
        <?php require_once('../header.php'); ?>


      <div class="container">
        <div class="cart">
          <div class="sum">
            <div class="sumQuantity">Τεμάχια: <span>2</span></div>
            <div class="sumAmount">Σύνολο: <span>10€</span></div>
          </div>
          <div class="product">
            <div class="cd" data-amount="5">
              <div class="img">
                <img src="../images/covers/801.jpg" alt="CD Cover" />
              </div>
              <div class="details">
                <div class="title">Αλανιάρικες πενιές</div>
                <div class="artistName">Δημήτρης Χιονάς</div>
              </div>
            </div>
            <div class="quantity">
              <div class="delete">
                <div class="amount">5€</div>
                <img src="../icons/delete.png" alt="Delete" title="Αφαίρεση από το καλάθι" />
              </div>
              <div class="field">
                <button class="decrement">-</button>
                <input type="number" name="" id="" min="1" max="9" value="1" readonly />
                <button class="increment">+</button>
              </div>
            </div>
          </div>

          <div class="product">
            <div class="cd" data-amount="5">
              <div class="img">
                <img src="../images/covers/801.jpg" alt="CD Cover" />
              </div>
              <div class="details">
                <div class="title">Αλανιάρικες πενιές</div>
                <div class="artistName">Δημήτρης Χιονάς</div>
              </div>
            </div>
            <div class="quantity">
              <div class="delete">
                <div class="amount">5€</div>
                <img src="../icons/delete.png" alt="Delete" title="Αφαίρεση από το καλάθι" />
              </div>
              <div class="field">
                <button class="decrement">-</button>
                <input type="number" name="" id="" min="1" max="9" value="1" readonly />
                <button class="increment">+</button>
              </div>
            </div>
          </div>
        </div>
        <div class="form">
          <h2>Στοιχεία αποστολής</h2>

          <form action="submit_order.php" method="post" autocomplete="on">
            <div>
              <label for="name">Όνομα:</label>
              <input type="text" id="name" name="name" />
            </div>

            <div>
              <label for="email">Email:</label>
              <input type="email" id="email" name="email" />
            </div>

            <div>
              <label for="address">Διεύθυνση:</label>
              <input type="text" id="address" name="address" />
            </div>

            <div>
              <label for="city">City:</label>
              <input type="text" id="city" name="city" />
            </div>

            <div>
              <label for="zip">Τ.Κ.:</label>
              <input type="text" id="zip" name="zip" />
            </div>

            <div class="checkbox">
              <input type="checkbox" id="promotions" name="promotions" />
              <label for="promotions">Θέλω να λαμβάνω ενημερώσεις για νέα τραγούδια</label>
            </div>

            <input type="submit" value="Αποστολή παραγγελίας" />
            <p>Οι παραγγελίες στέλνονται με αντικαταβολή</p>
          </form>
        </div>
      </div>
    </main>
  </body>
</html>
