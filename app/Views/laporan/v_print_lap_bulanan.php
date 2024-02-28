<div class="col-12">
        <b>Bulan: <?= $bulan ?></b>
        <b>Tahun: <?= $tahun ?></b>
      <table class="table table-bordered">
<tr class="text-center">
    <th>No</th>
    <th>Tanggal</th>
    <th>Total</th>
    <th>Total Profit</th>
</tr>
<?php $no = 1;
foreach ($databulanan as $key => $value) {
    $grandtotal[] = $value['total_harga'];
    $granduntung[] = $value['untung'];
    ?> 
<tr>
    <td class="text-center"><?= $no++ ?></td>
    <td class="text-center"><?= $value['tgl_jual'] ?></td>
    <td class="text-right">Rp. <?= number_format($value['total_harga'], 0) ?>.-</td>
    <td class="text-right">Rp. <?= number_format($value['untung'], 0) ?>.-</td>
</tr>
<?php } ?> 
<tr>
    <td class="text-center bg-gray-700 text-light" colspan="2"><b>Grand Total</b></td>
    <td class="text-right">
       Rp. <?= $databulanan == null ? "" : number_format(array_sum($grandtotal), 0) ?>.-
    </td>
   <td class="text-right"> Rp. <?= $databulanan == null ? "" : number_format(array_sum($granduntung), 0) ?>.-</td>.
</tr>
</table>
      </div>