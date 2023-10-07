 <!-- Default Modals -->
 <div class="modal fade" id="modalSupplier" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
     style="display: none;">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="modalSupplier">Pilih Supplier</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
             </div>
             <div class="modal-body">
                 <table id="modalDataTable" class="table table-striped table-bordered" style="width:100%">
                     <thead>
                         <th data-ordering="true" width="5%">No</th>
                         <th data-ordering="true">Nama</th>
                         <th data-ordering="true">Telepon</th>
                         <th data-ordering="true">Alamat</th>
                         <th data-ordering="false">Aksi</th>
                     </thead>
                     <tbody>
                         @foreach ($data as $item)
                             <tr>
                                 <td>{{ $loop->iteration }}</td>
                                 <td>{{ $item->nama }}</td>
                                 <td>{{ $item->telepon }}</td>
                                 <td>{{ $item->alamat }}</td>
                                 <td>
                                     <a href="{{ route('pembelian.create', $item->id_supplier) }}"
                                         class="btn btn-sm btn-success"><i class='bx bxs-check-circle'></i>
                                         Pilih</a>
                                 </td>
                             </tr>
                         @endforeach
                     </tbody>
                 </table>
             </div>
             {{-- <div class="modal-footer">
                 <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                 <button type="button" class="btn btn-sm btn-light" data-bs-dismiss="modal">Batal</button>
             </div> --}}
         </div><!-- /.modal-content -->
     </div><!-- /.modal-dialog -->
 </div><!-- /.modal -->
