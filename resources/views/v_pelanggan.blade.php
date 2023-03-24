@extends('layout.v_template')

@section('title','Pelanggan')

@section('content')

<div class="row g-3 align-items-center mt-2">
    <div class="col-auto">
        <form action="/pelanggan" method="GET">
      <input type="search" id="inputPassword6" name="search" class="form-control" aria-labelledby="passwordHelpInline">
        </form>
    </div>
    
  </div>

<a href="/exportexcel" class="btn btn-info">Export Excel</a>

<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-primary">
   Import Data
  </button>

  


<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pelangan</th>           
        </tr>
    </thead>
    <tbody>
        <?php $no=1; ?>
    @foreach ($data as $index=>$d)
        <tr>
            <td>{{ $index + $data->firstItem() }}</td>
            <td>{{ $d->nama_pelanggan }}</td>
       
            <td>
                
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $data->links() }}


  
<div class="modal modal-danger fade" id="modal-primary">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Import Data</h4>
        </div>
        <form action="/importexcel" method="POST" enctype="multipart/form-data">
        @csrf
     

        <div class="modal-body">
<div class="form-group">
    <input type="file" name="file" required>
</div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
</form>
@endsection