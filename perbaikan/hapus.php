<?php
include '../config/koneksi.php';

$id = $_GET['id'];

// Dapatkan id_komputer sebelum menghapus data
$data_perbaikan = $conn->query("SELECT id_komputer, status FROM tperbaikan WHERE id_perbaikan = '$id'")->fetch_assoc();
$id_komputer = $data_perbaikan['id_komputer'];

// Hapus data perbaikan
if ($conn->query("DELETE FROM tperbaikan WHERE id_perbaikan = '$id'")) {
    // Update status komputer jika perlu (opsional)
    // Kembalikan status komputer ke aktif jika perbaikan dihapus dan komputer masih dalam status maintenance
    $status_komputer = $conn->query("SELECT status FROM tkomputer WHERE id_komputer = '$id_komputer'")->fetch_assoc()['status'];
    
    if ($status_komputer == 'maintenance') {
        // Cek apakah ada perbaikan lain yang sedang aktif untuk komputer ini
        $perbaikan_lain = $conn->query("SELECT COUNT(*) as jumlah FROM tperbaikan 
                                        WHERE id_komputer = '$id_komputer' 
                                        AND status != 'selesai' 
                                        AND status != 'batal'")->fetch_assoc();
        
        // Jika tidak ada perbaikan lain yang aktif, kembalikan status ke aktif
        if ($perbaikan_lain['jumlah'] == 0) {
            $conn->query("UPDATE tkomputer SET status = 'aktif' WHERE id_komputer = '$id_komputer'");
        }
    }
    
    header("Location: index.php");
} else {
    echo "<script>alert('Gagal menghapus data: " . $conn->error . "'); window.location='index.php';</script>";
}
?>