<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Print table</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
    <style type="text/css">
      body {margin:20px}
    </style>
  </head>
  <body>
    <table class="table table-bordered table-condensed table-striped">
@foreach($data as $row)
@if ($row == reset($data))
      <tr>
@foreach($row as $key => $value)
        <th>{!! $key !!}</th>
@endforeach
      </tr>
@endif
      <tr>
@foreach($row as $key => $value)
@if(is_string($value) || is_numeric($value))
        <td>{!! $value !!}</td>
@else
        <td></td>
@endif
@endforeach
      </tr>
@endforeach
    </table>
  </body>
</html>
