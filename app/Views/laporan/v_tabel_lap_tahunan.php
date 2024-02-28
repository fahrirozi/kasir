<div class="row">
<div class="col-12 text-center">
        <address>
        <i class="fas fa-coins fa-2x"></i><font size=6 ><?= $web['nama_toko'] ?> </font><br>
       <b> <?= $web['slogan'] ?></b> <br>
          <strong><?= $web['alamat'] ?> </strong><br>
          No Handphone: <?= $web['no_telpon'] ?> <br>
        </address>
        </p>
      </div>
      <div class="col-12 text-center">
        <hr>
        <h4><b><?= $judul ?></b></h4>
      </div>
      <div class="col-12">
        <b>Tahun: <?= $tahun ?></b>
      <table class="table table-bordered">
<tr class="text-center">
    <th>No</th>
    <th> Bulan </th>
    <th>Total</th>
    <th>Total Profit</th>
</tr>
<?php $no = 1;
foreach ($datatahunan as $key => $value) {
    $grandtotal[] = $value['total_harga'];
    $granduntung[] = $value['untung'];
    ?> 
<tr>
    <td class="text-center"><?= $no++ ?></td>
    <td class="text-center"><?= $value['bulan'] ?></td>
    <td class="text-right">Rp. <?= number_format($value['total_harga'], 0) ?>.-</td>
    <td class="text-right">Rp. <?= number_format($value['untung'], 0) ?>.-</td>
</tr>
<?php } ?> 
<tr>
    <td class="text-center bg-gray-700 text-light" colspan="2"><b>Grand Total</b></td>
    <td class="text-right">
       Rp. <?= $datatahunan == null ? "" : number_format(array_sum($grandtotal), 0) ?>.-
    </td>
   <td class="text-right"> Rp. <?= $datatahunan == null ? "" : number_format(array_sum($granduntung), 0) ?>.-</td>.
</tr>
</table>
      </div>
</div>
