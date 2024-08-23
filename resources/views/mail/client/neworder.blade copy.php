<!doctype html>
<html>
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Snippetss - BBBootstrap</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <style>
      ::-webkit-scrollbar {
        width: 8px;
      }

      /* Track */
      ::-webkit-scrollbar-track {
        background: #f1f1f1;
      }

      /* Handle */
      ::-webkit-scrollbar-thumb {
        background: #888;
      }

      /* Handle on hover */
      ::-webkit-scrollbar-thumb:hover {
        background: #555;
      }

      @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');

      body {
        background-color: #ffe8d2;
        font-family: 'Montserrat', sans-serif
      }

      .card {
        border: none
      }

      .logo {
        background-color: #eeeeeea8
      }

      .totals tr td {
        font-size: 13px
      }

      .footer {
        background-color: #eeeeeea8
      }

      .footer span {
        font-size: 12px
      }

      .product-qty span {
        font-size: 12px;
        color: #818181
      }
    </style>
  </head>
  <body className='snippet-body'>
    <div class="container mt-5 mb-5">
      <div class="row d-flex justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="text-left logo p-2 px-5"><img src="{{config('app.url')}}/assets/img/alba-red.png" height="50"></div>
            <div class="invoice p-5">
              <h5>Pasūtījums ir reģistrēts!</h5><span class="font-weight-bold d-block mt-4">Paldies, ka izvēlējāties iepirkties mūsu internetveikalā!</span><span>Ar prieku paziņojam, ka Jūsu pasūtījums ir saņemts, un mēs esam sākuši tā apstrādi.</span>
              <div class="payment border-top mt-3 mb-3 border-bottom table-responsive">
                <table class="table table-borderless">
                  <tbody>
                    <tr>
                      <td>
                        <div class="py-2"><span class="d-block text-muted">Pasūtījuma Nr.</span><span>#{{date_format($order->created_at,"dmY")}}-{{$order->id}}</span></div>
                      </td>
                      <td>
                        <div class="py-2">
                            <span class="d-block text-muted">Norēķinu adrese</span>
                            <span class="d-block">{{$order->name}} {{$order->surname}}</span>
                            <span class="d-block">{{$order->street}}, {{$order->city}}, {{$order->country}}, {{$order->zip}}</span>
                            <span class="d-block">T. {{$order->phone}}</span>
                            <span class="d-block">E-pasts: {{$order->email}}</span>
                        </div>
                    </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="py-2">
                                <span class="d-block text-muted">{{config('shop.frontend.delivery-options.'.$order->deliveryAlias.'.title.'.App()->currentLocale())}}</span>
                                @if (isset($order->parcelAddress) && strlen($order->parcelAddress)>0)
                                    <span>{{$order->parcelAddress}}</span>
                                @endif
                            </div>
                        </td>
                        <td>
                            <div class="py-2">
                                <span class="d-block text-muted">Piegādes adrese</span>
                                @if (!empty($order->delivery))
                                    <span class="d-block">{{$order->delivery['name']??''}} {{$order->delivery['surname']??''}}</span>
                                    <span class="d-block">{{$order->delivery['street']??''}}, {{$order->delivery['city']??''}}, {{$order->delivery['country']??''}}, {{$order->delivery['zip']??''}}</span>
                                    <span class="d-block">T.{{$order->delivery['phone']??''}}</span>
                                @else
                                    <span>-</span>
                                @endif
                            </div>
                        </td>
                    </tr>

                    @if (!empty(config('shop.frontend.delivery-options.'.$order->deliveryAlias,[])))
                        <tr>
                            <td colspan=2>
                                <div class="py-2">
                                    <span class="d-block text-muted">Komentāri</span>
                                    @if (isset($order->comments) && strlen($order->comments)>0)
                                        <div><span>{{$order->comments}}</span></div>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endif


                  </tbody>
                </table>
              </div>
              <div class="product border-bottom table-responsive">
                <table class="table table-borderless">
                  <tbody>
                    @foreach ($order->cart as $product)

                    <tr>
                      <td width="20%"><img src="{{config('app.url')}}/storage/products/{{$product['image']}}" onerror="this.src='{{config('app.url')}}/assets/img/default-product.png';" width="90"></td>
                      <td width="60%"><span class="font-weight-bold">{{$product['title']}}</span>
                        <div class="product-qty">
                            <span class="d-block">Skaits: {{$product['addCount']}}</span>
                            <span class="d-block">Preces kods : {{$product['inner_code']}}</span>
                            @if (count($product['variation'])>0)
                                @foreach ($product['variation'] as $variation)
                                    <span class="d-block"><b>{{$variation['name']}}</b> : {{$variation['value']}}</span>
                                @endforeach
                            @endif

                        </div>
                      </td>
                      <td width="20%">
                        <div class="text-right"><span class="font-weight-bold">{{number_format($product['price'], 2)}} €</span></div>
                      </td>
                    </tr>

                    @endforeach

                  </tbody>
                </table>
              </div>
              <div class="row d-flex justify-content-end">
                <div class="col-md-5">
                  <table class="table table-borderless">
                    <tbody class="totals">
                      <tr>
                        <td>
                          <div class="text-left"><span class="text-muted">{{__('frontend.cart.total-without-tax')}}</span></div>
                        </td>
                        <td>
                          <div class="text-right"><span>{{number_format($totalWitoutTax, 2)}} €</span></div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="text-left"><span class="text-muted">{{__('frontend.cart.total-tax')}}</span></div>
                        </td>
                        <td>
                          <div class="text-right"><span>{{number_format($tax, 2)}} €</span></div>
                        </td>
                      </tr>

                      @if (isset($order->deliveryPrice) && is_numeric($order->deliveryPrice) && $order->deliveryPrice > 0)
                        <tr>
                            <td>
                            <div class="text-left"><span class="text-muted">{{__('orders.order.delivery')}}</span></div>
                            </td>
                            <td>
                            <div class="text-right"><span>{{number_format($order->deliveryPrice, 2)}} €</span></div>
                            </td>
                        </tr>
                      @endif

                      <tr>
                        <td>
                          <div class="text-left"><span class="text-muted">{{__('frontend.cart.total-with-tax')}}</span></div>
                        </td>
                        <td>
                          <div class="text-right"><span class="text-success">{{number_format($total+($order->deliveryPrice??0), 2)}} €</span></div>
                        </td>
                      </tr>

                    </tbody>
                  </table>
                </div>
              </div>
              <p class="font-weight-bold mb-0">Pateicamies, ka izvēlējāties iepirkties pie mums!</p><span></span>
              <p>Mēs novērtējam Jūsu uzticību un ceram, ka mūsu preces un pakalpojumi pilnībā apmierinās Jūsu vēlmes. Gaidīsim Jūs atkal mūsu internetveikalā!</p>
            </div>
            <div class="d-flex justify-content-between footer p-3"><span>Ja Jums rodas kādi jautājumi droši sazinieties ar mūsu <a href="{{config('app.url')}}/kontakti"> klientu apkalpošanas komandu</a></span><span><a href="mailto:info@birojamunskolai.lv">info@birojamunskolai.lv</a></span></div>
          </div>
        </div>
      </div>
    </div>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js'></script>

  </body>
</html>
