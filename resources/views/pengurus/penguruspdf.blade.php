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
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                
                                          
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp
                                         @foreach ($penguruss as $ag)
                                         <tr>
                                             <td>{{$no++}}</td>
                                             <td>{{$ag->agt}}</td>
                                             <td>{{$ag->str}}</td>
                                          
                                            
                                            
                                        </tr> 

                                         @endforeach
                                    </tbody>
                                  
                                </table>
</body>
</html>