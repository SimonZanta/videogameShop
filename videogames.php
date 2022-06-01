<!DOCTYPE html>
<html lang="en">
<head>
  <title>videgameShop</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
  <?php include 'index.css' ?>
</style>
</head>

<body>
  <div class = "content">
    <div class = "container">
     
        <div class = "row">
          <div class = "col-lg-10">
            <img src = "pics/logo2.png" class="nadpis1">
          </div>
          <div class = "col-lg-2 horniPanel">
            <a href=""> přihlášení </a>
            |
            <a href=""> registrace </a>
          </div>
        </div>
        <hr style="height:3px">
      <?php 

      //nastavuje připojení
      $connection = new mysqli("localhost", "root", "", "videohry");

     //ověřuje jestli je připojení stabilní
      if ($connection->connect_error) {
      die("Connection failed: " . $connection->connect_error);
      }

      //query pro vytažení všech dat z tabulky
      $sqlQ = "select * from videohryTable";
      $query = $connection -> query ($sqlQ);

      //random proměnné co jsou potřeba
      $cellWidth = "width = 10%";
      ?>

     <?php
     //priprava a odeslani dat do databaze z formulare
      if (isset($_POST["submit"]))
      {  

      $nazevG = $_REQUEST["nazev"];
      $vyvojarG = $_REQUEST['vyvojar'];
      $zanrG = $_REQUEST['zanr'];
      $cenaG = $_REQUEST['cena'];
      $datumG = $_REQUEST['datumVydani'];    
      print_r($datumG);
      $stmt = $connection->prepare("
      INSERT INTO videohryTable (nazev, vyvojar, zanr, cena, datumVydani) 
      VALUES (?, ?, ?, ?, ?);");
      $stmt->bind_param(
      "sssds", $_POST['nazev'], $_POST['vyvojar'], $_POST['zanr'], $_POST['cena'], $_POST['datumVydani']); 
      $stmt->execute();
      $stmt->close();
      header("refresh:0.2; url=videogames.php");
      }
      ?>



      
  
      
      <div class = "row">
        <div class = "col-lg-3"> 
          <form action="" method="post" class = "zadavani"> 
          <div class="form-group">   
            <p>přidání nových položek</p>    
            <div class="sendForm"><input class="form-control sendForm" type="text" name="nazev"  placeholder="název" required></div>
            <div class="sendForm"><input class="form-control sendForm" type="text" name="vyvojar" placeholder="vývojář"  required></div>
            <div class="sendForm"><input class="form-control sendForm" type="text" name="zanr" placeholder="žánr"  required></div>
            <div class="sendForm"><input class="form-control sendForm" type="text" name="cena" placeholder="cena €"  required></div>
            <div class="sendForm"><input class="form-control sendForm" type="date" name="datumVydani" placeholder="datum vydáni"  required></div>
            <div class="sendForm"><input class="form-control sendForm" type="submit" name="submit" placeholder="odeslat"  required></div>
            </div>
          </form>
          <img class="img" src="pics/hollowKnight.jpg">
        </div>

        <div class = "col-lg-9">
          <table style="width:95%" class="table" id="table">
          <tr>
            <th>název:</th>
            <th>vývojář: </th>
            <th>žánr: </th>
            <th>cena: </th>
            <th>datum vydání: </th>
            <th></th>
          </tr>
          <?php
        //vkládá hodnoty z databáze do tabulky na stránce
        if ($query -> num_rows > 0) {
            while($row = $query->fetch_assoc()) {
                echo  
                  ' <tr> 
                    <td '.$cellWidth.'>'.$row["nazev"].'</td>'.
                    '<td '.$cellWidth.'>'.$row["vyvojar"].'</td>'.
                    '<td '.$cellWidth.'>'.$row["zanr"].'</td>'.
                    '<td '.$cellWidth.'>'.$row["cena"]. " €" .'</td>'.
                    '<td '.$cellWidth.'>'.$row["datumVydani"].'</td>'.           
                    '<td width = 5%><a href = delete.php?id='.$row["id"].'> <img src="pics/trash2.png" width = 40%> </a> </td>'.
                  '</tr>';    
            }
          }else {?> 
            </table> 
        </div>
      </div>
            <div><p class="EmptyTable">prazdna tabulka</p></div> <?php } ?>
         
        </table>

        <?php
        $page = 1;
        if (isset($_GET['page'])) $page = $_GET['page'];
        $pageCount = 10;
        ?>
        
        <ul class="pagination">
          <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
          
          
              <?php
              for ($i=1; $i <= $pageCount; $i++){?>
              <li class="page-item"><a class="page-link" href="#"><?php echo $i; ?></a></li>
              <?php } ?>


          <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
        </div>
      </div>
      
      </div>
        <footer id= "footer" >  
        
        <div class = "row">
          <div class = "col-md-8 FooterText">
          ©Šimon Žanta, 2022
        </div>
        <div class = "col-md-1 XD"> 
          kontakty
        </div>   
        <div class = "col-md-1 XD"> 
          o nás
        </div>   
        <div class = "col-md-1 XD"> 
          odkazy
        </div>   
      </div> 
      </footer> 
  </div>
</body>

</html>