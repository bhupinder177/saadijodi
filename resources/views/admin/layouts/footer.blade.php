    <script src="{{ asset('admin/js/lib/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('admin/js/lib/popper/popper.min.js') }}"></script>
    <script src="{{ asset('admin/js/lib/tether/tether.min.js') }}"></script>
    <script src="{{ asset('admin/js/lib/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins.js') }}"></script>

    <script type="text/javascript" src="{{ asset('admin/js/lib/jqueryui/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/lib/lobipanel/lobipanel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/lib/match-height/jquery.matchHeight.min.js') }}"></script>
    <!-- <script type="text/javascript" src="../../../www.gstatic.com/charts/loader.js"></script> -->
    <script src="{{ asset('admin/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.toast.js') }}"></script>
    <script src="{{ asset('admin/js/monthpicker/jquery-ui.min.js') }}" ></script>

    <script src="{{ asset('admin/js/jquery.mtz.monthpicker.js') }}"></script>
    <script src="{{ asset('admin/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('admin/js/custom.js') }}"></script>


    <script src="{{ asset('admin/js/app.js') }}"></script>
    <script>
    // datepicker
 $( function() {
  $('.datepicker').datepicker({
     dateFormat: 'dd-mm-yy',
     changeMonth: true,
     changeYear: true,
     // yearRange: "1950:2020"
     yearRange: "1980:"+(new Date().getFullYear() + 20),
     onSelect: function (e) {
       var id = $(this).attr('id');
        $('#'+id+'-error').html('');
      }
  });
 });

 $(".startdate").datepicker({
             dateFormat: "dd-mm-yy",
             // minDate: 1,
             changeMonth: true,
             changeYear: true,
             // yearRange: "1950:2020"
                  yearRange: "1980:"+(new Date().getFullYear() + 20),
             onSelect: function (date) {
                 var date2 = $('.startdate').datepicker('getDate');
                 date2.setDate(date2.getDate());
                 $('.enddate').datepicker('setDate', date2);
                 $('.enddate').datepicker('option', 'minDate', date2);
                 var id = $(this).attr('id');
                  $('#'+id+'-error').html('');
             }
         });
         $('.enddate').datepicker({
             dateFormat: "dd-mm-yy",
             // minDate: 1,
             changeMonth: true,
             changeYear: true,
             // yearRange: "1950:2020"
             yearRange: "1980:"+(new Date().getFullYear() + 20),
             onClose: function () {
                 var dt1 = $('.startdate').datepicker('getDate');

                 var dt2 = $('.enddate').datepicker('getDate');
                 if (dt2 <= dt1) {
                     var minDate = $('.endate').datepicker('option', 'minDate');
                     $('.enddate').datepicker('setDate', minDate);
                     var id = $(this).attr('id');
                      $('#'+id+'-error').html('');
                 }
             }
         });

        // =======Pos start Date
        $(".startdatepos").datepicker({
                    dateFormat: "dd-mm-yy",
                    // minDate: 1,
                    changeMonth: true,
                    changeYear: true,
                    // yearRange: "1950:2020"
                         yearRange: "1980:"+(new Date().getFullYear() + 20),
                    onSelect: function (date) {
                        var date2 = $('.startdatepos').datepicker('getDate');
                        date2.setDate(date2.getDate());
                        // $('.enddatepos').datepicker('setDate', date2);
                        $('.enddatepos').datepicker('option', 'minDate', date2);
                        var id = $(this).attr('id');
                         $('#'+id+'-error').html('');
                    }
                });
                $('.enddatepos').datepicker({
                    dateFormat: "dd-mm-yy",
                    // minDate: 1,
                    changeMonth: true,
                    changeYear: true,
                    // yearRange: "1950:2020"
                    yearRange: "1980:"+(new Date().getFullYear() + 20),
                    onClose: function () {
                    var start =  $('.startdatepos').val();
                    var end =  $('.enddatepos').val();
                    var accountId =  $('.accountId').val();
                     if(start != '' && end != '' && accountId != '')
                     {
                       getposDateWise(accountId,start,end);
                      }
                    }
                });
        // =======Pos start Date

         $('.yearstart').monthpicker();
         $('.yearstart').monthpicker({pattern: 'yyyy-mm',
             selectedYear: 2021,
             startYear: 1900,
             finalYear: 2212,});
         	var options = {
             selectedYear: 2015,
             startYear: 2008,
             finalYear: 2018,
             openOnFocus: false
         };





         jQuery(document).on('focus', '.datepicker1', function () {
              $(this).datepicker({
                dateFormat: "dd-mm-yy",
                changeMonth: true,
                changeYear: true,
                yearRange: "'+new Date().getFullYear()+':"+(new Date().getFullYear() + 20),
                onSelect: function (date) {
                        var date2 = date;
                        $(this).val(date);
                        // var dt2 = $('#end_date1');
                        // var startDate = $(this).datepicker('getDate');
                        // var minDate = $(this).datepicker('getDate');
                        // dt2.datepicker('setDate', minDate);
                        // startDate.setDate(startDate.getDate() + 30);
                        // //sets dt2 maxDate to the last day of 30 days window
                        // dt2.datepicker('option', 'maxDate', startDate);
                        // dt2.datepicker('option', 'minDate', minDate);
                        // $(this).datepicker('option', 'minDate', minDate);
                }
              });
           });
    </script>
</body>



</html>
