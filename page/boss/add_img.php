<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <form action="back_add_img.php" method="POST" enctype="multipart/form-data" >
        <input type="file" name="file[]" id="file" multiple required>
        <br>
        <button type="submit">Cilck</button>
        
    </form>

    <div id="pdfplace">
    <a href="../../assets/images/HW2_CMD.pdf">คลิกที่นี้เพื่อดาวน์โหลดไฟล์ PDF</a>
</div>
<iframe src="../../assets/images/HW2_CMD.pdf" width="80%" height="600px">
    <script type="text/javascript" src="js/pdfobject.js"></script>
 <script type="text/javascript">
  window.onload = function (){
    var myPDF = new PDFObject({ 
        url: "pdf/20220408152816551.pdf",
        id: "myPDF",
        width: "650px",
        height: "700px",
        pdfOpenParams: {
            navpanes: 1,
            statusbar: 0,
            view: "FitH",
            pagemode: "thumbs"
        }
        }).embed('pdfplace');
  };
</script>
</body>
</html>