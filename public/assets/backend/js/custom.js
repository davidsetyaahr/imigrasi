$(document).ready(function() {
    
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });

    $(".select2").select2();

    $(".datepicker").datepicker({
        format: "yyyy-mm-dd"
    });

    function todayYmd() {
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();
        today = yyyy + '-' + mm + '-' + dd;

        return today
    }

    $(".card-jadwal .card-header").click(function(){
        $('.card-jadwal .card-header').removeClass('jadwal-clicked')
        $(this).toggleClass('jadwal-clicked')

        var table = $(this).data('table')

        if($(table+" tbody tr").length==0){
            var tgl = $(this).data('tgl')
            $.ajax({
                type : 'get',
                data : {tgl, tgl},
                url : 'jadwal/detail',
                beforeSend : function(){
                    $(table+" tbody").append(`<tr><td colspan="8" class='text-center'>Loading...</td></tr>`)
                },
                success : function(res){
                    $(table+" tbody tr").remove()
                    res = JSON.parse(res)
                    $.each(res, function(key,data){
                        var i = key+1
                        $(table+" tbody").append(`
                            <tr>
                                <td>${i}</td>
                                <td>${data.nama}</td>
                                <td>${data.nik}</td>
                                <td>${data.email}</td>
                                <td>${data.no_hp}</td>
                                <td>${data.alamat}</td>
                                <td>${data.tipe=='Philang' ? 'Paspor Hilang' : 'Paspor Rusak' }</td>
                                <td>
                                ${
                                    todayYmd()==tgl ? "<a href='' class='btn btn-primary'>Lakukan Pemeriksaan</a>" : "<a href='' class='btn btn-success'>Edit</a>" 
                                }
                                </td>
                            </tr>
                        `)
                    })
                }
            })
        }
    })

    function indoDate(date){
        var year = date.substr(0,4);
        var month = date.substr(5,2);
        var day = date.substr(8,2);
        var newFormat = day+"-"+month+"-"+year 

        return newFormat;
    }
    
	$(".confirm-alert").click(function(e) {
		e.preventDefault();
		var url = $(this).attr("href");
		var text = $(this).data('alert')
		swal(
			{
				title: "Apakah anda yakin?",
				text: text,
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#3c4099",
				confirmButtonText: 'Submit',
				closeOnConfirm: false
			},
			function() {
				window.location = url;
			}
		);
	});
	$("#submitConfirm").submit(function(e) {
        e.preventDefault();
		var id = $(this).attr("id");
        $(".loading").removeClass("show");
        var info = $(this).data('info')
		swal(
			{
				title: "Apakah Anda Yakin?",
				text: info,
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yakin",
				closeOnConfirm: false
			},
			function() {
				$("#"+id).unbind("submit").submit();
                $(".loading").addClass("show");
			}
		);
	});

    $(".sendParamToModal").click(function() {
        var data = $(this).data('param')
        $.each(data, function(i,d) {
            if(i%2==0){
                $(data[i+1]).val(d)
            }
        })
    })
});
