@extends('layouts.app')

@section('main-content')
<form action="{route(comics.store)}" method='POST'>
    @csrf    

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">title</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="title">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">description</label>
      <input type="text" class="form-control" id="inputPassword4" placeholder="description of your comic">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">thumb</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="image of your comic">
  </div>
  <div class="form-group">
    <label for="inputAddress2">price</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="price of your comic">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">series</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
    
    <div class="form-group col-md-2">
      <label for="inputZip">sale_date</label>
      <input type="text" class="form-control" id="inputZip">
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">type</label>
      <input type="text" class="form-control" id="inputZip">
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">artists</label>
      <input type="text" class="form-control" id="inputZip">
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">writers</label>
      <input type="text" class="form-control" id="inputZip">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Crea Nuovo Fumetto </button>
</form>
@endsection