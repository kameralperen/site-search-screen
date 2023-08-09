<?php
require_once("baglan.php");

?>
<!DOCTYPE html>
<html lang="tr-TR">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-language" content="tr">
<title>Başlık</title>
</head>
<body>
    <form action="aramayap.php" method="post">
        <table width=500 cellpadding=0 cellspacing=0 border=0 align=center>
            <tr>
                <td height=30 align=center><input type="text" name="kelime" style="width: %100; height: 30px; margin-bottom:20px; padding: 0 20px;"></td>
            </tr>
            <tr>
                <td height=30 align=center><input type="submit" value="Arama Yap" style="padding: 0 30px; height:20px;"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
        </table>
    </form>
    
    <?php
    if(isset($_POST["kelime"])) {
        $GelenKelime = filtrele($_POST["kelime"]);

        $Sorgu      =   $db->prepare("SELECT * FROM icerikler WHERE adi LIKE '%$GelenKelime%'");
        $Sorgu->execute();
        $Kayitlar   =   $Sorgu->fetchAll(PDO::FETCH_ASSOC);
    }
    ?>
    <table width=500 cellpadding=0 cellspacing=0 border=0 align=center>
        <tr>
            <td height=30 align=center><?php echo "Bulunan sonuçlar: <br />";
             foreach($Kayitlar as $Sonuclar){ echo $Sonuclar["adi"] . "<br />";
              } ?>
              </td>
        </tr>
        <tr>
            <td height=30 align=center><a href="index.php" style="text-decoration: none; color:black;">Ana sayfaya dönmek için bana bas</a></td>
        </tr>
    </table>
</body>
</html>
<?php
    $db     =   null;
?>