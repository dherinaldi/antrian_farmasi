<html>

<head>

</head>

<body>
    <select id="sel_norm" style="width: 300px;">
    </select>
    <select id="mySelect2" style="width: 300px;">
    </select>

    <select class="player-select form-control" style="width: 300px;">
</select>

</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    //$('.sel_norm').select2();
    $('#sel_norm').select2({
        ajax: {
            url: 'http://localhost/antrian_farmasi/nomor-antrian/data.php',
            data: function(params) {
                var query = {
                    search: params.term
                }
                // Query parameters will be ?search=[term]&type=public
                return query;
            },
            processResults: function(response) {
                return {
                    results: response
                };
            },
            cache: true
        }
    });

    $('#mySelect2').select2({
        ajax: {
            url: 'https://api.github.com/orgs/select2/repos',
            data: function(params) {
                var query = {
                    search: params.term,
                    type: 'public'
                }

                // Query parameters will be ?search=[term]&type=public
                return query;
            },
            processResults: function(data, params) {
                // parse the results into the format expected by Select2
                // since we are using custom formatting functions we do not need to
                // alter the remote JSON data, except to indicate that infinite
                // scrolling can be used
                var resData = [];
                data.forEach(function(value) {
                    if (value.LastName.indexOf(params.term) != -1)
                        resData.push(value)
                })
                return {
                    results: $.map(resData, function(item) {
                        return {
                            text: item.LastName,
                            id: item.Id
                        }
                    })
                };
            },
            cache: true
        }
    });

    $(".player-select").select2({
        ajax: {
            url: "https://raw.githubusercontent.com/kshkrao3/JsonFileSample/master/select2resp.json",
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    q: params.term // search term
                };
            },
            processResults: function(data, params) {
                // parse the results into the format expected by Select2
                // since we are using custom formatting functions we do not need to
                // alter the remote JSON data, except to indicate that infinite
                // scrolling can be used
                var resData = [];
                data.forEach(function(value) {
                    if (value.LastName.indexOf(params.term) != -1)
                        resData.push(value)
                })
                return {
                    results: $.map(resData, function(item) {
                        return {
                            text: item.LastName,
                            id: item.Id
                        }
                    })
                };
            },
            cache: true
        },
        minimumInputLength: 1
    })
});
</script>

</html>