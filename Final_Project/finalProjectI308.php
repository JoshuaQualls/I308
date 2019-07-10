<!doctype html>
<html>
   <body>
   <h1>Assigned Queries</h1>
   <h2>Class Roster and GPA (1b)</h2>
   <i>Suggested: 3 | Computer Science 212 &nbsp&nbsp&nbsp&nbsp Overall GPA : 1.42</i>
      <form action="getRoster.php" method="POST">
      Section: <select type="text" name="sectionID" required>
      <?php
      $con=mysqli_connect("db.soic.indiana.edu","i308f18_team82","my+sql=i308f18_team82", "i308f18_team82");
            // Check connection
            if (!$con) {
                die("Connection failed: " . mysqli_connect_error());
            }
        $result = mysqli_query($con, "SELECT se.sectionID, c.title AS title FROM section AS se, course AS c WHERE se.courseID = c.courseID ORDER BY sectionID");
        while($row = mysqli_fetch_assoc($result)){
        	unset($id, $name);
        	$id = $row['sectionID'];
        	$name = $row['title'];
        	 echo '<option value="'.$id.'">'.$id. ' | ' .$name.'</option>';
            }
            ?>
         </select><br><br>
         <input type="submit" value="Find Roster">
      </form>
      
      <br> 
      <br>
      
      <h2>Never Taught a Class (3b)</h2>
      <i>Suggested: Computer Science 212 &nbsp&nbsp&nbsp&nbsp Results: 8</i>
      <form action="neverTaught.php" method="POST">
      Section: <select type="text" name="courseID" required>
      <?php
      $con=mysqli_connect("db.soic.indiana.edu","i308f18_team82","my+sql=i308f18_team82", "i308f18_team82");
            // Check connection
            if (!$con) {
                die("Connection failed: " . mysqli_connect_error());
            }
        $result = mysqli_query($con, "SELECT courseID AS 'courseID', title AS 'Course Name' FROM course AS c ORDER BY title");
        while($row = mysqli_fetch_assoc($result)){
        	unset($id, $name);
        	$id = $row['courseID'];
        	$name = $row['Course Name'];
        	 echo '<option value="'.$id.'">'. $name . '</option>';
            }
            ?>
         </select><br><br>
         <input type="submit" value="Find Faculty">
      </form>
      
      <br> 
      <br>
      
      <h2>Find Prerequisite Violators (4c)</h2>
      <form action="findViolators.php" method="POST">
         <input type="submit" value="Find Violators">
      </form>
      
      <br>
      <br>
      
      <h2>Find Roster for Building (7a)</h2>
      <i>Suggested: Ballantine &nbsp&nbsp&nbsp&nbsp Results: 8</i>
      <form action="dormRoster.php" method="POST">
         Building: <select type="text" name="buildingID" required>
         <?php
            $con=mysqli_connect("db.soic.indiana.edu","i308f18_team82","my+sql=i308f18_team82", "i308f18_team82");
            // Check connection
            if (!$con) {
                die("Connection failed: " . mysqli_connect_error());
            }
                $result = mysqli_query($con,"SELECT name, buildingID FROM building ORDER BY buildingID");
                while ($row = mysqli_fetch_assoc($result)) {
                              unset($id, $name);
                              $id = $row['buildingID'];
                              $name = $row['name'];
                              echo '<option value="'.$id.'">'.$name.'</option>';
            }
            ?>
         </select><br><br>
         <input type="submit" value="Get Roster">
      </form>
      
      <br>
      <br>

      
      <h2>Select Eligible Students (9c) </h2>
      <form action="eligibleStudents.php" method="POST">
         <input type="submit" name="submit" value="Select Students">
      </form>
      
      <br>
      
      <h1>Additional Queries</h1>
      <h2>Faculty and Their Emails</h2>
      <form action="facultyEmails.php" method="POST">
      <input type="submit" name="submit" value="Get Emails">
      </form>
      
      <br>
      <br>
      
       <h2>Faculty and Their Offices</h2>
      <form action="facultyOffice.php" method="POST">
      <input type="submit" name="submit" value="See Office">
      </form>
      
      <br>
      <br>
      
      <h2>Department Chairs</h2>
      <form action="departmentChair.php" method="POST">
      <input type="submit" name="submit" value="Get Chairs">
      </form>
      
      <br>
      <br>
      
      <h2>Students and Parent Phone</h2>
      <form action="parentInfo.php" method="POST">
      <input type="submit" name="submit" value="Get Numbers">
      </form>
      
       <br>
      <br>
      
      <h2>Students and Parent Email</h2>
      <form action="parentEmail.php" method="POST">
      <input type="submit" name="submit" value="Get Emails">
      </form>
   </body>
</html>