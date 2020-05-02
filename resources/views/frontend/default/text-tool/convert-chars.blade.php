@extends(get_frontend_view_path('layout'))
@section('content')
    <form method="post">
        <fieldset>
            <div class="form-group">
                <label for="mode">Kiểu chuyển đổi</label>
                <select class="form-control" id="mode" name="mode">
                    <option {{ request()->input('uppercase') ? 'selected' : '' }} value="uppercase">CHỮ IN HOA</option>
                    <option {{ request()->input('lowercase') ? 'selected' : '' }} value="lowercase">chữ thường</option>
                    <option {{ request()->input('capitalize') ? 'selected' : '' }} value="capitalize">In Hoa Mỗi Ký Tự Đầu Trong Từ</option>
                </select>
            </div>
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