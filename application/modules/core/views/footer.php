<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<!-- <footer class="footer footer-static footer-light">
  <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2021<a class="text-bold-800 grey darken-2" href="#">Kubis.id,</a>All rights Reserved</span>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
  </p>
</footer> -->
<!-- END: Footer-->

<div class="modal modal-top animated fadeInUp delay-30s" id="modalGue" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary  text-white">
                <h5 class="modal-title" id="modalTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalContent"></div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>

<!-- BEGIN: Vendor JS-->
<script src="<?= base_url() ?>assets/app-assets/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="<?= base_url() ?>assets/app-assets/vendors/js/charts/apexcharts.min.js"></script>
<script src="<?= base_url() ?>assets/app-assets/vendors/js/extensions/tether.min.js"></script>
<script src="<?= base_url() ?>assets/app-assets/vendors/js/extensions/shepherd.min.js"></script>
<script src="<?= base_url() ?>assets/app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
<script src="<?= base_url() ?>assets/app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
<script src="<?= base_url() ?>assets/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
<script src="<?= base_url() ?>assets/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
<script src="<?= base_url() ?>assets/app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>assets/app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
<script src="<?= base_url() ?>assets/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/app-assets/vendors/js/pickers/pickadate/picker.js"></script>
<script src="<?= base_url() ?>assets/app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
<script src="<?= base_url() ?>assets/app-assets/vendors/js/pickers/pickadate/picker.time.js"></script>
<script src="<?= base_url() ?>assets/app-assets/vendors/js/pickers/pickadate/legacy.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="<?= base_url() ?>assets/app-assets/js/core/app-menu.js"></script>
<script src="<?= base_url() ?>assets/app-assets/js/core/app.js"></script>
<script src="<?= base_url() ?>assets/app-assets/js/scripts/components.js"></script>
<!-- END: Theme JS-->

<!-- Datepicker -->
<script src="<?= base_url() ?>assets/vendor/daterangepicker/moment.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/daterangepicker/daterangepicker.min.js"></script>

<!-- BEGIN: Page JS-->
<script src="<?= base_url() ?>assets/app-assets/js/scripts/pickers/dateTime/pick-a-datetime.js"></script>
<script src="<?= base_url() ?>assets/app-assets/js/scripts/datatables/datatable.js"></script>
<script src="<?= base_url() ?>assets/assets/js/ajax.js"></script>
<script src="<?= base_url() ?>assets/app-assets/vendors/js/pickers/pickadate/picker.js"></script>
<script src="<?= base_url() ?>assets/app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>

<script src="<?= base_url() ?>assets/app-assets/vendors/js/calendar/fullcalendar.min.js"></script>
<script src="<?= base_url() ?>assets/app-assets/vendors/js/calendar/extensions/daygrid.min.js"></script>
<script src="<?= base_url() ?>assets/app-assets/vendors/js/calendar/extensions/timegrid.min.js"></script>
<script src="<?= base_url() ?>assets/app-assets/vendors/js/calendar/extensions/interactions.min.js"></script>
<!-- <script src="<?= base_url() ?>assets/app-assets/js/scripts/pages/dashboard-analytics.js"></script> -->

<!-- Amchart Chart JS -->
<script src="<?php echo base_url(); ?>assets/amcharts4/core.js"></script>
<script src="<?php echo base_url(); ?>assets/amcharts4/chart.js"></script>
<script src="<?php echo base_url(); ?>assets/amcharts4/animated.js"></script>
<script src="<?php echo base_url(); ?>assets/amcharts4/themes/material.js"></script>
<script src="<?php echo base_url(); ?>assets/amcharts4/themes/kelly.js"></script>
<script src="<?php echo base_url(); ?>assets/amcharts4/kelly.js"></script>

<!-- DRAG -->
<!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js"
    type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>
<!-- BEGIN: Page Vendor JS-->
<script src="<?= base_url() ?>assets/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
<!-- BEGIN: Page JS-->
<script src="<?= base_url() ?>assets/app-assets/js/scripts/forms/select/form-select2.js"></script>

<!-- CKEDITOR-->
<!-- <script src="https://kobis.id/assets/ckeditor/ckeditor.js"></script> -->


