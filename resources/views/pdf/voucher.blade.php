

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <!-- Meta Tags -->
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Site Title -->
  <title>Ticket Booking Voucher</title>
  <link rel="stylesheet" href="https://ivonne-seven.vercel.app/assets/css/style.css">
</head>

<body>
  <div class="cs-container">
    <div class="cs-invoice cs-style1">
      <div class="cs-invoice_in" id="download_section">
        <div class="cs-invoice_head cs-type1 cs-mb25">
          <div class="cs-invoice_left">
            <p class="cs-invoice_number cs-primary_color cs-mb0 cs-f16"><b class="cs-primary_color">Booking Conformation:</b> # {{ $booking->id }}</p>
          </div>
          <div class="cs-invoice_right cs-text_right">
            <b class="cs-primary_color">Must Read:</b>
          </div>
        </div>
        <div class="cs-invoice_head cs-mb10">
          <div class="cs-invoice_left">
            <b class="cs-primary_color">Food Arragments:</b>
            <p>Seating is on a first come, first served basis unless you have purchased ticket for a Reserved Seating performance. Please arrive early for best seat section.</p>
          </div>
          <div class="cs-invoice_right cs-text_right">
            <b class="cs-primary_color">DSTAYS</b>
            <p>
              237 Roanoke Road, North York, <br/>
              Ontario, Canada <br/>
              admin@dstays.com
            </p>
          </div>
        </div>
        <div class="cs-table cs-style1 cs-mb30">
          <div class="cs-round_border">
            <div class="cs-table_responsive">
              <table class="cs-border_less">
                <tbody>
                  <tr>
                    <td class="cs-width_4 cs-text_center"><p class="cs-accent_color cs-m0 cs-bold cs-f16 cs-special_item">Purcheser INFO:</p></td>
                    <td class="cs-width_4">
                      <span class="cs-primary_color cs-semi_bold">Name:</span> {{ $booking->customer->name }} <br>
                      <span class="cs-primary_color cs-semi_bold">Booking Type:</span> {{ $booking->name }} <br>
                      <span class="cs-primary_color cs-semi_bold">Number of People:</span> {{ $booking->number_of_people }} <br>
                    </td>
                    <td class="cs-width_4">
                      <b class="cs-primary_color">Address:</b> <br>
                      4440 Balmy Beach Road, Owen Sound, Ontario, Canada
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="cs-table cs-style1 cs-accent_10_bg cs-mb30">
          <div class="cs-table_responsive">
            <table class="cs-border_less">
              <tbody>
                <tr>
                  <td class="cs-width_4 cs-text_center">
                    <p class="cs-accent_color cs-m0 cs-bold cs-f16 cs-special_item">Transection</p>
                    <p class="cs-m0">By Credit Card</p>
                  </td>
                  <td class="cs-width_8">
                    <div class="cs-table cs-style1">
                      <table>
                        <tbody>
                          <tr>
                            <td class="cs-primary_color cs-semi_bold">Transaction NO</td>
                            <td class="cs-primary_color cs-semi_bold">Booking ID</td>
                            <td class="cs-primary_color cs-semi_bold">Date</td>
                          </tr>
                          <tr>
                            <td>SI2534687</td>
                            <td>{{ $booking->id }}</td>
                            <td>25 Feb 2022</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="cs-table cs-style2">
          <div class="cs-round_border">
            <div class="cs-table_responsive">
              <table>
                <thead>
                  <tr class="cs-focus_bg">
                    <th class="cs-width_8 cs-semi_bold cs-primary_color">Film / Performance</th>
                    <th class="cs-width_2 cs-semi_bold cs-primary_color">QTN</th>
                    <th class="cs-width_2 cs-semi_bold cs-primary_color">Price</th>
                    <th class="cs-width_2 cs-semi_bold cs-primary_color">Tax</th>
                    <th class="cs-width_2 cs-semi_bold cs-primary_color cs-text_right">Total</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="cs-width_4">
                      The Matrix Resurrections -  General Seat <br>
                      Sat Feb 2022, 3:00 PM
                    </td>
                    <td class="cs-width_2">1</td>
                    <td class="cs-width_2">$60</td>
                    <td class="cs-width_2">5%</td>
                    <td class="cs-width_2 cs-text_right cs-primary_color cs-semi_bold">$63</td>
                  </tr>
                  <tr>
                    <td class="cs-width_4">
                      The Matrix Resurrections -  Child Seat <br>
                      Sat Feb 2022, 3:00 PM
                    </td>
                    <td class="cs-width_2">2</td>
                    <td class="cs-width_2">$25</td>
                    <td class="cs-width_2">0%</td>
                    <td class="cs-width_2 cs-text_right cs-primary_color cs-semi_bold">$50</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="cs-invoice_footer">
            <div class="cs-left_footer cs-mobile_hide"></div>
            <div class="cs-right_footer">
              <table>
                <tbody>
                  <tr class="cs-border_none">
                    <td class="cs-width_3 cs-border_top_0 cs-bold cs-f16 cs-primary_color">Total Amount</td>
                    <td class="cs-width_3 cs-border_top_0 cs-bold cs-f16 cs-primary_color cs-text_right">$113</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="cs-note">
          <div class="cs-note_left">
            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M416 221.25V416a48 48 0 01-48 48H144a48 48 0 01-48-48V96a48 48 0 0148-48h98.75a32 32 0 0122.62 9.37l141.26 141.26a32 32 0 019.37 22.62z" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><path d="M256 56v120a32 32 0 0032 32h120M176 288h160M176 368h160" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
          </div>
          <div class="cs-note_right">
            <p class="cs-mb0"><b class="cs-primary_color cs-bold">Note:</b></p>
            <p class="cs-m0">Here we can write a additional notes for the client to get a better understanding of this invoice.</p>
          </div>
        </div><!-- .cs-note -->
      </div>
    
    </div>
  </div>
 
</body>
</html>