<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lembar Pengesahan</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        body{
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color:#333;
            text-align:left;
            font-size:18px;
            margin:0;
        }
        .container{
            margin:0 auto;
            margin-top:0px;
            padding:0px;
            width:100%;
            height:auto;
            background-color:#fff;
        }
        caption{
            font-size:28px;
            margin-bottom:15px;
        }
        table{
            border:1px solid #333;
            border-collapse:collapse;
            margin:0 auto;
            width:100%;
        }
        td, tr, th{
            padding:12px;
            border:1px solid #333;
            width:185px;
        }
        th{
            background-color: #f0f0f0;
        }
        h4, p{
            margin:0px;
        }
    </style>
</head>
<body>
    <div class="container">
        <table>
            <caption>
                LEMBAR PENGESAHAN
            </caption>
            <thead>
                <tr>
                    <th colspan="2">Lembar Pengaduan</th>
                    <th colspan="2">No Pengaduan<strong>#{{$first->ticket}}</strong></th>
                </tr>
                <tr>
                    <td colspan="2">
                        <h4>Customer: </h4>
                            {{$first->name}}<br>
                            {{$first->alamat}}<br>
                        </p>
                    </td>
                    <td colspan="2">
                        <h4>Produk :</h4><br>
                        {{$first->nama_produk}}<br>
                        {{$first->status}}<br>
                        </p>
                    </td>
                </tr>
                
            </thead>
        </table> 
        <p style="margin-top:5%; margin-left:2%; font-style:italic">Note :</p>
        <table>
            <tbody>
                <tr>
                    <th colspan="2">Note Disini</th>
                    <th colspan="2">Tulis Keterangan Disini<strong></th>
                </tr>
                <tr>
                    <td colspan="2" style="height:100px">
                            {{$first->note}}
                    </td>
                    <td colspan="2">
                        
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="margin-top:10%; text-align:right">Tanda Tangan, </p>
        <p style="margin-top:15%; text-align:right">Manager  </p>
    </div>
</body>
</html>