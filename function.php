<?php 

// koneksi ke database
$conn = mysqli_connect("localhost","root","","namadb");

// function query
function query($query){
	// memanggil variabel global con agar dapat dikenali di function ini
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result) ){
		$rows[] = $row;
	}
	return $rows;
}


// function ubah
function ubah($data){
	global $conn;

	$id = htmlspecialchars($data["customer_id"]);
	$nama = htmlspecialchars($data["customer_name"]);
	$alamat = htmlspecialchars($data["customer_address"]);
	$layanan = htmlspecialchars($data["customer_service"]);

	$query = "UPDATE customer SET 
	customer_name = '$nama',
	customer_address = '$alamat',
	customer_service = '$layanan'
	WHERE customer_id = '$id' ";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function ubahpop($data){
	global $conn;

	$id = htmlspecialchars($data["pop_id"]);
	$nama = htmlspecialchars($data["pop_name"]);
	$alamat = htmlspecialchars($data["pop_address"]);
	
	$query = "UPDATE pop SET 
	pop_name = '$nama',
	pop_address = '$alamat'
	WHERE pop_id = '$id' ";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function ubahdevice($data){
	global $conn;

	$id = htmlspecialchars($data["device_id"]);
	$type = htmlspecialchars($data["device_type"]);
	$ip = htmlspecialchars($data["device_ip"]);
	$ip_add = htmlspecialchars($data["device_ip_add"]);
	
	$query = "UPDATE device SET 
	device_type = '$type',
	device_ip = '$ip',
	device_ip_add = '$ip_add'
	WHERE device_id = '$id' ";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


function ubahadmin($data){
	global $conn;

	$id = htmlspecialchars($data["id"]);
	$uname = htmlspecialchars($data["username"]);
	$un = htmlspecialchars($data["uname"]);
	$pw = htmlspecialchars($data["password"]);
	
	$query = "UPDATE admin SET 
	username = '$uname',
	uname = '$un',
	password = '$pw'
	WHERE id = '$id' ";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}
// function ubah
function ubahpw($data){
	global $conn;

	$id = htmlspecialchars($data["id"]);
	$nama = htmlspecialchars($data["name"]);
	$pw = htmlspecialchars($data["password"]);
	
	$query = "UPDATE users SET 
	name = '$nama',
	password = '$pw',
	WHERE customer_id = '$id' ";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


// function hapus
function hapus($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM customer WHERE customer_id = '$id'");

	return mysqli_affected_rows($conn);
}

function hapusg($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM ar WHERE id = '$id'");

	return mysqli_affected_rows($conn);
}

function hapuspop($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM pop WHERE pop_id = '$id'");

	return mysqli_affected_rows($conn);
}

function hapusdevice($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM device WHERE device_id = '$id'");

	return mysqli_affected_rows($conn);
}

function hapusadmin($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM admin WHERE id = '$id'");

	return mysqli_affected_rows($conn);
}

function tambah($data){
	global $conn;

	$id = htmlspecialchars($data["customer_id"]);
	$nama = htmlspecialchars($data["customer_name"]);
	$alamat = htmlspecialchars($data["customer_address"]);
	$layanan = htmlspecialchars($data["customer_service"]);

	$query = "INSERT INTO customer VALUES ('$id', '$nama', '$alamat', '$layanan')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function tambahdatagangguan($data){
	global $conn;

	$id = htmlspecialchars($data["id"]);
	$ar = htmlspecialchars($data["ar_id"]);
	$lat = htmlspecialchars($data["lat"]);
	$lng = htmlspecialchars($data["lng"]);
	$rootcause = htmlspecialchars($data["rootcause"]);

	$query = "INSERT INTO ar VALUES ('$id', '$ar', $lat', '$lng', '$rootcause')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}
function tambahadmin($data){
	global $conn;

	// $id = htmlspecialchars($data["id"]);
	$nama = htmlspecialchars($data["username"]);
	$pw = htmlspecialchars($data["password"]);
	// $layanan = htmlspecialchars($data["customer_service"]);

	$query = "INSERT INTO admin VALUES ('NULL', '$nama', '$pw')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function tambahdevice($data){
	global $conn;

	$id = htmlspecialchars($data["device_id"]);
	$nama = htmlspecialchars($data["device_type"]);
	$ip = htmlspecialchars($data["device_ip"]);
	$ip_add = htmlspecialchars($data["device_ip_add"]);
	
	$query = "INSERT INTO device VALUES ('$id', '$nama', '$ip', '$ip_add')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function tambahpop($data){
	global $conn;

	$id = htmlspecialchars($data["pop_id"]);
	$nama = htmlspecialchars($data["pop_name"]);
	$alamat = htmlspecialchars($data["pop_address"]);

	$query = "INSERT INTO pop VALUES ('$id', '$nama', '$alamat')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function registrasi($data){
	global $conn;

	// ambil data dari $_post lalu diambil oleh $data lalu dimasukkan ke $username
	// misal user menginputkan karakter backslash lalu akan dihilangkan agar backslash tersebut tidak masuk ke dalam database
	// maka username akan dibersihkan
	// paksa agar user menginputkan huruf kecil semua
	$username = strtolower(stripslashes($data["username"]));
	

	// memungkinkan si user memasukkan password dengan tanda kutip, agar tanda kutip masuk ke dalam database
	$un = mysqli_real_escape_string($conn, $data["uname"]);
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]); 
	
	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM admin WHERE username = '$username'");

	$re1 = mysqli_query($conn, "SELECT uname FROM admin WHERE uname='$un'");
	
	// jika fungsi ini menghasilkan nilai true berarti username sudah ada di database
	if (mysqli_fetch_assoc($result)){
		echo "<script>
		alert('email already used')
		</script>";
		return false;
	}

	if (mysqli_fetch_assoc($re1)){
		echo "<script>
		alert('username already used')
		</script>";
		return false;
	}

	// cek konfirmasi password
	if( $password !== $password2 ){
		echo "<script>
			alert('password confirmation is incorrect!')
			</script>";
		return false;
	} else {
		echo mysqli_error($conn);
	}

	// enkripsi password
	// parameter 1 : password apa yang mau diacak
	// parameter 2 : mengacaknya pake algoritma apa
	// pass_default : algoritma akan terus diubah ketika ada cara pengamanan baru
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan user baru ke database
	mysqli_query($conn, "INSERT INTO admin VALUES ('','$username','$un','$password')");

	return mysqli_affected_rows($conn);

}
?>
