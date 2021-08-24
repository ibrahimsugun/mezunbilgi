<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Mezun Görüntüleme</title>

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
            <div class="panel-heading">MEZUN ÖĞRENCİ LİSTESİ </div>
			
            <table class="table table-hover" id="JsonTablo">
			<thead>
			<tr>
			<th style="width:200px;"> <div >
			ADI <input style="width:100px; margin-left:1.6rem;" type="text" id="myInput" onkeyup="myFunction()" placeholder="Ara">
			</div></th>
			
			<th style="width:300px;"> <div >
			BÖLÜM
			<select style="width:160px; margin-left:1.6rem;padding:0.4rem;" id="myInput2" placeholder="Bölüm"  onchange="myFunction2()" required>
               <option></option>
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
			</div></th>
			<th style="width:300px;">ÖĞRENCİ NO</th>
			<th>Mezuniyet Tarihi</th>
			<th>GNO</th>
			</tr>
			</thead>
              <tbody>  </tbody>
            </table>
          </div>
      </div>
    </div>
  </div>
  <!-- /.row --> 
  
</div>
<script> //İsme göre filtreleme 
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("JsonTablo");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
<script> //İsme göre filtreleme 
function myFunction2() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput2");
  filter = input.value.toUpperCase();
  table = document.getElementById("JsonTablo");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
<!-- /.container --> 


<script src="js/jquery.js"></script> 

<!-- Bootstrap Core JavaScript --> 
<script src="js/bootstrap.min.js"></script>

<!-- Bootstrap Core JavaScript --> 
<script type="text/javascript">

	async function sil(id) {

		await fetch('http://localhost:3301/sil', {

			method: "post",
			headers: {
				"Content-Type" : "application/json"
			},
			body: JSON.stringify({ id })
		}).then(x => x.json())
		
		location.reload();
	}
$(document).ready(function(){

		
	$.getJSON( "js/veri.json",function(veri){
			
			for(var i = 0; i<veri.ogrenciler.length;i++){
			
			if(veri.ogrenciler[i].cinsiyet == "Male"){
			var renk = "#CEEBFB";
			var Cns = "Erkek";
			}else{
			var renk = "#FFC3CE";
			var Cns = "Kadın";
			}
			
			var TblSatir = '<tr>\
				<td>'+veri.ogrenciler[i].isim+' '+veri.ogrenciler[i].soyisim+'</td>\
				<td>'+veri.ogrenciler[i].bolum+'</td>\
				<td>'+veri.ogrenciler[i].no+'</td>\
				<td>'+veri.ogrenciler[i].tarih+'</td>\
				<td>'+veri.ogrenciler[i].not+'</td>\
				<?php if( isset($_GET['admin'])){
					?><td><button onclick="sil(\'' + veri.ogrenciler[i].no + '\')">Sil</button></td>\
				<?php } ?>
				</tr>';
				$("#JsonTablo tbody").append(TblSatir);
		 
		
		}
			
			
		});
		
		
		
});
</script>
</body>
</html>

