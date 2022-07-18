<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita PDF</title>
</head>
<body>
<table align="center" border="1" cellspacing="0">
                                 
                                    
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>judul</th>
                                            <th>Tanggal Rilis</th>
                                            <th>Tanggal Berakhir</th>
                                            <th>Jam</th>
                                            <th>Kategori Berita</th>
                                          
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp
                                         @foreach ($beritas as $ag)
                                         <tr>
                                             <td>{{$no++}}</td>
                                             <td>{{$ag->judul}}</td>
                                             <td>{{$ag->tgl_liris}}</td>
                                             <td>{{$ag->tgl_akhir}}</td> 
                                            <td>{{$ag->jam}}</td>
                                            <td>{{$ag->nmk}}</td>
                                            
                                            
                                        </tr> 

                                         @endforeach
                                    </tbody>
                                  
                                </table>
</body>
</html>