@extends('layouts.app')
@section('content')
    <div class="card">
        <form method="post" action="{{ route('mark.update',['idStudent' => $mark[0]->idStudent, 'idSubject' => $mark[0]->idSubject])}}">
            
            @csrf 
            <div class="card-header">
                <h4 class="card-title">
                    Sửa điểm
                </h4>
            </div>
            <div class="card-content">
                <div class="form-group">
                    <label>Tên sinh viên</label>
                    <input type="text" name="nameStudent" class="form-control" value="{{ $mark[0]->lastName}}  {{$mark[0]->firstName}}" readonly>
                </div>
                <div class="form-group">
                    <label>Tên môn</label>
                    <input type="text" name="nameSubject" class="form-control" value="{{ $mark[0]->nameSubject }}" readonly>
                </div>
                <div class="form-group">
                    <label>Final 1</label>
                    <input type="text" name="final1" class="form-control" value="{{ $mark[0]->final1 }}" >
                </div>
                <div class="form-group">
                    <label>Final 2</label>
                    @if ($mark[0]->final1 >= 5)
                        <input type="text" name="final2" class="form-control" placeholder="Đã qua phần final" readonly>
                    @else 
                        <input type="text" name="final2" class="form-control" value="{{ $mark[0]->final2 }}">
                    @endif
                        
                </div>
                <div class="form-group">
                    <label>Skill 1</label>
                    <input type="text" name="skill1" class="form-control" value="{{ $mark[0]->skill1 }}">
                </div>
                <div class="form-group">
                    <label>Skill 2</label>
                    @if ($mark[0]->skill1 >= 5)
                        <input type="text" name="skill2" class="form-control" placeholder="Đã qua phần skill" readonly>
                    @else
                       <input type="text" name="skill2" class="form-control" value="{{ $mark[0]->skill2 }}"> 
                    @endif
                    
                </div>
                <button type="submit" class="btn btn-fill btn-info">Sửa</button>
            </div>
	    </form>
	</div>
@endsection