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
              <h5>Jauns ziņojums no web lapas!</h5>
              <div class="payment border-top mt-3 mb-3 border-bottom table-responsive">
                <table class="table table-borderless">
                  <tbody>
                    <tr>
                        <td>
                            <div class="py-2"><span class="d-block text-muted">Vārds</span><span>{{$name}}</span></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="py-2"><span class="d-block text-muted">Tālruņa numurs</span><span>{{$phone}}</span></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="py-2"><span class="d-block text-muted">E-pasta adrese</span><span>{{$email}}</span></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="py-2"><span class="d-block text-muted">Ziņojums</span><span>{{$msg}}</span></div>
                        </td>
                    </tr>
                  </tbody>
                </table>
              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js'></script>

  </body>
</html>
