<!DOCTYPE html>
<html>
<head>
    <title>PDF</title>
</head>
<body>
    <embed src="{{ 'data:application/pdf;base64,' . base64_encode($pdf) }}" type="application/pdf" width="100%" height="1024px">
</body>
</html>