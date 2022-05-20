<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>A simple, clean, and responsive HTML invoice template</title>
    
    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
        margin-top: 20px;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <h3 style="color: black;">Prevalent</h3>
                            </td>
                            
                            <td style="padding:10px 10px;">
                                Invoice : {{ $order->invoice_id }}<br>
                                Created: {{ $order->created_at }}<br>
                              
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                           Shipping Address :     {{ $order->shipping_address }}
                            </td>
                            
                            <td>
                             customer Name:   {{ $order->name }}<br>
                             customer Number:    {{ $order->phone_number }}<br>
                             customer Email:   {{ $order->email }}<br>

                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Payment Method
                </td>
                
                <td>
                    Check #
                </td>
            </tr>
            
            <tr class="details">
                <td>
                    {{ $order->payment->short_name }}
                </td>
                
                <td>
                    {{ $order->transaction_number }}
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Item
                </td>
                
                <td>
                    Price
                </td>
            </tr>
            @php
                             $total_price = 0;
                             @endphp
                              @foreach(App\Cart::Where('ip_address',$order->ip_address)->Where('product_quantuty','!=','0')->where('order_id',$order->id)->get() as $partents)
                              <?php if($partents->product->admin_id == Auth::user()->id) {?>
            <tr class="item">
              
                <td>
                    {{ $partents->product->title }} * {{$partents->product_quantuty}}
                </td>
                
                <td>
                    BDT {{ $partents->product->offer_price * $partents->product_quantuty }}
                </td>
                 @php

              $total_price = $total_price + ($partents->product->offer_price * $partents->product_quantuty);

              @endphp
            </tr>
          <?php } ?>
             @endforeach
            <tr class="item">
              
              
                <td>
                   Shipping charge
                </td>
                
                <td>
                  BDT 100
                   
                </td>
            </tr>
            
           
            
            <tr class="total">
                <td></td>
                
                <td>
                   Total: {{$total_price +100}}
                </td>
            </tr>

                 <tr class="heading" style="padding-top: 50px;">
                <td>
                    signature :
                </td>
                
                
            </tr>

        </table>
    </div>
</body>
</html>
