 <!-- Default Modals -->
 <div class="modal fade" id="modal-produk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
     style="display: none;">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">Pilih Produk</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
             </div>
             <div class="modal-body">
                 <table id="modalDataTable" class="table table-striped table-bordered" style="width:100%">
                     <thead>
                         <th data-ordering="true" width="5%">No</th>
                         <th data-ordering="true">Kode</th>
                         <th data-ordering="true">Nama</th>
                         <th data-ordering="true">Harga Beli</th>
                         <th data-ordering="false">Aksi</th>
                     </thead>
                     <tbody>
                         @foreach ($produk as $item)
                             <tr>
                                 <td>{{ $loop->iteration }}</td>
                                 <td>{{ $item->kode_produk }}</td>
                                 <td>{{ $item->nama_produk }}</td>
                                 <td>{{ $item->harga_beli }}</td>
                                 <td>
                                     <a href="#"
                                         onclick="pilihProduk('{{ $item->id_produk }}','{{ $item->kode_produk }}')"
                                         class="btn btn-sm btn-success"><i class='bx bxs-check-circle'></i>
                                         Pilih</a>
                                 </td>
                             </tr>
                         @endforeach
                     </tbody>
                 </table>
             </div>
         </div><!-- /.modal-content -->
     </div><!-- /.modal-dialog -->
 </div><!-- /.modal -->
