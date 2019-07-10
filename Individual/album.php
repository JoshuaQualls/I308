<!doctype html>
<html>
   <body>
      <h2>Album Table</h2>
      <h3>Insert a new Album</h3>
      <form action="insertalbum.php" method="POST">
         Title: <input type="text" name="title" maxlength=256 size=50 required><br><br>
         Band: <select type="text" name="bid" required>
         <?php
            $con=mysqli_connect("db.soic.indiana.edu","i308f18_team82","my+sql=i308f18_team82", "i308f18_team82");
            // Check connection
            if (!$con) {
                die("Connection failed: " . mysqli_connect_error());
            }
                $result = mysqli_query($con,"SELECT name, bid FROM band ORDER BY name");
                while ($row = mysqli_fetch_assoc($result)) {
                              unset($id, $name);
                              $id = $row['bid'];
                              $name = $row['name'];
                              echo '<option value="'.$id.'">'.$name.'</option>';
            }
            ?>
         </select><br><br>
         Published Year: <input type="number" name="pyear" min="1900" max="2020" required><br><br>
         Publisher: <input type="text" name="pub" maxlength=256 size=50 required><br><br>
         Format: 
         <select type="text" name="format">
            <option value="CD">CD</option>
            <option value="Download">Download</option>
            <option value="Phonograph">Phonograph</option>
            <option value="Vinyl">Vinyl</option>
         </select>
         <br><br>
         Price: $<input type="number" name="price" min="0" max="99999.99" step="0.01" required> Between $0 and $99,999.99<br><br>
         <input type="submit" value="Insert Album">
      </form>
      <h3>Select all Albums</h3>
      <form action="selectalbum.php" method="post">
         <input type="submit" name="submit" value="Select Album table">
      </form>
   </body>
</html>