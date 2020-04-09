<!Doctype html>
<html>
<head>
	<title>PHP Dasar - Kalkulator</title>
</head>
<body>
<?php
if (isset($_POST["submit"])){
	$satu = $_POST["satu"];
	$dua = $_POST["dua"];
	$operator = $_POST["operator"];

	if($operator == "+"){
		$hasil = $satu+$dua;
	}elseif($operator == "-"){
		$hasil = $satu-$dua;
	}elseif($operator == "x"){
		$hasil = $satu*$dua;
	}elseif($operator == "/"){
		$hasil = $satu/$dua;
	}else{
		echo "Mohon Pilih Operator Terlebih dahulu gengs";
	}	
}
?>
<div class="kalkulator">
        <h2 class="judul">KALKULATOR</h2>
	<form method="post" action="">
		<table>
			<tr>
				<td colspan="2"><input type="text" name="satu" placeholder="Masukan Bilangan Pertama"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="text" name="dua" placeholder="Masukan Bilangan Kedua"></td>
			</tr>
			<tr>
				<td colspan="2">
					<select name="operator">
						<option>- Pilih Operasi -</option>
						<option value="+">+ (tambah)</option>
						<option value="-">- (kurang)</option>
						<option value="x">x (kali)</option>
						<option value="/">/ (bagi)</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><input type="reset" name="reset" value="Hapus">
			<input type="submit" name="submit" value="Hitung"></td>
			</tr>
      <tr>
	    <?php if(isset($_POST["submit"])){ ?>
		  <td colspan="2"><input type="text" name="hasil" value="<?php echo $hasil ?>"></td>
	    <?php } ?>
      </tr>
	</form>
</body>
</html>