
<!-- Begin Page Content -->


<div class="container-fluid" >

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
    <?php 
        include 'config/database.php';
        $hari_ini=date('Y-m-d');
        
        $kasir=0;
        if ($_SESSION["level"]=="Kasir"){
            $kasir=$_SESSION["id_pengguna"];
            $sql="select SUM(harga*qty) as hari_ini from penjualan p inner join detail_penjualan d on d.no_invoice=p.no_invoice where p.id_kasir=$kasir and date(tanggal)='$hari_ini'";
         }else {
            $sql="select SUM(harga*qty) as hari_ini from penjualan p inner join detail_penjualan d on d.no_invoice=p.no_invoice where date(tanggal)='$hari_ini'";
        }

        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_array($hasil);       
    ?>
    <!-- Penjualan hari ini -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Penjualan hari ini</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?php  echo number_format($data['hari_ini'],0,',','.');?></div>
            </div>
            <div class="col-auto">
                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
            </div>
        </div>
        </div>
    </div>
    <?php 
        include 'config/database.php';
        $bulan_ini=date('m');
        $tahun_ini=date('Y');
        //Perintah sql untuk menampilkan semua data pada tabel jurusan
        $kasir=0;
        if ($_SESSION["level"]=="Kasir"){
            $kasir=$_SESSION["id_pengguna"];
            $sql="select SUM(harga*qty) as bulan_ini from penjualan p inner join detail_penjualan d on d.no_invoice=p.no_invoice where p.id_kasir=$kasir and month(tanggal)='$bulan_ini' and year(tanggal)='$tahun_ini' ";
        }else {
        $sql="select SUM(harga*qty) as bulan_ini from penjualan p inner join detail_penjualan d on d.no_invoice=p.no_invoice where month(tanggal)='$bulan_ini' and year(tanggal)='$tahun_ini' ";
        }
        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_array($hasil);
    ?>
    <!-- Penjualan bulan ini -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Penjualan bulan ini</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?php  echo number_format($data['bulan_ini'],0,',','.');?></div>
            </div>
            <div class="col-auto">
                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
            </div>
        </div>
        </div>
    </div>
    <?php 
        include 'config/database.php';
        $tahun_ini=date('Y');
        
        if ($_SESSION["level"]=="Kasir"){
            $kasir=$_SESSION["id_pengguna"];
            $sql="select SUM(harga*qty) as tahun_ini from penjualan p inner join detail_penjualan d on d.no_invoice=p.no_invoice where p.id_kasir=$kasir and year(tanggal)='$tahun_ini'";
        }else{
            $sql="select SUM(harga*qty) as tahun_ini from penjualan p inner join detail_penjualan d on d.no_invoice=p.no_invoice where year(tanggal)='$tahun_ini'";
        }

        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_array($hasil);
    ?>
    <!-- Penjualan tahun ini -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Penjualan tahun ini</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?php  echo number_format($data['tahun_ini'],0,',','.');?></div>
            </div>
            <div class="col-auto">
                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
            </div>
        </div>
        </div>
    </div>
    <?php 
        include 'config/database.php';
       
        if ($_SESSION["level"]=="Kasir"){
            $kasir=$_SESSION["id_pengguna"];
            $sql="select SUM(harga*qty) as selama_ini from penjualan p inner join detail_penjualan d on d.no_invoice=p.no_invoice where p.id_kasir=$kasir";

        }else {
            $sql="select SUM(harga*qty) as selama_ini from penjualan p inner join detail_penjualan d on d.no_invoice=p.no_invoice";

        }

        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_array($hasil);
    ?>
    <!-- Penjualan selama ini -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Penjualan selama ini</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?php  echo number_format($data['selama_ini'],0,',','.');?></div>
            </div>
            <div class="col-auto">
                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>

    

<script>

    function penjualan_bulan_ini() {
        $.ajax({
            url: 'page/dashboard/penjualan-harian.php',
            method: 'POST',
            success:function(data){
                $('#tampil_grafik').html(data);
                document.getElementById("judul_grafik").innerHTML="Penjualan Bulan ini";
            }
        }); 
    }

    function penjualan_tahun_ini() {
        $.ajax({
            url: 'page/dashboard/penjualan-tahunan.php',
            method: 'POST',
            success:function(data){
                $('#tampil_grafik').html(data);
                document.getElementById("judul_grafik").innerHTML="Penjualan Tahun ini";
            }
        }); 
    }

    function semua_penjualan() {
        $.ajax({
            url: 'page/dashboard/semua-penjualan.php',
            method: 'POST',
            success:function(data){
                $('#tampil_grafik').html(data);
                document.getElementById("judul_grafik").innerHTML="Penjualan Selama ini";
            }
        }); 
    }

    function penjualan_by_kategori_produk(){
        $.ajax({
            url: 'page/dashboard/penjualan-by-kategori-produk.php',
            method: 'POST',
            success:function(data){
                $('#tampil_pie_chart').html(data);
                document.getElementById("keterangan_chart").innerHTML="Total Penjualan Berdasarkan Kategori Produk"; 
            }
        }); 
    }
    function penjualan_by_supplier(){
        $.ajax({
            url: 'page/dashboard/penjualan-by-supplier.php',
            method: 'POST',
            success:function(data){
                $('#tampil_pie_chart').html(data);
                document.getElementById("keterangan_chart").innerHTML="Total Penjualan Berdasarkan Supplier"; 
            }
        }); 
    }

    $(document).ready(function(){
        penjualan_bulan_ini();
        penjualan_by_kategori_produk();
    });

    $('#penjualan_bulan_ini').on('click',function(){    
        penjualan_bulan_ini();
    });


    $('#penjualan_tahun_ini').on('click',function(){    
        penjualan_tahun_ini();
    });

    $('#semua_penjualan').on('click',function(){    
        semua_penjualan();
    });

    $('#penjualan_by_kategori_produk').on('click',function(){    
        penjualan_by_kategori_produk();
    });
    $('#penjualan_by_supplier').on('click',function(){    
        penjualan_by_supplier();
    });

</script>