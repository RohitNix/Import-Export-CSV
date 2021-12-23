<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>CSV Import ?Export</title>
</head>
<body>
    <form action="function.php" method="POST" enctype="multipart/form-data" name="import_excel">
    	<input type="file" name="csv" ><br><br>
    	<input type="submit" name="import">
    </form>

    <h3>Click To Export the Table into CSV Format </h3>
   <form action="function.php" method="POST" enctype="multipart/form-data" name="export_excel">
    	<input type="submit" name="export" value="Export">
    </form>
</body>
</html>