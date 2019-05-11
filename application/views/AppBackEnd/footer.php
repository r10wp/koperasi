<footer>
  <div class="pull-right">
    Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib <?php echo $js ?></a>
  </div>
  <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>




<!-- jQuery -->
<script src="<?= base_url()?>theme/vendors/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url()?>theme/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url()?>theme/vendors/fastclick/lib/fastclick.js"></script>
<script src="<?= base_url()?>theme/vendors/nprogress/nprogress.js"></script>
<script src="<?= base_url()?>theme/vendors/Chart.js/dist/Chart.min.js"></script>
<script src="<?= base_url()?>theme/vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<script src="<?= base_url()?>theme/vendors/Flot/jquery.flot.js"></script>
<script src="<?= base_url()?>theme/vendors/Flot/jquery.flot.pie.js"></script>
<script src="<?= base_url()?>theme/vendors/Flot/jquery.flot.time.js"></script>
<script src="<?= base_url()?>theme/vendors/Flot/jquery.flot.stack.js"></script>
<script src="<?= base_url()?>theme/vendors/Flot/jquery.flot.resize.js"></script>
<script src="<?= base_url()?>theme/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="<?= base_url()?>theme/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="<?= base_url()?>theme/vendors/flot.curvedlines/curvedLines.js"></script>
<script src="<?= base_url()?>theme/vendors/DateJS/build/date.js"></script>
<script src="<?= base_url()?>theme/vendors/moment/min/moment.min.js"></script>
<script src="<?= base_url()?>theme/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?= base_url()?>theme/build/js/custom.min.js"></script>
<script src="<?= base_url()?>theme/vendors/iCheck/icheck.min.js"></script>


