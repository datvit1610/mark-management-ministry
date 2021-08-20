@extends('layouts.app')
@section('content')
	{{-- <div class="text-right">
		<a href="{{ route('student.create') }}" class="btn btn-info btn-fill btn-wd">Thêm sinh viên</a>
	</div>
			<br> --}}
    <div class="card">
	    <div class="card-header">
	        <h4 class="card-title">Thêm sinh viên bằng excel</h4>
            <p>Download file mẫu: </p>
            <a href="{{ asset('upload/file-mau.xlsx') }}" download>Tải xuống file mẫu</a>
            <form method="POST" action="{{ route('student.add-by-excel-process') }}" enctype="multipart/form-data">
                @csrf
                <input type="file" name="excel-file" class="form-control" 
                accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                <button>Thêm</button>
            </form>
	    </div>
    </div>
@endsection