<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anggota PDF</title>
</head>
<body>
<table align="center" border="1" cellspacing="0">
                                 
                                    
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Kampus</th>
                                            <th>Prodi</th>
                                            <th>No Hp</th>
                                
                                          
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp
                                         @foreach ($anggotas as $ag)
                                         <tr>
                                             <td>{{$no++}}</td>
                                             <td>{{$ag->nama}}</td>
                                             
                                             <td>{{$ag->email}}</td>
                                             <td>{{$ag->kampus}}</td>
                                            
                                            <td>{{$ag->prodi}}</td>
                                            <td>{{$ag->hp}}</td>
                                          
                                            
                                            
                                        </tr> 

                                         @endforeach
                                    </tbody>
                                  
                                </table>
</body>
</html>