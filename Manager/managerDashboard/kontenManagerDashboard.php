<?php
    include "../../functionPHP/dashboard.php";
?>
<h1>DASHBOARD</h1>

<div id="isiDashboard">

    <div id="divMember" class="dashboardSatuan">
        <div class="iconDashboard simbol">
            <i class="fas fa-users"></i>
        </div>
        <div class="dataDashboard">
            <p>Jumlah member yang terdaftar : </p>
            <p class="jumlah"><?php echo getTotalMember(); ?> member </p>
        </div>
    </div>

    <div id="divBuku" class="dashboardSatuan">
        <div class="iconDashboard simbol">
            <i class="fas fa-book"></i>
        </div>
        <div class="dataDashboard">
            <p>Jumlah judul buku yang dimiliki : </p>
            <p class="jumlah"><?php echo getTotalBuku(); ?> buku</p>
        </div>
    </div>

    <div id="divEksBuku" class="dashboardSatuan">
        <div class="iconDashboard simbol">
          <i class="fas fa-book-open"></i>
        </div>
        <div class="dataDashboard">
            <p>Jumlah eksemplar buku yang dimiliki : </p>
            <p class="jumlah"><?php echo getTotalEksBuku(); ?> eksemplar</p>
        </div>
    </div>

    <div id="divPeminjaman" class="dashboardSatuan">
        <div class="iconDashboard simbol">
            <i class="fas fa-sticky-note"></i>
        </div>
        <div class="dataDashboard">
            <p>Jumlah transaksi peminjaman </p>
            <p class="jumlah">Hari ini : <?php echo getTotalPeminjaman(1); ?> transaksi</p>
            <p class="jumlah">Bulan ini : <?php echo getTotalPeminjaman(2); ?> transaksi</p>
        </div>
    </div>

    <div id="divPengembalian" class="dashboardSatuan">
        <div class="iconDashboard simbol">
            <i class="far fa-sticky-note"></i>
        </div>
        <div class="dataDashboard">
            <p>Jumlah transaksi pengembalian </p>
            <p class="jumlah">Hari ini : <?php echo getTotalPengembalian(1); ?> transaksi</p>
            <p class="jumlah">Bulan ini : <?php echo getTotalPengembalian(2); ?> transaksi</p>
        </div>
    </div>

    <div id="divUangPeminjaman" class="dashboardSatuan">
        <div class="iconDashboard simbol">
            <i class="fas fa-money-bill-alt"></i>
        </div>
        <div class="dataDashboard">
            <p>Pendapatan dari transaksi peminjaman </p>
            <p class="jumlah">Hari ini : <?php echo getTotalUangPeminjaman(1); ?></p>
            <p class="jumlah">Bln ini : <?php echo getTotalUangPeminjaman(2); ?></p>
        </div>
    </div>

    <div id="divUangPengembalian" class="dashboardSatuan">
        <div class="iconDashboard simbol">
            <i class="far fa-money-bill-alt"></i>
        </div>
        <div class="dataDashboard">
            <p>Pendapatan dari transaksi pengembalian </p>
            <p class="jumlah">Hari ini : <?php echo getTotalUangPengembalian(1); ?></p>
            <p class="jumlah">Bln ini : <?php echo getTotalUangPengembalian(2); ?></p>
        </div>
    </div>

    <div id="divUangPenghasilan" class="dashboardSatuan">
        <div class="iconDashboard simbol">
            <i class="fas fa-coins"></i>
        </div>
        <div class="dataDashboard">
            <p>Total pendapatan dari semua transaksi</p>
            <p class="jumlah">Hari ini : <?php echo getTotalUang(1); ?></p>
            <p class="jumlah">Bln ini : <?php echo getTotalUang(2); ?></p>
        </div>
    </div>
</div>