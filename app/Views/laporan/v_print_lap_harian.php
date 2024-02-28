<div class="col-12">
        <b>Tanggal : <?= $tgl ?></b>
      <table class="table table-bordered">
<tr class="text-center">
    <th>No</th>
    <th>Kode Produk</th>
    <th>Nama Produk</th>
    <th>Harga Beli</th>
    <th>Harga Jual</th>
    <th>Qty</th>
    <th>Total Harga</th>
    <th>Total Profit</th>
</tr>
<?php $no = 1;
foreach ($dataharian as $key => $value) {
    $grandtotal[] = $value['total_harga'];
    $granduntung[] = $value['untung'];
    ?> 
<tr>
    <td class="text-center"><?= $no++ ?></td>
    <td class="text-center"><?= $value['kode_produk'] ?></td>
    <td><?= $value['nama_produk'] ?></td>
    <td class="text-right">Rp. <?= number_format($value['modal'], 0) ?>.-</td>
    <td class="text-right">Rp. <?= number_format($value['harga'], 0) ?>.-</td>
    <td class="text-center"><?= $value['qty'] ?></td>
    <td class="text-right">Rp. <?= number_format($value['total_harga'], 0) ?>.-</td>
    <td class="text-right">Rp. <?= number_format($value['untung'], 0) ?>.-</td>
</tr>
<?php } ?> 
<tr>
    <td class="text-center bg-gray-700 text-light" colspan="6"><b>Grand Total</b></td>
    <td class="text-right">
       Rp. <?= $dataharian == null ? "" : number_format(array_sum($grandtotal), 0) ?>.-
    </td>
   <td class="text-right"> Rp. <?= $dataharian == null ? "" : number_format(array_sum($granduntung), 0) ?>.-</td>.
</tr>
</table>
      </div>