<script>
    $(document).ready(function() {
        // Wrap the entire functionality in an async function
        async function fetchData() {
            try {
                const response = await fetch("<?= site_url('cpanel/core/data_notif') ?>", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify({}),
                });

                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }

                const res = await response.json();

                $("#count_notif").html(res.notif_count);

                $("#messages_notif .scrollable-container.media-list").empty();

                res.data.forEach(function(notification) {
                    var listItem = $("<a>", {
                        class: "d-flex justify-content-between notification-link",
                        "data-rfq-id": notification.rfq_id,
                        "data-id": notification.id,
                        href: "<?= url('rfq_request/detail/') ?>" + notification.rfq_id
                    });

                    let status = null;
                    if (notification.status == 1) {
                        status = 'read';
                        listItem.css('background-color', '');
                    } else if (notification.status == 0) {
                        status = 'unread';
                        listItem.css('background-color', '#edebfc');
                    }

                    var content = $("<div>", {
                            class: "media d-flex align-items-start"
                        })
                        .append($("<div>", {
                            class: "media-left"
                        }).html(
                            "<i class='feather icon-plus-square font-medium-5 primary'></i>"))
                        .append($("<div>", {
                                class: "media-body"
                            })
                            .append($("<h6>", {
                                class: "primary media-heading"
                            }).text(" " + notification.description))
                            .append($("<small>", {
                                class: "notification-text"
                            }).text(" " + "RFQ Id: " + notification.rfq_id + ', Status: ' + status))
                        )
                        .append($("<small>").html("<time class='media-meta' datetime='" +
                            notification.created_at + "'>" + calculateTimeDifference(
                                notification.created_at) + "</time>"));

                    listItem.addClass('mark-notifications-as-read');
                    
                    listItem.append(content);

                    $("#messages_notif .scrollable-container.media-list").append(listItem);
                });

                // console.log('data', res);
            } catch (error) {
                console.error('There was a problem with the fetch operation:', error);
            }
        }


        function markAllNotificationsAsRead() {
            $.ajax({
                url: '<?= site_url('cpanel/core/markAllNotificationsAsRead') ?>',
                type: 'POST',
                data: {
                    action: 'markAllNotificationsAsRead',
                },
                success: function(response) {
                    // Handle the response if needed
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        }


        $(".dropdown-menu-footer #markAllNotificationsAsRead").on("click", function() {
            markAllNotificationsAsRead();
        });

        $(".scrollable-container.media-list").on("click", ".mark-notifications-as-read", function() {
            var rfqId = $(this).data('rfq-id');
            var id = $(this).data('id');
            markNotificationsAsRead(rfqId, id);
        });



        function markNotificationsAsRead(rfqId,id) {
            $.ajax({
                url: '<?= site_url('cpanel/core/markNotificationsAsRead') ?>',
                type: 'POST',
                data: {
                    action: 'markNotificationsAsRead',
                    rfq_id: rfqId,
                    id: id
                },
                success: function(response) {
                    // Handle the response if needed
                    fetchData();
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        }

        function calculateTimeDifference(created_at) {
            const now = new Date();
            const createdAtDate = new Date(created_at);

            const timeDifference = now - createdAtDate;
            const seconds = Math.floor(timeDifference / 1000);
            const minutes = Math.floor(seconds / 60);
            const hours = Math.floor(minutes / 60);
            const days = Math.floor(hours / 24);

            if (days > 0) {
                return days + (days === 1 ? ' day ago' : ' days ago');
            } else if (hours > 0) {
                return hours + (hours === 1 ? ' hour ago' : ' hours ago');
            } else if (minutes > 0) {
                return minutes + (minutes === 1 ? ' minute ago' : ' minutes ago');
            } else {
                return seconds + (seconds === 1 ? ' second ago' : ' seconds ago');
            }
        }

        setInterval(fetchData, 3000);
    });
</script>

<script>
    $(document).ready(function() {
        init();
    });

    function init() {
        $(".init-loading").html("<i class='fa fa-spin fa-refresh'></i> &nbsp;&nbsp;&nbsp;Memuat Data ...");
        grafik();
    }

    function getMonthName(monthNumber) {
        const monthNames = [
            "Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        ];
    return monthNames[monthNumber - 1]; // Adjust month number to array index
}

    function grafik() {
        var selectedYear = $("#tahun").val(); // Get the selected year from the dropdown
        $.ajax({
            url: "<?= site_url('cpanel/dashboard/data_grafik') ?>",
            method: "POST", // Send data via POST method
            dataType: "json",
            data: {year: selectedYear}, // Pass the selected year to the server
            success: function(data) {
                // Process data
                data.forEach(function(entry) {
                    entry.bulan = getMonthName(entry.bulan);
                });
                barChart(data, "grafik");
            }
        });
    }
    
    am4core.useTheme(am4themes_animated);
    // am4core.useTheme(am4themes_material);
    function barChart(data, chartdiv) {
        var chart = am4core.create(chartdiv, am4charts.XYChart);
        chart.data = data;
        // Create axes
        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
        categoryAxis.dataFields.category = "bulan";
        categoryAxis.renderer.grid.template.location = 0;
        categoryAxis.renderer.minGridDistance = 20;
        categoryAxis.renderer.inside = false;
        categoryAxis.start = 0;

        categoryAxis.renderer.grid.template.disabled = true;
        var label = categoryAxis.renderer.labels.template;
        label.wrap = false;
        label.maxWidth = 160;
        label.tooltipText = "{category}";

        categoryAxis.events.on("sizechanged", function(ev) {
            var axis = ev.target;
            var cellWidth = axis.pixelWidth / (axis.endIndex - axis.startIndex);
            if (cellWidth < axis.renderer.labels.template.maxWidth) {
                axis.renderer.labels.template.rotation = -75;
                axis.renderer.labels.template.horizontalCenter = "right";
                axis.renderer.labels.template.verticalCenter = "middle";
            } else {
                axis.renderer.labels.template.rotation = 0;
                axis.renderer.labels.template.horizontalCenter = "middle";
                axis.renderer.labels.template.verticalCenter = "top";
            }
        });

        var valueAxis1 = chart.yAxes.push(new am4charts.ValueAxis());
        valueAxis1.extraMax = 0.3;
        valueAxis1.min = 0;
        var series1 = chart.series.push(new am4charts.ColumnSeries());
        series1.dataFields.valueY = "Total";
        series1.dataFields.categoryX = "bulan";
        series1.yAxis = valueAxis1;
        series1.columns.template.tooltipText = "{valueY.value}";

        chart.cursor = new am4charts.XYCursor();
        // chart.legend = new am4charts.Legend();
        // chart.legend.position = "top";
    }
</script>

<script>
    var hoursLabel = document.getElementById("hours");
    var minutesLabel = document.getElementById("minutes");
    var secondsLabel = document.getElementById("seconds");
    setInterval(setTime, 1000);

    function setTime() {
        secondsLabel.innerHTML = pad(Math.floor(new Date().getSeconds()));
        minutesLabel.innerHTML = pad(Math.floor(new Date().getMinutes()));
        hoursLabel.innerHTML = pad(Math.floor(new Date().getHours()));
    }

    function pad(val) {
        var valString = val + "";
        if (valString.length < 2) {
            return "0" + valString;
        } else {
            return valString;
        }
    }
</script>

<script type="text/javascript">
    $(function() {

        var start = moment().subtract(29, 'days');
        var end = moment();

        function cb(start, end) {
            $('#tangalrange').val(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));
        }

        $('#tanggalrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Hari ini': [moment(), moment()],
                'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                '7 hari terakhir': [moment().subtract(6, 'days'), moment()],
                '30 hari terakhir': [moment().subtract(29, 'days'), moment()],
                'Bulan ini': [moment().startOf('month'), moment().endOf('month')],
                'Bulan lalu': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                    'month').endOf('month')],
                'Tahun ini': [moment().startOf('year'), moment().endOf('year')],
                'Tahun lalu': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1,
                    'year').endOf('year')]
            }
        }, cb);

        cb(start, end);
    });
