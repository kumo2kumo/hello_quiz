<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <p>hello</p>
  <p>{{ $name }}</p>
  <div id="app">@{{ message }}</div>

  <script>
    console.log('yukichi')
    let app = new Vue({
      el: '#app',
      data: {
        message: 'こんにちは',
      }
    });
  </script>
</body>

</html>