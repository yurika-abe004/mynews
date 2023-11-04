{{-- layouts/profile.blade.phpを読み込む --}}
@extends('layouts.profile')


{{-- profile.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'プロフィール新規作成')

{{-- profile.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール新規作成</h2>
                <form action="{{ route('profile.create') }}" method="post" enctype="multipart/form-data">
                    
                @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                
                    <div class="form-group row mb-2">
                        <label class="col-md-2" for="name">氏名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                        <label class="col-md-2" for="gender">性別</label>
                    <div  class="form-check form-check-inline">    
                            <input type="radio" name="gender" id="men" value='男性' {{ old('gender') == 'men' ? 'checked' : '' }}>
                            <label for="radio01">男性</label>
                    </div>
                    <div  class="form-check form-check-inline">
                            <input type="radio" name="gender" id="women" value='女性' {{ old('gender') == 'women' ? 'checked' : '' }}>
                            <label for="radio02">女性</label>
                    </div>
                    <div  class="form-group row mb-2">
                        <label class="col-md-2" for="hobby">趣味</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="hobby" rows="10">{{ old('hobby') }}</textarea>
                        </div>
                    </div>
                    <div  class="form-group row mb-2">
                        <label class="col-md-2" for="introduction">自己紹介欄</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="10">{{ old('introduction') }}</textarea>
                        </div>
                    </div> 
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="登録">
                </form>         
            </div>
        </div>
    </div>
@endsection