<!-- <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script> -->



  <!-- ADD JS -->
  <?php if ($js == "model_form1"){ ?>
    <script src="<?= base_url()?>theme/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <script src="<?= base_url()?>theme/vendors/iCheck/icheck.min.js"></script>
    <script src="<?= base_url()?>theme/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="<?= base_url()?>theme/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="<?= base_url()?>theme/vendors/google-code-prettify/src/prettify.js"></script>
    <script src="<?= base_url()?>theme/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <script src="<?= base_url()?>theme/vendors/switchery/dist/switchery.min.js"></script>
    <script src="<?= base_url()?>theme/vendors/select2/dist/js/select2.full.min.js"></script>
    <script src="<?= base_url()?>theme/vendors/parsleyjs/dist/parsley.min.js"></script>
    <script src="<?= base_url()?>theme/vendors/autosize/dist/autosize.min.js"></script>
    <script src="<?= base_url()?>theme/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <script src="<?= base_url()?>theme/vendors/starrr/dist/starrr.js"></script>
  <?php } ?>
  <?php if ($js == "model_table1"){ ?>
    <!-- <script src="<?= base_url()?>theme/vendors/datatables.net/js/jquery.dataTables.js"></script>
    <script src="<?= base_url()?>theme/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?= base_url()?>theme/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url()?>theme/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?= base_url()?>theme/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?= base_url()?>theme/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url()?>theme/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url()?>theme/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?= base_url()?>theme/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?= base_url()?>theme/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url()?>theme/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?= base_url()?>theme/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="<?= base_url()?>theme/vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?= base_url()?>theme/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?= base_url()?>theme/vendors/pdfmake/build/vfs_fonts.js"></script> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

    <script>
      $(function () {
        $("#datatable-sort00").DataTable({
          "aaSorting": [[0,'desc']],
        })
      });
      $(function () {
        $("#datatable-sort0").DataTable({
          "aaSorting": [[1,'desc']],
        })
      });
      $(function () {
        $("#datatable-sort0-asc").DataTable({
          "aaSorting": [[1,'asc']],
        })
      });
      $(function () {
        $("#datatable-sort1").DataTable({
          "aaSorting": [[2,'desc']],
        })
      });
      $(function () {
        $("#datatable-sort2").DataTable({
          "aaSorting": [[3,'desc']],
        })
      });
      $(function () {
        $("#datatable-sort3").DataTable({
          "aaSorting": [[4,'desc']],
        })
      });

    </script>

    <script type="text/javascript"> //Penggunaan Tooltip
      $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      })
    </script>

    <script type="text/javascript">
    $(document).ready(function() {
      // Setup - add a text input to each footer cell
      $('#datatable-sort1 tfoot th').each( function () {
          var title = $(this).text();
          $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
      } );

      // DataTable
      var table = $('#datatable-sort1').DataTable();

      // Apply the search
      table.columns().every( function () {
          var that = this;

          $( 'input', this.footer() ).on( 'keyup change', function () {
              if ( that.search() !== this.value ) {
                  that
                      .search( this.value )
                      .draw();
              }
          } );
      } );
    } );
    </script>
  <?php } ?>
  <script src="<?= base_url()?>theme/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>

  <script type="text/javascript">
    window.setTimeout(function() {
      $(".alert").fadeTo(600, 0).slideUp(1000, function() {
        $(this).hide();
      });
    }, 4000);
  </script>








    <script src="<?= base_url()?>theme/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->
    <script src="<?= base_url()?>theme/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <!-- Ion.RangeSlider -->
    <script>
    $('#myDatepicker').datetimepicker();

    $('#myDatepicker2').datetimepicker({
        format: 'DD.MM.YYYY'
    });

    $('#myDatepicker3').datetimepicker({
        format: 'hh:mm A'
    });

    $('#myDatepicker4').datetimepicker({
        ignoreReadonly: true,
        allowInputToggle: true
    });

    $('#datetimepicker6').datetimepicker();

    $('#datetimepicker7').datetimepicker({
        useCurrent: false
    });

    $("#datetimepicker6").on("dp.change", function(e) {
        $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
    });

    $("#datetimepicker7").on("dp.change", function(e) {
        $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
    });
    </script>


    <script>
      $(function() {
        $('input[name="rangedate1"]').daterangepicker({
          opens: 'right',
          locale: {
           format: 'DD/MM/YYYY'
          }
        }, function(start, end, label) {
          console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });
      });
    </script>



    <script>
      $(function() {
        $('input[name="rangedate2"]').daterangepicker({
          opens: 'right',
          locale: {
           format: 'DD/MM/YYYY'
          }
        });
      });
    </script>

    <script>
          $(document).ready(function(){
              $("#provinsi").change(function (){
                  var url = "<?php echo site_url('wilayah/add_ajax_kab');?>/"+$(this).val();
                  $('#kabupaten').load(url);

                  return false;
              })

          $("#kabupaten").change(function (){
                  var url = "<?php echo site_url('wilayah/add_ajax_kec');?>/"+$(this).val();
                  $('#kecamatan').load(url);
                  return false;
              })

          });
      </script>

    <script src="<?= base_url()?>theme/custom/sweetalert.min.js"></script>

    <script>
      $ ('.delete_confirm').on("click", function (e) {
        e.preventDefault ();
        var url = $ (this).attr('href');
        var postId = $(this).data('id');
        swal({
          title: "Apakah anda yakin menghapus data " + postId +" ?",
          text: "*Beberapa data yang dihapus tidak bisa dikembalikan",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            swal("Sukses! Data " + postId + " berhasil dihapus",
            {
              icon: "success",
            });
            setTimeout(
              function()
              {
                window.location.replace(url);
              }, 1500);

          } else {
            swal({  title: "Aksi Hapus Dibatalkan",
              text: "Data " + postId + " Belum Terhapus"});
          }
        });
      });
    </script>

    <script>
      $ ('.action_confirm').on("click", function (e) {
        e.preventDefault ();
        var url = $ (this).attr('href');
        var postId = $(this).data('id');
        swal({
          title: "Apakah anda yakin " + postId +" ?",
          text: "*Beberapa data yang dirubah tidak bisa dikembalikan",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            swal("Sukses! perubahan telah dilakukan",
            {
              icon: "success",
            });
            setTimeout(
              function()
              {
                window.location.replace(url);
              }, 1500);

          } else {
            swal({  title: "Aksi Dibatalkan",
              text: "Tidak ada perubahan yang terjadi"});
          }
        });
      });
    </script>

    <script>
    $ ('.set_confirm').on("click", function (e) {
       e.preventDefault ();
       var url = $ (this).attr('href');
       var postId = $(this).data('id');

       var
         closeInSeconds = 2,
         displayText = postId,
         timer;

       swal({
         title: "Sukses",
         text: displayText.replace(/#1/, closeInSeconds),
         timer: closeInSeconds * 1000,
         showConfirmButton: false,
         icon: "success"
       });

       timer = setInterval(function() {

   closeInSeconds--;

   if (closeInSeconds < 0) {

       clearInterval(timer);
   }

   $('.sweet-alert > p').text(displayText.replace(/#1/, closeInSeconds));

    }, 1000);
    setTimeout(
      function(){
        window.location.replace(url);
      }, 2000);
    });
  </script>

  <script>
    $(document).ready(function() {
      $('.jschosen').select2();
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
  });
  </script>

  <script>
  function ValidateSize(file) {
        var FileSize = file.files[0].size / 1048576; // in MB
        var fileName = document.getElementById("checkext").value;
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();

        if (FileSize > 0.5) {
          swal({
            title: "Upload File Dicegah",
            text: "Ukuran file upload harus dibawah 500KB / 0.5 MB",
            icon: "error",
            button: "Oke",
            });
            $(file).val(''); //for clearing with Jquery
        }
        if (extFile!="jpg") {
          swal({
            title: "Upload File Dicegah",
            text: "Upload Gambar hanya dengan format .JPG",
            icon: "error",
            button: "Oke",
            });
            $(file).val(''); //for clearing with Jquery
        }
    }
  </script>

<script>
  function ValidateSize2(file) {
      var FileSize = file.files[0].size / 1048576; // in MB
      var fileName = document.getElementById("checkext2").value;
      var idxDot = fileName.lastIndexOf(".") + 1;
      var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();

      if (FileSize > 0.5) {
        swal({
          title: "Upload File Dicegah",
          text: "Ukuran file upload harus dibawah 500KB / 0.5 MB",
          icon: "error",
          button: "Oke",
          });
          $(file).val(''); //for clearing with Jquery
      }
      if (extFile!="jpg") {
        swal({
          title: "Upload File Dicegah",
          text: "Upload Gambar hanya dengan format .JPG",
          icon: "error",
          button: "Oke",
          });
          $(file).val(''); //for clearing with Jquery
      }
  }
</script>

<script>
  function ValidateSize3(file) {
      var FileSize = file.files[0].size / 1048576; // in MB
      var fileName = document.getElementById("checkext3").value;
      var idxDot = fileName.lastIndexOf(".") + 1;
      var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();

      if (FileSize > 0.5) {
        swal({
          title: "Upload File Dicegah",
          text: "Ukuran file upload harus dibawah 500KB / 0.5 MB",
          icon: "error",
          button: "Oke",
          });
          $(file).val(''); //for clearing with Jquery
      }
      if (extFile!="jpg") {
        swal({
          title: "Upload File Dicegah",
          text: "Upload Gambar hanya dengan format .JPG",
          icon: "error",
          button: "Oke",
          });
          $(file).val(''); //for clearing with Jquery
      }
  }
</script>

<script>
  function ValidateSizePdf(file) {
      var FileSize = file.files[0].size / 2048576; // in MB
      var fileName = document.getElementById("checkpdf").value;
      var idxDot = fileName.lastIndexOf(".") + 1;
      var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();

      if (FileSize > 2) {
        swal({
          title: "Upload File Dicegah",
          text: "Ukuran file upload harus dibawah 2000KB / 2 MB",
          icon: "error",
          button: "Oke",
          });
          $(file).val(''); //for clearing with Jquery
      }
      if (extFile!="pdf") {
        swal({
          title: "Upload File Dicegah",
          text: "Upload Dokumen hanya dengan format .PDF",
          icon: "error",
          button: "Oke",
          });
          $(file).val(''); //for clearing with Jquery
      }
  }
</script>

<script>
  function ValidateSizePreview(file) {
    var FileSize = file.files[0].size / 1048576; // in MB
    var fileName = document.getElementById("checkext4").value;
    var idxDot = fileName.lastIndexOf(".") + 1;
    var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();

    if (FileSize > 0.5) {
      swal({
        title: "Upload File Dicegah",
        text: "Ukuran file upload harus dibawah 500KB / 0.5 MB",
        icon: "error",
        button: "Oke",
        });
        $(file).val(''); //for clearing with Jquery
    }else {
      var reader = new FileReader();
      reader.onload = function(){
        var output = document.getElementById('output');
        output.src = reader.result;
      };
      reader.readAsDataURL(event.target.files[0]);
    }
    if (extFile!="jpg") {
      swal({
        title: "Upload File Dicegah",
        text: "Upload Gambar hanya dengan format .JPG",
        icon: "error",
        button: "Oke",
        });
        $(file).val(''); //for clearing with Jquery

    }else {
      var reader = new FileReader();
      reader.onload = function(){
        var output = document.getElementById('output');
        output.src = reader.result;
      };
      reader.readAsDataURL(event.target.files[0]);
    }
  }
</script>


<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script> -->
<script src="<?= base_url()?>theme/custom/jquery.date-dropdowns.js"></script>

<script>
  $(function() {
    $('#datedrop').change(function (){
      $('#bindingtanggal').val($(this).val()); // <-- reverse your selectors here
    });
    $("#datedrop").dateDropdowns({
      dayLabel: 'Tanggal',
      monthLabel: 'Bulan',
      yearLabel: 'Tahun',
      daySuffixes: false,
        monthLongValues: ['January', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
    });
  });
</script>

    <script>
      $('#set_bank').on('change', function() {
          $("#set_bank option:selected").each(function () {
            $('#no_rek').val($(this).attr('data-no-rek'));
          });
          $("#set_bank option:selected").each(function () {
            $('#na_rek').val($(this).attr('data-na-rek'));
          });
          $("#set_bank option:selected").each(function () {
            $('#na_ba').val($(this).attr('data-na-ba'));
          });
      });
    </script>




    <script>
      $("#fnivel").change(function () {
        var selected_option = $('#fnivel').val();

        if (selected_option === '2') {
          $('#fnivel2').attr('pk','1').show();
          $('#setnotnull').prop('required',true);
        }
        if (selected_option != '2') {
          $("#fnivel2").removeAttr('pk').hide();
          $('#setnotnull').prop('required',false);
        }
      })
    </script>

    <script type="text/javascript">
      var rupiah = document.getElementById('rupiah');
      var rupiah2 = document.getElementById('rupiah2');
      var rupiah3 = document.getElementById('rupiah3');
      var rupiah4 = document.getElementById('rupiah4');
      var rupiah5 = document.getElementById('rupiah5');
      var rupiah6 = document.getElementById('rupiah6');

      rupiah.addEventListener('keyup', function(e){
        rupiah.value = formatRupiah(this.value, 'Rp. ');
        if (e.which == 188 ) {
          return false;
        }
      });
      rupiah2.addEventListener('keyup', function(e){
        rupiah2.value = formatRupiah(this.value, 'Rp. ');
        if (e.which == 188 ) {
          return false;
        }
      });
      rupiah3.addEventListener('keyup', function(e){
        rupiah3.value = formatRupiah(this.value, 'Rp. ');
        if (e.which == 188 ) {
          return false;
        }
      });
      rupiah4.addEventListener('keyup', function(e){
        rupiah4.value = formatRupiah(this.value, 'Rp. ');
        if (e.which == 188 ) {
          return false;
        }
      });
      rupiah5.addEventListener('keyup', function(e){
        rupiah5.value = formatRupiah(this.value, 'Rp. ');
        if (e.which == 188 ) {
          return false;
        }
      });
      rupiah6.addEventListener('keyup', function(e){
        rupiah6.value = formatRupiah(this.value, 'Rp. ');
        if (e.which == 188 ) {
          return false;
        }
      });

      /* Fungsi formatRupiah */
      function formatRupiah(angka, prefix){
        var number_string = angka.replace(/[^\d]/g, '').toString(),
        split   		= number_string.split(','),
        sisa     		= split[0].length % 3,
        rupiah     		= split[0].substr(0, sisa),
        ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if(ribuan){
          separator = sisa ? '.' : '';
          rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
      }
    </script>




    <script>
      $('#set_jenis_pinjaman').on('change', function() {
        $("#set_jenis_pinjaman option:selected").each(function () {
          $('#batas_pinjam').val($(this).attr('data-batas-pinjam'));
        });
        $("#set_jenis_pinjaman option:selected").each(function () {
          $('#batas_pinjam2').val($(this).attr('data-batas-pinjam2'));
        });
        $("#set_jenis_pinjaman option:selected").each(function () {
          $('#batas_angsuran').val($(this).attr('data-batas-angsuran'));
        });
        $("#set_jenis_pinjaman option:selected").each(function () {
          $('#bp').val($(this).attr('data-bunga'));
        });
        $("#set_jenis_pinjaman option:selected").each(function () {
          $('#denda').val($(this).attr('data-denda'));
        });
        $("#set_jenis_pinjaman option:selected").each(function () {
          $('#keterangan_pinjaman_js').val($(this).attr('data-keterangan_pinjaman_js'));
        });
        $("#set_jenis_pinjaman option:selected").each(function () {
          var max_dana = document.getElementById('batas_pinjam').value.replace(/Rp. /g, "").replace(/,00/g, "").replace(/\./g,"");
          var min_dana = document.getElementById('batas_pinjam2').value.replace(/Rp. /g, "").replace(/,00/g, "").replace(/\./g,"");
          $('#balance_max').prop('max', max_dana);
          $('#balance_min').prop('min', min_dana);
        });
      });
      $('#rupiah').bind('keypress keyup blur', function() {
        $('#balance_max').val($(this).val().replace(/Rp. /g, "").replace(/,00/g, "").replace(/\./g,""));
        $('#balance_min').val($(this).val().replace(/Rp. /g, "").replace(/,00/g, "").replace(/\./g,""));
      });

    </script>

    <script>
      $(document).ready(function() {
        //this calculates values automatically
        sum();
        $("#rupiah, #num2").on("keydown keyup", function() {
          sum();
        });
        $("#set_jenis_pinjaman").on("change", function() {
          sum();
        });



      });

      function sum() {
        var num1 = document.getElementById('batas_angsuran').value;
        var num2 = document.getElementById('rupiah').value;
        var num3 = document.getElementById('bp').value; //Bunga Pinjaman Per Angsuran

        num2 = num2.replace(/Rp./g, "").replace(/,00/g, "").replace(/\./g,"");

        var x = (parseInt(num2)/parseInt(num1));
        var y = (parseInt(num2)/parseInt(num1));
        var k = (parseInt(num2));
        var a = 0;
        var c = 0;
        var bc = 0; var bayar = 0;
        var z = 0;
        for (var i = 0; i < parseInt(num1); i++) {
          bc = parseInt(bc) + parseInt(k)*(1.5/100);
          bayar = parseInt(bayar) + parseInt(bc);
          // console.log(bayar);
        }
        var jumlah_b = 0;
        jumlah_b = parseInt(bayar)/parseInt(num1);

        var total_biaya_dan_bunga = parseInt(num2) + parseInt(num2)*(parseInt(num3)/100);
        var result = total_biaya_dan_bunga / parseInt(num1);

        var myDate = new Date("<?= date('M')?>/<?= date('d')?>/<?= date('Y')?>");
        var myDate2 = new Date("<?= date('M')?>/<?= date('d')?>/<?= date('Y')?>");
        var resultdate = myDate.addMonths(num1);
        var resultdate2 = resultdate.addMonths(1);

        if (!isNaN(result)) {

          document.getElementById('datesum').value = resultdate2.format('d F Y');
          document.getElementById('datetempo').value = "Setiap Tanggal 10 Pada Setiap Bulan";
          document.getElementById('first_tax').value = myDate2.addMonths(2).format('10 F Y');
          document.getElementById('total_semua').value = k+jumlah_b;
        }
      }
    </script>

    <script>

    </script>

    <script>
      $('#set_cari_anggota').on('change', function() {
          $("#set_cari_anggota option:selected").each(function () {
            $('#no').val($(this).attr('data-no'));
          });
          $("#set_cari_anggota option:selected").each(function () {
            $('#nama').val($(this).attr('data-nama'));
          });
          $("#set_cari_anggota option:selected").each(function () {
            $('#gambar').val($(this).attr('data-gambar'));
            var x = document.getElementById("gambar").value;
            document.getElementById("set_gambar").src="../asset/ANGGOTA/"+x;
          });
      });
    </script>

    <script>
      $('#set_cari_anggota2').on('change', function() {
          $("#set_cari_anggota2 option:selected").each(function () {
            $('#no').val($(this).attr('data-no'));
          });
          $("#set_cari_anggota2 option:selected").each(function () {
            $('#nama').val($(this).attr('data-nama'));
          });
          $("#set_cari_anggota2 option:selected").each(function () {
            $('#gambar').val($(this).attr('data-gambar'));
            var x = document.getElementById("gambar").value;
            document.getElementById("set_gambar2").src="../../asset/ANGGOTA/"+x;
          });
      });
    </script>

    <script type="text/javascript">
      function yesnoCheck() {
        if (document.getElementById('yesCheck').checked) {
          document.getElementById('ifYes').style.display = 'block';
          document.getElementById('ifYes2').style.display = 'block';
          document.getElementById('ifYes3').style.display = 'block';
          document.getElementById('ifNo').style.display = 'none';
          document.getElementById('ifNo2').style.display = 'none';
          $('textarea[id="ket_tolak_nasabah"]').prop('required', false);
          $('input[id="no_anggota_acc"]').prop('required', true);
          $('input[name="set_saldo_pokok_acc"]').prop('required', true);
        }else{
          document.getElementById('ifYes').style.display = 'none';
          document.getElementById('ifYes2').style.display = 'none';
          document.getElementById('ifYes3').style.display = 'none';
          document.getElementById('ifNo').style.display = 'block';
          document.getElementById('ifNo2').style.display = 'block';
          $('textarea[id="ket_tolak_nasabah"]').prop('required', true);
          $('input[id="no_anggota_acc"]').prop('required', false);
          $('input[name="set_saldo_pokok_acc"]').prop('required', false);
        }

      }
    </script>

<script type="text/javascript"> //Acc SAldo Pokok Nasabah
  $('.reply_author_check').change(function () {
    if ($(this).is(':checked')) {
      $('input[id="rupiah"]').prop('readonly', true).val(document.getElementById("set_saldo_pokok").value);
    } else {
      $('input[id="rupiah"]').prop('readonly', false).val('');
    }
  });
</script>


  <script type="text/javascript">
    var sel = document.getElementById("sel"), text = document.getElementById("text");

    sel.onchange = function(e) {
      text.disabled = (sel.value !== "0");
      text.required = (sel.value !== "0");
    };

    // function yesnoCheck() {
    //   if (document.getElementById('yesCheck').checked) {
    //     document.getElementById('ifYes').style.display = 'block';
    //     document.getElementById('ifYes2').style.display = 'block';
    //     document.getElementById('ifYes3').style.display = 'block';
    //     document.getElementById('ifNo').style.display = 'none';
    //     document.getElementById('ifNo2').style.display = 'none';
    //     $('textarea[id="ket_tolak_nasabah"]').prop('required', false);
    //     $('input[id="no_anggota_acc"]').prop('required', true);
    //     $('input[name="set_saldo_pokok_acc"]').prop('required', true);
    //   }else{
    //     document.getElementById('ifYes').style.display = 'none';
    //     document.getElementById('ifYes2').style.display = 'none';
    //     document.getElementById('ifYes3').style.display = 'none';
    //     document.getElementById('ifNo').style.display = 'block';
    //     document.getElementById('ifNo2').style.display = 'block';
    //     $('textarea[id="ket_tolak_nasabah"]').prop('required', true);
    //     $('input[id="no_anggota_acc"]').prop('required', false);
    //     $('input[name="set_saldo_pokok_acc"]').prop('required', false);
    //   }
    //
    // }
  </script>



  <script type="text/javascript">
  var a = document.getElementById("a"),
      b = document.getElementById("b"),
      c = document.getElementById("c");
      d = document.getElementById("d");

  a.onkeyup = function() {
      if (this.value.length === parseInt(this.attributes["maxlength"].value)) {
          b.focus();
      }
  }

  b.onkeyup = function() {
      if (this.value.length === parseInt(this.attributes["maxlength"].value)) {
          c.focus();
      }
  }
  c.onkeyup = function() {
      if (this.value.length === parseInt(this.attributes["maxlength"].value)) {
          d.focus();
      }
  }
  </script>

  <script>
    function goBack() {
      window.history.back();
    }
  </script>

</body>
</html>
