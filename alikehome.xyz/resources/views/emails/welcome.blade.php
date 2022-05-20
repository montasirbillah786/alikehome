@component('mail::message')

<h4>Invoice Number : {{ $details['title'] }}</h4>
<h4>Customer Name : {{ $details['cname'] }}</h4>
<h4>Customer Email : {{ $details['email'] }}</h4>
<h4>Customer Number : {{ $details['cnumber'] }}</h4>
<h4>Shipping Address : {{ $details['shipaddress'] }}</h4>
<table>
  <tr>
    <th>Product Name</th>
    <th>Price</th>
    <th>Product Quentity</th>
    <th>Total Price</th>
  </tr>
  @foreach(App\Cart::where('order_id',$details['name'])->get() as $partents)
  <tr>
    <td>{{ $partents->product->title }}</td>
    <td>BDT {{$partents->product->offer_price}}</td>
     <td>{{ $partents->product_quantuty }}</td>
    <td>BDT {{$partents->product->offer_price  * $partents->product_quantuty }}</td>
  </tr>
  @endforeach
  
</table>




<h4>Total Price: {{ $details['price'] }}</h4>
  
{{ $details['url'] }}
   
@component('mail::button', ['url' => $details['website']])
Website
@endcomponent
   
Thanks,<br>
WWW.grabsoft.tech
@endcomponent
