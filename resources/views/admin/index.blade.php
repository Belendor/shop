@extends('layouts.app')

 @section('content')
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Prideti naują produktą</div>
                <div class="card-body">
                    
                    <form method="POST" action="">

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

                        <select  class="form-control" name="prod_cat">
                            
                            <option value="pizza">Pizza</option>

                        </select>

                        <select  class="form-control" name="prod_tag">
                            
                            <option value="hot">Hot</option>
                            <option value="new">New</option>

                        </select>

                        <form action="" method="post" enctype="multipart/form-data">
                            <label>Nuotrauka:</label><br>
                            <input form-control id="file-input" type="file" name="picture">
                            @csrf
                            <button class="btn btn-primary"  type="submit">Add</button>
                        </form></div>
                      
                        @csrf
                        <button class="btn btn-success" type="submit">ADD</button>
                     </form>  

                </div>
            </div>
        </div>
    </div>
 </div>
 @endsection