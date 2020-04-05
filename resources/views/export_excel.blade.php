@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-body">
        <head>
            <title>Reporte de Materiales</title>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <style type="text/css">
            .box{
                width:600px;
                margin:0 auto;
                border:1px solid #ccc;
            }
            </style>
        </head>
        <body>
            <br>
            <div class="container">
                <h2>Reporte de Materiales</h2>
                <label>Desde: </label>
                <input type="date"/>
                <label>Hasta: </label>
                <input type="date"/>
                <div align="center">
                    <a href="{{ route('export_excel.generateMat') }}" class="btn btn-success">Generar</a>
                </div>
                <br/>
                <br/>
                <br/>
                <h2>Reporte de Beneficiarios</h2>
                <label>Desde: </label>
                <input type="date"/>
                <label>Hasta: </label>
                <input type="date"/>
                <div align="center">
                    <a href="{{ route('export_excel.generateClie') }}" class="btn btn-success">Generar</a>
                </div>
            </div>
        </body>
    </div>
</div>
@endsection