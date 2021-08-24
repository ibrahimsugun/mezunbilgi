
  
<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Öğrenci Ekleme</title>

<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<style>
body {
	padding-top: 70px;/* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
}
</style>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Menü'yü Genişlet</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <?php
      
      require_once('./header.php')
      ?>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container --> 
</nav>

<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="container" >
        <div class="panel panel-default">
          <div class="clearfix">&nbsp;</div>




          <form class="form-horizontal" id="form">
            <div class="form-group">
              <label for="inputIsim" class="col-sm-2 control-label">İsim</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="inputIsim" placeholder="İsim" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputSoyisim" class="col-sm-2 control-label">Soyisim</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="inputSoyisim" placeholder="Soyisim" required>
              </div>
            </div>
            <!-- <div class="form-group">
              <label for="inputOkul" class="col-sm-2 control-label">Fakülte</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="inputOkul" placeholder="Fakülte Adı" required>
              </div>
            </div> -->
              <div class="form-group">
              <label for="inputIsim" class="col-sm-2 control-label">Bölüm</label>
              <div class="col-sm-9">
                <select  class="form-control" id="inputBolum" placeholder="Bölüm"   required>
                <?php
                $bolumler = ["Matematik","Fizik","Kimya","Biyoloji","Antropoloji","Acil Yardım ve Afet Yönetimi","Bitki Koruma",
                "İngiliz Dili ve Edebiyatı","Alman Dili ve Edebiyatı","Fransız Dili ve Edebiyatı","Bilgisayar Mühendisliği",
                "Biyomedikal Mühendisliği","Çevre Mühendisliği","İnşaat Mühendisliği","Makine Mühendisliği","Gıda Mühendisliği",
                "Tıp Fakültesi","İşletme","Maliye","İlahiyat"];
              foreach($bolumler as $bolum ) {
              ?>

   <option value="<?=$bolum?>"><?=$bolum?></option>

<?php } ?>

                
                </select> 
              </div>
            </div>

            <div class="form-group">
              <label for="inputIsim" class="col-sm-2 control-label" >Öğrenci No</label>
              <div class="col-sm-9">
                <input type="text" pattern="[0-9]{10}" title="Öğrenci Numarası 10 adet rakamdan oluşmalıdır." maxlength="10" class="form-control" id="inputOgrenciNo" placeholder="Öğrenci No"  required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputIsim" class="col-sm-2 control-label">Diploma Notu</label>
              <div class="col-sm-9">
                <input type="number" step="0.01" pattern="[0-9]{1}" title="Diploma notu 2.00 ile 4.00 arasında olmalıdır." min="2" max="4" class="form-control" id="inputPuan" placeholder="Mezuniyet Puanı" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputTarih" class="col-sm-2 control-label">Mezuniyet Tarihi</label>
              <div class="col-sm-9">
                <input type="date"  class="form-control" id="inputTarih" placeholder="Tarih seçiniz" required>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-2">&nbsp;</div>
              <div class="col-sm-9">
                <button type="submit" class="btn btn-default" id="OlusturBtn">Oluştur</button>
              </div>
            </div>
             <div class="alert alert-warning" style="width:80%;margin:20px auto;display:none;" id="FormUyari">   </div>
             
          </form>
          
        </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- /.row --> 
  
</div>
<!-- /.container --> 

<!-- jQuery Version 1.11.1 --> 
<script src="js/jquery.js"></script> 

<!-- Bootstrap Core JavaScript --> 
<script src="js/bootstrap.min.js"></script> 

<!-- Bootstrap Core JavaScript --> 
<script type="text/javascript">
	
	$("#form").on("submit",async function(e){
   
	        e.preventDefault()

          //if($("#inputOgrenciNo").val().length != 10)
          //  return alert ("Öğrenci numarası 10 haneli olmalıdır!")

          const response = await fetch('http://localhost:3301', {
            method: "POST",
            headers : {
              "Content-Type" : "application/json"
            },
            body: JSON.stringify( {
              isim :  $("#inputIsim").val(),
              soyisim : $("#inputSoyisim").val(),
              //fakulte :  $("#inputOkul").val(),
              bolum : $("#inputBolum").val(),
              no : $("#inputOgrenciNo").val(),
              not : $("#inputPuan").val(),
              tarih : $("#inputTarih").val()

            })
          })
        
          window.location.href = "/mezunbilgi/"
		});
  
</script>
</body>
</html>


