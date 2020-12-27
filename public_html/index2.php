<!DOCTYPE html>
<html>
<body>

<h2>HTML Forms</h2>

<form action="/weather.php" method="post">
  <label for="location">Location:</label><br>
  <input type="text" id="location" name="location"><br>
  <label for="bdate">Date:</label><br>
  <input type="date" id="bdate" name="bdate"><br><br>
  <button type="submit" name="weather-submit" value="weather-submit">
</form> 

<p>If you click the "Submit" button, the form-data will be sent to a page called "/action_page.php".</p>

</body>
</html>