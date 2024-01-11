<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>
</head>
<body>
    
    <form action="server.php" method="POST" enctype="multipart/form-data">
        <section>
            <label for="username">User Name</label>
            <input type="text" name="username" id="username" />
        </section>
        <section>
            <label for="picture">User Name</label>
            <input type="file" name="picture" id="picture" />
        </section>
        <input type="submit" value="Upload" />
    </form>

</body>
</html>