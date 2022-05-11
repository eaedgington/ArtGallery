<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>My Art Gallery Database</title>
  </head>
  <body>
    <div class="bg">
      <nav>
            <ul>
              <li><a href="index.html">Art Work</a></li>
              <li><a href="#addcustomer">Add to Customers</a></li>
            </ul>
        </nav>
      <?php require("database.php"); ?>
      <h1>Customer Database</h1>
      <table>
        <hr>
        <tr>
          <th>Customer ID</th>
          <br>
          <th>Gallery ID</th>
          <br>
          <th>First Name</th>
          <th>Last Name</th>
          <br>
          <th>Date of Birth</th>
          <br>
          <th>Address</th>
          <br>
        </tr>
      </table>
      <?php
        $sql =
          "SELECT f_name, l_name, dob, address
          from customer
          JOIN artwork
          using (g_id)
          ORDER BY cust_id DESC";
        $statement = $db->prepare($sql);
        $statement->execute();
        $custs = $statement->fetchAll();
        foreach( $custs as $cust )
       ?>

       <!-- cust_id,g_id,art_id,f_name,l_name,address,dob -->
      <div id="addcustomer">
        <tr>
          <td>
            <?php echo $cust['f_name']; ?>
          </td>
          <td>
            <?php echo $cust['l_name']; ?>
          </td>
          <td>
            <?php echo $cust['dob']; ?>
          </td>
          <td>
            <?php echo $cust['address']; ?>
          </td>
          <td>
          <?php echo $cust['g_id']; ?>
      </div>
      <?php endforeach; ?>
<!-- NEW CUST -->
      <form action="customerinsert.php" method="post">
        <div class="container">
          <div class="instructions">
            <h3>Fill out the form to add to the customer database</h3>
          </div>

          <br><br>
          <label for="f_name">First Name</label>
          <input type="text" name="fname" placeholder="Enter First Name">
          <br><br>
          <label for="l_name">Last Name</label>
          <input type="text" name="lname" placeholder="Enter Last Name">
          <br><br>
          <label for="dob">Date of Birth</label>
          <input type="date" name="dob" placeholder="Enter Date of Birth">
          <br><br>

          <label for="address">Address</label>
          <input type="text" name="address" placeholder="Enter Address">
          <br><br>

          <!-- <br><br>
          <label for="G_ID">Gallery ID</label>
          <input type="text" name="g_id" placeholder="Enter Gallery ID">
          <br><br>
          <label for="art_id">Artwork ID</label>
          <input type="text" name="art_id" placeholder="Enter Artwork ID">
          <br><br> -->

          <button type="submit">Submit</button>
          <button type="reset">Reset</button>

        </div>
      </form>

    </div>
  </body>
</html>
