</div>
    </section>
    
    <footer id="footer">
            <p>All rights reserved &copy; 2018</p>
    </footer>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/validator.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-confirmation.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/daterangepicker.js"></script>
    <script>
      $(document).ready(function() {
      $('.table').DataTable();
      });

      $('[data-toggle=confirmation]').confirmation({
        rootSelector: '[data-toggle=confirmation]',
        title : "Are you Sure>",
        popout: true,
        btnOkLabel: "Confirm",
        btnOkClass: "btn-danger title",
        btnCancelLabel: "Cancel",
        btnCancelClass:"btn-primary title"
      });

   // !function(a){a.fn.datepicker.dates.ar={days:["الأحد","الاثنين","الثلاثاء","الأربعاء","الخميس","الجمعة","السبت","الأحد"],daysShort:["أحد","اثنين","ثلاثاء","أربعاء","خميس","جمعة","سبت","أحد"],daysMin:["ح","ن","ث","ع","خ","ج","س","ح"],months:["يناير","فبراير","مارس","أبريل","مايو","يونيو","يوليو","أغسطس","سبتمبر","أكتوبر","نوفمبر","ديسمبر"],monthsShort:["يناير","فبراير","مارس","أبريل","مايو","يونيو","يوليو","أغسطس","سبتمبر","أكتوبر","نوفمبر","ديسمبر"],today:"هذا اليوم",rtl:!0}}(jQuery);

    $.fn.datepicker.defaults.format = "dd-mm-yyyy";
$('.datepicker').datepicker({
    rtl: true,
    Default: true,
    language:"ar"
});

$('.dateRangePicker').daterangepicker({
    "showDropdowns": true,
    "showWeekNumbers": true,
    "ranges": {
        "Today": [
          <?php
          $today=date_create(date("Y-m-d"));
          $yesterday=date_create(date("Y-m-d"));
          $last_7=date_create(date("Y-m-d"));
          $last_30=date_create(date("Y-m-d"));
          $this_month = '"'.date_format($today,"Y")."-".date_format($today,"m")."-01".'","'.date_format($today,"Y")."-".date_format($today,"m")."-30".'"';
          $last_month = '"'.date_format($today,"Y")."-".date_format($last_30,"m")."-01".'","'.date_format($today,"Y")."-".date_format($last_30,"m")."-30".'"';
          date_sub($yesterday,date_interval_create_from_date_string("1 days"));
          date_sub($last_7,date_interval_create_from_date_string("7 days"));
          date_sub($last_30,date_interval_create_from_date_string("30 days"));
          ?>
          "<?php echo date_format($today,"Y-m-d"); ?>" 
            ,
            "<?php echo date_format($today,"Y-m-d"); ?>" 
        ],
        "Yesterday": [
          "<?php echo date_format($yesterday,"Y-m-d"); ?>" 
            ,
            "<?php echo date_format($yesterday,"Y-m-d"); ?>" 
        ],
        "Last week": [
          "<?php echo date_format($last_7,"Y-m-d"); ?>",
          "<?php echo date_format($today,"Y-m-d"); ?>"
        ],
        "Last month": [
          "<?php echo date_format($last_30,"Y-m-d"); ?>",
          "<?php echo date_format($today,"Y-m-d"); ?>"
        ],
        "this month": [
            <?php echo $this_month; ?>
        ]
    },
    "locale": {
        "format": "YYYY-MM-DD",
        "separator": " - ",
        "applyLabel": "Apply",
        "cancelLabel": "Cancel",
        "fromLabel": "From",
        "toLabel": "To",
        "customRangeLabel": "Custom",
        "weekLabel": "W",
        "firstDay": 1
    },
    "alwaysShowCalendars": true,
    "opens": "left"
}, function(start, end, label) {
  document.getElementById("start_date").value = start.format('YYYY-MM-DD');
  document.getElementById("end_date").value = end.format('YYYY-MM-DD');
  $('#reportrange span').html("From: " + start.format('DD - MM - YYYY') + ' :To ' + end.format('DD - MM - YYYY'));
});




    </script>

  </body>
</html>