<html>

<head>
  <title>Hello/Index</title>
  <style>
    body {
      font-size: 16pt;
      color: #999;
    }

    h1 {
      font-size: 50pt;
      text-align: right;
      color: #f6f6f6;
      margin: -20px 0px -30px 0px;
      letter-spacing: -4pt;
    }
  </style>
</head>

<body>
  <p>whileディレクティブとphpディレクティブの例2</p>
  @php
    $cnt = 0;
    $length = count($data);
  @endphp

  <ol>
  @while ($cnt < $length)
    <li>{{$data[$cnt++]}}</li>
  @endwhile
  </ol>
</body>

</html>
