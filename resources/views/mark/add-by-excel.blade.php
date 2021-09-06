@extends('layouts.app')
@section('content')
	
    <div class="card">
	    <div class="card-header">
	        <h4 class="card-title">Thêm bảng điểm bằng excel</h4><br>
            <p>Download file mẫu: 
                <a href="{{ asset('upload/file-mau-add-mark.xlsx') }}" download class="btn btn-sm btn-fill ">Tải xuống file mẫu</a>
            </p>
            
            <form method="POST" action="{{ route ('mark.add-by-excel-process')}}" enctype="multipart/form-data">
                @csrf
                <input type="file" name="excel-file" class="btn btn-wd" 
                accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"><br>
                <button class="btn btn-fill">Thêm</button>
            </form>  
            <br>          
	    </div>
    </div>
@endsection