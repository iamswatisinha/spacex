<html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css"  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css"  href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style type="text/css">
            span.wrap-text {
    max-width: 213px;
    text-overflow: ellipsis;
    display: inline-block;
    overflow: hidden;
}
 span.wrap-text:hover {
    max-width: fit-content;
    background: #f3f0a9;
}
span.wrap-number{
  display: inline-block;
  overflow: hidden;
}

        </style>
    </head>
    <body>
        <div class="container" style="margin-top: 50px;">
            <div class="pull-right">
                <button id="clickme" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i>  Refresh</button>
            </div>
        </div>            
        <div class="container" style="margin-top: 10px;">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th> Flight Number </th>
                            <th> mission_name </th>
                            <th> launch_year </th> 
                            <th> launch_date_local </th>                         
                            <th> rocket_id </th>                          
                            <th> rocket_name </th>    
                        </tr>
                    </thead>
                    <tbody>                        
                    </tbody>
                </table>
            </div>
        </div>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript">
          loadData();
              function loadData(){
                $(function() {
                  var tbl = $('#example').DataTable();
                  tbl.destroy();
                  $('#example').show();
                  var table = $('#example').DataTable({
                      "bFilter" : false, 
                      "bInfo" : false, 
                      "pageLength": 10,             
                      "serverSide": false,
                      "processing": true, 
                      "scrollX": true,
                      "ajax": {
                        "url":  'api.php',
                        "type": "POST",
                        "data":{
                          "getdata" : 1,                            
                        },
                        'dataSrc': function(response){
                          return response;
                        }
                      },
                      "columns": [
                        { 'data': 'flight_number', "name": "flight_number",},
                        { 'data': 'mission_name', "name": "mission_name"},
                        { 'data': 'launch_year', "name": "launch_year" },
                        { 'data': 'launch_date_local', "name": "launch_date_local" },
                        { 'data': 'rocket_id', "name": "rocket_id" },
                        { 'data': 'details', "name": "details" },
                      ],
                      "order": [[ 0, "asc" ]],                   
                    });
                });     
              }   

              $('#clickme').click(function(){
                loadData();
              });
        </script>
    </body>
</html>
