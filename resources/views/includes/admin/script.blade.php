<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="{{ url('backend/assets/js/stisla.js') }}"></script>

<!-- JS Libraies -->
<script src="{{ url('backend/node_modules/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

<script src="{{ url('backend/node_modules/owl.carousel/dist/owl.carousel.min.js') }}"></script>
<script src="{{ url('backend/node_modules/summernote/dist/summernote-bs4.js') }}"></script>
<script src="{{ url('backend/node_modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>



<script src="{{ url('backend/node_modules/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('backend/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
{{-- <script src="{{ url('backend/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script> --}}

<!-- Template JS File -->
<script src="{{ url('backend/assets/js/scripts.js') }}"></script>
<script src="{{ url('backend/assets/js/custom.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ url('backend/assets/js/page/index.js') }}"></script>

{{-- datepicker --}}
{{-- <script src="{{url('backend/plugins/datepicker/js/bootstrap-datepicker.min.js')}}"></script> --}}

{{-- Sweet Alert detele --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>




{{-- data table --}}
{{-- <script src="{{ url('backend/assets/js/page/modules-datatables.js') }}"></script> --}}
<script>
$(document).ready(function() {
    $('#mytable').DataTable();
} );
</script>
{{-- Sweet Alert delete --}}
<script>
    function deleteRow(id)
           {
               swal({
                 title: 'Are you sure ?',
                     text: "only status changes and can be returned.",
                     type: 'warning',
                     showCancelButton: true,
                     confirmButtonColor: '#3abaf4',
                     cancelButtonColor: '#fc544b',
                     confirmButtonText: 'Yes, inactive status!'
               }).then((result) => {
                   if (result.value) {                  
                     $('#data-'+id).submit();
                   } else if (result.dismiss === Swal.DismissReason.cancel) {
                       Swal(
                       'Cancelled',
                       'Status as before :)',
                       'error'
                       );
                     }
                 });
                   
         }
   </script>
{{-- Sweet Alert delete --}}
{{-- Sweet Alert delete permanen--}}
<script>
    function deleteRowPermanen(id)
           {
               swal({
                 title: 'Are you sure ?',
                     text: "You Won't Be Able To Return It!",
                     type: 'warning',
                     showCancelButton: true,
                     confirmButtonColor: '#3abaf4',
                     cancelButtonColor: '#fc544b',
                     confirmButtonText: 'Yes, delete it!'
               }).then((result) => {
                   if (result.value) {                  
                     $('#dataPermanen-'+id).submit();
                   } else if (result.dismiss === Swal.DismissReason.cancel) {
                       Swal(
                       'Cancelled',
                       'Your imaginary file is safe :)',
                       'error'
                       );
                     }
                 });
                   
         }
   </script>
{{-- Sweet Alert delete permanen--}}



   
