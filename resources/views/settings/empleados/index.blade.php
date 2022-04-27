@extends('layouts.CoreUi.index')
@section('title','Lista de empleados')
@section('contenido')
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.2/css/uikit.min.css" /> --}}
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.uikit.min.css" />
<div class="table-responsive">
  <table id="example" class="uk-table uk-table-hover uk-table-striped" style="width:100%"  id="laravel_datatable">
    <thead>
             <tr>
               <th>ID</th>
                {{-- <th>S. No</th>  --}}
               <th>Nombre</th>
                <th>RFC</th>
                <th>CURP</th>
                <th>Created at</th>
                <th>Action</th>
             </tr>
         </thead>
  </table>
</div>


{{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.uikit.min.js"></script> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script>
 var SITEURL = '{{URL::to('')}}';
 $(document).ready( function () {
   $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $('#laravel_datatable').DataTable({
         processing: true,
         serverSide: true,
         ajax: {
          // url: ndex') }}',
         url: SITEURL + "/empleados",
          type: 'GET',
         },
         columns: [
                  {data: 'id', name: 'id', 'visible': false},
                  // {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,searchable: false},
                  { data: 'name', name: 'name' },
                  { data: 'rfc', name: 'rfc' },
                  { data: 'curp', name: 'curp' },
                  { data: 'created_at', name: 'created_at' },
                  {data: 'action', name: 'action', orderable: false},
               ],
        order: [[0, 'desc']]
      });

 /*  When user click add user button */
    $('#create-new-product').click(function () {
        $('#btn-save').val("create-product");
        $('#product_id').val('');
        $('#productForm').trigger("reset");
        $('#productCrudModal').html("Add New Product");
        $('#ajax-product-modal').modal('show');
    });

   /* When click edit user */
    $('body').on('click', '.edit', function () {
      var product_id = $(this).data('id');
      $.get('empleados/' + product_id +'/edit', function (data) {
    //  $.get('product-list/' + product_id +'/edit', function (data) {
         $('#title-error').hide();
         $('#product_code-error').hide();
         $('#description-error').hide();
         $('#productCrudModal').html("Edit Product");
          $('#btn-save').val("edit-product");
          $('#ajax-product-modal').modal('show');
          $('#product_id').val(data.id);
          $('#title').val(data.title);
          $('#product_code').val(data.product_code);
          $('#description').val(data.description);
      })
   });

    $('body').on('click', '#delete-product', function () {

        var product_id = $(this).data("id");

        if(confirm("Are You sure want to delete !")){
          $.ajax({
              type: "get",
              url: SITEURL + "product-list/delete/"+product_id,
              success: function (data) {
              var oTable = $('#laravel_datatable').dataTable();
              oTable.fnDraw(false);
              },
              error: function (data) {
                  console.log('Error:', data);
              }
          });
        }
    });

   });

if ($("#productForm").length > 0) {
      $("#productForm").validate({

     submitHandler: function(form) {

      var actionType = $('#btn-save').val();
      $('#btn-save').html('Sending..');

      $.ajax({
          data: $('#productForm').serialize(),
          url: SITEURL + "product-list/store",
          type: "POST",
          dataType: 'json',
          success: function (data) {

              $('#productForm').trigger("reset");
              $('#ajax-product-modal').modal('hide');
              $('#btn-save').html('Save Changes');
              var oTable = $('#laravel_datatable').dataTable();
              oTable.fnDraw(false);

          },
          error: function (data) {
              console.log('Error:', data);
              $('#btn-save').html('Save Changes');
          }
      });
    }
  })
}
</script>
@endsection
