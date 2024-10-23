<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      .srcn-container {
        width: 90%;
        max-width: 1366px;
        margin: 0 auto;
      }

      .invoice-wrapper {
        width: 50%;
        margin: auto;
        text-align: center;
      }

      .invoice-company-address {
        margin-bottom: 21px;
      }

      .invoice-details {
        margin: 20px 0;
      }

      span.invoice-info-key {
        margin-right: 13px;
      }

      .invoice-info-value {
        font-weight: 900;
      }
      .invoicetable {
        width: 100%;
      }
      .invoice-table,
      th,
      td {
        border-collapse: collapse;
        width: 100%;
      }

      th,
      td {
        width: calc((600px - 3rem) / 4);
        text-align: center;
        padding: 0.75rem;
      }

      tr:nth-of-type(1) {
        background-color: rgba(0, 0, 0, 0.2);
      }
      tr:nth-of-type(2),
      tr:nth-of-type(3) {
        border-bottom: 0.5px solid rgba(0, 0, 0, 0.25);
      }

      .invoice-total {
        font-weight: 900;
      }

      .invoice-print {
        font-size: 1.25rem;
        margin: 0 auto;
        cursor: pointer;
        border: 1.25px solid black;
        border-radius: 50%;
        padding: 0.6rem;
      }

      .invoice-print:active {
        background-color: black;
        color: white;
      }
      .oder-text h2 {
        font-size: 30px;
        line-height: 36px;
        margin-bottom: 12px;
      }

      .rates-text span {
        font-size: 20px;
        line-height: 24px;
      }
    </style>
  </head>
  <body>
    <section class="indicate-pd">
      <div class="srcn-container">
        <div class="invoice-wrapper">
          <div class="invoice-company">
            <h2 class="invoice-company-name">Hardtail Direct</h2>
            <p class="invoice-company-address">{{ $order->email }}</p>
            <h1>Delivery Order</h1>
          </div>
        </div>
        <div class="invoice-wrapper-ng">
          <div class="invoice-details">
            <div class="invoice-info">
              <span class="invoice-info-key">Order number:</span>
              <span class="invoice-info-value">{{ $order->id }}</span>
            </div>
            <div class="invoice-info">
              <span class="invoice-info-key">Requested by:</span>
              <span class="invoice-info-value">Eddie Neumann</span>
            </div>
            <div class="invoice-info">
              <span class="invoice-info-key">Address:</span>
              <span class="invoice-info-value"
                >{{ $shipping->shipping_address }}</span
              >
            </div>
            <div class="invoice-info">
              <span class="invoice-info-key">Email</span>
              <span class="invoice-info-value">{{ $order->email }}</span>
            </div>
            <div class="invoice-info">
              <span class="invoice-info-key">Date:</span>
              <span class="invoice-info-value">{{ $order->created_at }}</span>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="srcn-container">
        <div class="table">
          <table class="invoice-table">
            <tr>
              <th>PRODUCT</th>
              <th>PRICE</th>
              <th>QUANTITY</th>
              <th>Total</th>
            </tr>

            @foreach ($orderItem as $item)
            <tr>
              <td>{{ $item->product_name }}</td>
              <td>{{ $item->product_price }}</td>
              <td>{{ $item->quantity }}</td>
              <td>{{ $item->order->grand_total }}</td>
            </tr>
            <tr>
              <td>-</td>
              <td>-</td>
              <td>-</td>
              <td class="invoice-total">{{ $item->order->grand_total }}</td>
            </tr>
            @endforeach
        
          </table>
        </div>
      </div>
    </section>
    <section class="oder-section-text">
      <div class="srcn-container">
        <div class="oder-text">
          <h2>Terms & Condition</h2>
          <div class="rates-text">
            <span><b>1</b> </span>
            <span>
              The rates in this form are not subject to any changes and will be
              the applicable rates upon payment
            </span>
            <br />
            <span><b>2</b> </span>
            <span>
              This delivery order will not take effect unless the recipient
              presents an original of the purchase invoice
            </span>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>