@extends(get_frontend_view_path('layout'))
@section('title')
    Chuyển đổi Base64 thành văn bản
@endsection
@section('content')
    <form method="post">
        <fieldset>
            <div class="form-group">
                <label for="content">Nội dung</label>
                <textarea name="content" rows="6" class="form-control" id="content" aria-describedby="content">{{ request()->input('content')  }}</textarea>
            </div>
            <div class="form-group">
                <label for="content">Kết quả</label>
                <textarea rows="6" readonly class="form-control" id="content" aria-describedby="content">{{ $result }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Xử lý</button>
        </fieldset>
    </form>
@endsection