
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="images/favicon.png" rel="icon" />
<title>Hotel Booking Invoice - Koice</title>
<meta name="author" content="harnishdesign.net">

<!-- Web Fonts
======================= -->
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900' type='text/css'>

<!-- Stylesheet
======================= -->
<link rel="stylesheet" type="text/css" href="print/bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="print/font-awesome/css/all.min.css"/>
<link rel="stylesheet" type="text/css" href="print/stylesheet.css"/>
</head>
<body>
<!-- Container -->
<div class="container-fluid invoice-container"> 
  <!-- Header -->
  <header>
    <div class="row align-items-center">
      <div class="col-sm-7 text-center text-sm-start mb-3 mb-sm-0"> <img id="logo" src="images/logo.png" title="Koice" alt="Koice" /> </div>
      <div class="col-sm-5 text-center text-sm-end">
        <h4 class="mb-0">Invoice</h4>
        <p class="mb-0">Invoice Number - 16835</p>
      </div>
    </div>
    <hr>
  </header>
  
  <!-- Main Content -->
  <main>
    <div class="row">
      <div class="col-sm-6 mb-3"> <strong>Guest Name:</strong> <span>Smith Rhodes</span> </div>
      <div class="col-sm-6 mb-3 text-sm-end"> <strong>Booking Date:</strong> <span>07/11/2020</span> </div>
    </div>
    <hr class="mt-0">
    <div class="row">
      <div class="col-sm-5"> <strong>Hotel Details:</strong>
        <address>
        The Orchid Hotel<br />
        Plot No.3, Nr. HDFC Bank, Ashram Road<br />
        Ahmedabad, Gujarat, India.<br />
        </address>
      </div>
      <div class="col-sm-7">
        <div class="row">
          <div class="col-sm-4"> <strong>Check In:</strong>
            <p>08/12/2020</p>
          </div>
          <div class="col-sm-4"> <strong>Check Out:</strong>
            <p>08/14/2020</p>
          </div>
          <div class="col-sm-4"> <strong>Rooms:</strong>
            <p>1</p>
          </div>
          <div class="col-sm-4"> <strong>Booking ID:</strong>
            <p>HQM3912704</p>
          </div>
          <div class="col-sm-4"> <strong>Payment Mode:</strong>
            <p>Credit Card</p>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table mb-0">
            <thead class="card-header">
            <tr>
              <td class="col-6"><strong>Description</strong></td>
              <td class="col-4 text-end"><strong>Rate</strong></td>
              <td class="col-2 text-end"><strong>Amount</strong></td>
            </tr>
          </thead>
			<tbody>
              <tr>
                <td class="col-6">Room Charges</td>
                <td class="col-4 text-end">$250.00 X 2 Night X 1 Rooms</td>
                <td class="col-2 text-end">$500.00</td>
              </tr>
              <tr>
                <td>Other Charges</td>
                <td class="text-end">0</td>
                <td class="text-end">0</td>
              </tr>
              <tr>
                <td>Promotional Code</td>
                <td class="text-end">SUMMERFUN - <span class="text-1">20.00% One Time Discount</span></td>
                <td class="text-end">-$100.00</td>
              </tr>
            </tbody>
			<tfoot class="card-footer">
			  <tr>
                <td colspan="2" class="text-end"><strong>Sub Total:</strong></td>
                <td class="text-end">$400.00</td>
              </tr>
              <tr>
                <td colspan="2" class="text-end"><strong>Tax:</strong></td>
                <td class="text-end">$40.00</td>
              </tr>
			  <tr>
                <td colspan="2" class="text-end border-bottom-0"><strong>Total:</strong></td>
                <td class="text-end border-bottom-0">$440.00</td>
              </tr>
			</tfoot>
          </table>
        </div>
      </div>
    </div>
    <br>
    <p class="text-1 text-muted"><strong>Please Note:</strong> Amount payable is inclusive of central & state goods & services Tax act applicable slab rates. Please ask Hotel for invoice at the time of check-out.</p>
  </main>
  <!-- Footer -->
  <footer class="text-center">
    <hr>
    <p><strong>Koice Inc.</strong><br>
      4th Floor, Plot No.22, Above Public Park, 145 Murphy Canyon Rd,<br>
      Suite 100-18, San Diego CA 2028. </p>
    <hr>
    <p class="text-1"><strong>NOTE :</strong> This is computer generated receipt and does not require physical signature.</p>
    <div class="btn-group btn-group-sm d-print-none"> <a href="javascript:window.print()" class="btn btn-light border text-black-50 shadow-none"><i class="fa fa-print"></i> Print</a> <a href="" class="btn btn-light border text-black-50 shadow-none"><i class="fa fa-download"></i> Download</a> </div>
  </footer>
</div>
<!-- Back to My Account Link -->
<p class="text-center d-print-none"><a href="#">&laquo; Back to My Account</a></p>
</body>
</html>