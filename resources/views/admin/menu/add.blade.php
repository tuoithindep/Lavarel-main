@extends('admin.main')

@section('content')
<form action="" method="POST">
    <div class="card-body">

      <div class="form-group">
        <label for="menu">Tên danh mục </label>
        <input type="text" name="name" class="form-control" placeholder="Nhap ten">
      </div>

      <div class="form-group">
        <label >Chọn danh mục cha</label>
        <select class="form-control" name="parent_id">
            <option value="0">Danh mục cha</option>

            @foreach ($menus as $menu)
                <option value="{{ $menu->id }}">{{ $menu->name }}</option>
            @endforeach

        </select>
      </div>

      <div class="form-group">
        <label >Mô tả</label>
        <textarea name="description" class="form-control"></textarea>
      </div>

      <div class="form-group">
        <label >Mô tả chi tiết</label>
        <textarea name="content" class="form-control"></textarea>
      </div>

      <div class="form-group">
        <label>Kích hoạt</label>
        <div class="custom-control custom-radio">
          <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
          <label for="active" class="custom-control-label">Có</label>
        </div>
        <div class="custom-control custom-radio">
          <input class="custom-control-input" value="0" type="radio" id="no_active" name="active" >
          <label for="no_active" class="custom-control-label">Không</label>
        </div>


      </div>

    </div>

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Tạo danh mục</button>
    </div>

    @csrf

  </form>
@endsection
