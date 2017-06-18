<h2>Product Form</h2>

{!! Form::open(array( 'route' => 'save', 'class' => 'form' )) !!}

<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>

<div class="form-group">
    {!! Form::label('Product name') !!}
    {!! Form::text('prodname', null, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'Product name')) !!}
</div>

<div class="form-group">
    {!! Form::label('Quantity in stock') !!}
    {!! Form::text('quantity', null, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'Quantity in stock')) !!}
</div>

<div class="form-group">
    {!! Form::label('Price per item') !!}
    {!! Form::text('price', null, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'Price per item')) !!}
</div>

<div class="form-group">
    {!! Form::submit('Save!', 
      array('class'=>'btn btn-primary')) !!}
</div>

{!! Form::close() !!}

<h2>List of Products</h2>

<div>
@foreach($products as $prod)
<div>Name: {{ $prod->name }} | Quantity: {{ $prod->quantity }} | Price: {{ $prod->price }} | Total number: {{ $prod->quantity*$prod->price }}</div>
@endforeach
</div>