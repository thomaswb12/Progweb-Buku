<?php
    session_start();
    include "member.php";

    if(!empty($_POST["tombolOk"])){
        $id=getLastIdMember();
        $nama=$_POST["namaMember"];
        $noIdentitas=$_POST["namaMember"];
        $gender=$_POST["gender"];
        if($gender==0) $gender="Wanita";
        else if($gender==1) $gender="Pria";        
        $lahir=$_POST["tanggalLahir"];
        $email=$_POST["email"];
        $noTelp=$_POST["noTelp"];
        $alamat=$_POST["alamat"];
        if($nama==""||$noIdentitas==""||$lahir==""||$email==""||$noTelp==""||$alamat==""){
            $_SESSION["belum"]=true;
            ?>
            <script>
                alert("Data belum lengkap!");
            </script>
            <?php
            //header ("location:../kasir/KasirDefault.php");
        }
        else{
            $query = "SELECT * FROM member WHERE noIdentitas = '$noIdentitas'";
			$hasil = mysqli_query($conn,$query);
			$count = mysqli_num_rows($hasil);
            if($count>0){
				?>
				<script type="text/javascript">
					alert("Sudah menjadi member!");
				</script>
				<?php	
            }
            else{
                $query="INSERT INTO `member` (`id`, `nama`, `alamat`, `birtday`, `saldo`, `noTelp`, `idIdentitas`, `gender`, `email`) VALUES ('$id', '$nama', '$alamat', '$lahir', '0', '$noTelp', '$noIdentitas', '$gender', '$email');";
                $result=mysqli_query($conn,$query);
                //header ("location:../kasir/KasirDefault.php");
            }
        }
    }
?>