<style type="text/css">
    article div#konten{
        overflow-y: hidden;
    }
</style>
<div id="judul">
    <h1>Tambah Supplier</h1>
</div>
<form method="POST" action="../functionPHP/tambahSupplier.php" enctype="multipart/form-data">
    <div id="kiri">
        <label>Gambar</label><br/>
        <input type="file" id="gambar" name="gambar"/><br/>

        <label>ID Supplier</label><br/>
        <input type="text" id="idSupplier" name="idSupplier"/><br/>

        <label>Nama Supplier</label><br/>
        <input type="text" id="namaSupplier" name="namaSupplier"/><br/> 

        <label>Email</label><br/>
        <input type="text" id="email" name="email"/><br/> 
    </div>

    <div id="kanan">
        <label>No. Telp</label><br/>
        <input type="text" id="noTelp" name="noTelp"/><br/>

        <label>Alamat</label><br/>
        <textarea type="text" id="alamt" name="alamat"></textarea><br/>
    </div>
    <input type="submit" id="tombol" name="tombol" value="SAVE">
    <input type="button" id="tombol" name="tombol" value="CANCEL">
</form>