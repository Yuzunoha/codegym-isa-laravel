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
  <p>forディレクティブの例</p>
  <ul>
    @for($i=1; $i<100; $i++)
      @if(1 === $i % 2)
        <!-- ループ変数は奇数である -->
        @continue
      @endif
    
      <li>No. {{$i}}</li>
    
      @if(9<=$i)
        <!-- ループ変数は9以上である -->
        @break
      @endif
    @endfor
  </ul>
</body>

</html>