</script>

<!-- CKEDITOR -->
<!-- <script>
    var ckeditor = CKEDITOR.replace('ckeditor300', {
        height: '300px'
    });
</script> -->
<script type="text/javascript">
    $(document).ready(function() {

        $('#kategori').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo site_url('posting/get_sub_category'); ?>",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id_sub + '>' + data[i].nama_sub +
                            '</option>';
                    }
                    $('#sub_category').html(html);

                }
            });
            return false;
        });

    });
</script>

<script>
    function title(judul) {
        document.getElementById('title').innerText = judul.value;
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#modalGue').on('hide.bs.modal', function() {
            setTimeout(function() {
                $('.modal-dialog').removeClass('modal-lg modal-sm modal-md');
                $('#modalTitle, #modalContent , #modalFooter').html('');
            }, 500);
        });


        if ($(".select2").length) {
            $('.select2').select2();
        }


        $(document).on("click", "#reset-pwd", function(e) {
            e.preventDefault();
            $('.modal-dialog').addClass('modal-md');
            $("#modalTitle").text('Reset Password');
            $('#modalContent').load($(this).attr("href"));
            $("#modalGue").modal('show');
        });

        if ($(".text-editor").length) {
            $('.text-editor').summernote({
                height: ($(window).height() - 250),
                tabsize: 1,
                minHeight: null,
                maxHeight: null,
                dialogsInBody: true,
                dialogsFade: true,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['height', ['height']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                ],
                callbacks: {
                    onImageUpload: function(image) {
                        uploadImage(image[0]);
                    },
                    onInit: function() {
                        var label = $(this).attr('data-original-label');
                        var next_class = $(this).next();
                        $(next_class).addClass(label);
                        $(next_class).find('.btn-fullscreen').attr('data-label', label);
                        $(next_class).find('button[data-original-title="Picture"]').attr(
                            'data-label', label);
                        $(document).on("click", "button[data-label='" + label + "']", function(e) {
                            e.preventDefault();
                            var label_modal = $(this).data('label');
                            $(".modal[aria-label='Insert Image']").attr('data-label', '');
                            $('.button-file-manager').remove();
                            var modal_filemanager = $(".modal[aria-label='Insert Image']")
                                .attr('data-label', label_modal);
                            $(".modal[data-label='" + label_modal + "'] .modal-body")
                                .append('<div class="button-file-manager"></div>');
                            $(".button-file-manager").html(
                                '<p id="filemanager-note"><a class="btn btn-sm btn-warning" target="_blank" href="<?= url('filemanager') ?>">Open Filemanager</a></p>'
                            );
                        });

                        $(document).on("click", ".btn-fullscreen[data-label='" + label + "']",
                            function(e) {
                                e.preventDefault();
                                var isFullscreen = $(".text-editor[data-original-label='" +
                                    label + "']").summernote('fullscreen.isFullscreen');
                                if (isFullscreen) {
                                    $(".fixed-top").css('z-index', '0');
                                    $(".sidebar").css('z-index', '0');
                                } else {
                                    $(".fixed-top").css('z-index', '1030');
                                    $(".sidebar").css('z-index', '11');
                                }

                            });
                    }
                }
            });


            // $(".modal[aria-label='Insert Image']").on('hide.bs.modal', function () {
            //   setTimeout(function(){
            //       $('.button-file-manager').remove();
            //     }, 500);
            //  });


            function uploadImage(image) {
                var data = new FormData();
                data.append("file", image);
                $.ajax({
                    url: "<?= url($this->uri->segment(2) . '/imageUploadEditor') ?>",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: data,
                    type: "POST",
                    dataType: 'JSON',
                    success: function(json) {
                        if (json.success == true) {
                            $('.text-editor').summernote("insertImage", json.file);
                        } else {
                            showToast('error', json.msg);
                        }
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            }
        }


        // upload single image
        $('.btn-remove-image').on('click', function() {
            var data_id = $(this).data('id');
            $(".btn-remove-image[data-id='" + data_id + "']").hide();
            $(".file-dir[data-id='" + data_id + "']").val("");
            $(".file-name[data-id='" + data_id + "']").val("");
            $(".file-upload-default[data-id='" + data_id + "']").val("");
        });



        $('.file-upload-browse').on('click', function() {
            var data_id = $(this).data('id');
            var file = $(".file-upload-default[data-id='" + data_id + "']");
            file.focus().trigger('click');
        });

        $('.file-upload-default').on('change', function() {
            var data_id = $(this).data('id');
            $(".file-upload-browse[data-id='" + data_id + "']").html(`<div class="spinner-border-custom spinner-border text-light" role="status"">
                                     <span class="sr-only">Loading...</span>
                                   </div>`);
            var file_data = $(".file-upload-default[data-id='" + data_id + "']").prop("files")[0];
            var form_data = new FormData();
            form_data.append("file", file_data);
            $.ajax({
                url: '<?= url('core/imageUpload') ?>',
                type: 'post',
                data: form_data,
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                success: function(json) {
                    $(".file-upload-browse[data-id='" + data_id + "']").html("Select File");
                    if (json.success != true) {
                        $(".file-dir[data-id='" + data_id + "']").val("");
                        $(".file-name[data-id='" + data_id + "']").val("");
                        $(".btn-remove-image[data-id='" + data_id + "']").hide();
                        showToast("error", json.msg);
                    } else {
                        if (json.select != false) {
                            $(".file-dir[data-id='" + data_id + "']").val(json.file_dir);
                            $(".file-name[data-id='" + data_id + "']").val(json.file_name);
                            if ($(".file-name[data-id='" + data_id + "']").val() != "") {
                                $(".btn-remove-image[data-id='" + data_id + "']").show();
                            }
                        }
                        //  console.log(json.msg);
                    }
                }
            });
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
    var batchingPlantSelect = document.getElementById("suplai_batching");
    var otherBatchingPlantInput = document.getElementById("suplai_batching_other");

    batchingPlantSelect.addEventListener("change", function () {
        if (batchingPlantSelect.value === "Other") {
            otherBatchingPlantInput.style.display = "block";
        } else {
            otherBatchingPlantInput.style.display = "none";
        }
    });
  });
</script>

</body>

</html>
