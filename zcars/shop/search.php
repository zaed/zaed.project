    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>sttuner product search</title>
    </head>
    <?php
    // creat short variable names
    $searchtype=$_POST ['searchtype'];
    $searchterm=trim($_POST['searchterm']);
	
    if (!$searchtype || !$searchterm) {
        echo 'you have not entered search details. please go back and try again.';
        exit;
    }
    if (!get_magic_qoutes_gpc() {
        $searchtype = addslashes ($searchtype);
        $searchterm = addslashes ($searchterm);
    }
	
    @ $db = new mysqli('localhost', 'category','part');
    if (mysqli_connect_errno()){
        echo 'error: could not connect to database. please try again later.';
        exit;
    }
    $query = "select * from category where ".$searchtype." like '%".$searchterm."%'";
    $result = $db->query($query);
    
    $num_results = $result_>num_rows;
    
    echo "<p>number of product found: ".$num_results."</p>;
    
    for ($i=0; $i <$num_results; $i++) {
            $row = $result_>fetch_assoc();
            echo htmlspecialchars(stripslashes($row['compname']));
            echo"</strong><br />company; ";
            echo stripslashes ($row['company']);
            echo "<br />pname; ";
            echo stripslashes ($row ['company']);
            echo "<br />price: ";
            echo stripslashes($row['price']);
            echo "</p>
    }
    $result->free();
    $db->close();
    
    ?>
    <body>
    </body>
    </html>