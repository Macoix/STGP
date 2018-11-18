<!-- REQUIRED JS SCRIPTS -->

<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- Laravel App -->
<script src="{{ url (mix('/js/app.js')) }}" type="text/javascript"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script> --}}
<script src="{{asset('select2/dist/js/select2.min.js')}}"></script>
<script type="text/javascript">
  function cambiar(){
    var pdrs = document.getElementById('file-upload').files[0].name;
    document.getElementById('info').innerHTML = pdrs;
  }
  function cambiar2(){
    var pdrs = document.getElementById('file-upload2').files[0].name;
    document.getElementById('info2').innerHTML = pdrs;
  }



  $(document).ready(function() {
    // $('#selectautor').select2({
    //   placeholder: "Seleccionar",
    //   language: {
    //       noResults: function (params) {
    //       return "No se encontraron resultados.";
    //       }
    //   }
    // });



    $('#estado_anexo').on('change',function(){
      if($(this).val() == 'rechazar'){
        $('#anexo_observaciones').removeAttr('disabled');
      } else {
        $('#anexo_observaciones').prop('disabled', 'disabled');
      }
    });
  });
</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
