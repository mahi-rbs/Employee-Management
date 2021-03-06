 <!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
  
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
      table {
        border-collapse: collapse;
        width: 100%;
      }
      td, th {
        border: solid 2px;
        padding: 10px 5px;
      }
      tr {
        text-align: center;
      }
      .container {
        width: 100%;
        text-align: center;
      }
      body {
    font-family: Kiron, SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif !important;
}
    </style>
  </head>
  <body>
    <div class="container">
        <div><h2>List of hired employees from {{$searchingVals['from']}} to {{$searchingVals['to']}}</h2></div>
       <table id="example2" role="grid">
            <thead>
              <tr role="row">
                <th width="20%">Name</th>
                <th width="20%">Address</th>
                <th width="10%">Age</th>
                <th width="15%">Birthdate</th>
                <th width="15%">Hired Date</th>
                <th width="10%">Department</th>
                <th width="10%">Division</th>             
              </tr>
            </thead>
            <tbody>
            @foreach ($employees as $employee)
                <tr role="row" class="odd">
                  <td>{{ $employee['name_bangla'] }}</td>
                  <td>{{ $employee['pre_address'] }}</td>
                  <td>{{ $employee['dob'] }}</td>
                  <td>{{ $employee['designation_name'] }}</td>
                  <td>{{ $employee['date_hired'] }}</td>
                  <td>{{ $employee['email'] }}</td>
                  <td>{{ $employee['mobile'] }}</td>
              </tr>
            @endforeach
            </tbody>
          </table>
    </div>
  </body>
</html>