@if (count($errors))
<div class="form-group">
  <ul class="alert alert-danger">
    @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      {{ session()->flash('message', $error) }}
    @endforeach
  </ul>
</div>
@endif