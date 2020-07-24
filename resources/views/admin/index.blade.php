@extends('layouts.app')

 @section('content')
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Prideti naują produktą</div>
                <div class="card-body">
                    
                    <form method="POST" action="{{route('product.add')}}"  enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Pavadinimas:</label>
                            <input class="form-control" type="text" name="prod_title">
                        </div>

                        <div class="form-group">
                            <label>Price:</label>
                            <input class="form-control" type="number" name="prod_price" step="0.01" min="0">
                        </div>

                        <div class="form-group">
                            <label>Sale:</label>
                            <input class="form-control" type="number" name="prod_sale">
                        </div>

                        <div class="form-group">
                            <label>Aprašymas:</label>
                            <textarea class="form-control" name="prod_describtion"></textarea>
                        </div>

                        <p>Tags:</p>
                        <label for="hot">Hot</label>
                        <input type="checkbox" name="tags[]" value="hot">
                        <label for="new">New</label>
                        <input type="checkbox" name="tags[]" value="new">
                        <label for="2in1">2in1</label>
                        <input type="checkbox" name="tags[]" value="2in1">

                        <p>Category:</p>
                        <label for="pizza">Pizza</label>
                        <input type="checkbox" name="cats[]" value="pizza">
                        <label for="snack">Snack</label>
                        <input type="checkbox" name="cats[]" value="snack"><br>

                        <input form-control id="file-input" type="file" name="picture"><br>
                      
                        @csrf
                        <button class="btn btn-success" type="submit">ADD</button>
                     </form>  

                </div>
            </div>
        </div>
    </div>
 </div>
 @endsection