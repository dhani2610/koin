

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Success</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Khand:wght@500&display=swap');
    *{
      margin:0;
      padding: 0;
      box-sizing: border-box;
    }
    body  { 
      height: 100vh;
      display: flex;
      font-size: 14px;
      text-align: center;
      justify-content: center;
      align-items: center;
      font-family: 'Khand', sans-serif;   
    }        
    
    .wrapperAlert {
      width: 500px;
      height: 616px;
      overflow: hidden;
      border-radius: 12px;
      border: thin solid #ddd;           
    }
    
    .topHalf {
      width: 100%;
      color: white;
      overflow: hidden;
      min-height: 250px;
      position: relative;
      padding: 40px 0;
      background: rgb(0,0,0);
      background: -webkit-linear-gradient(45deg, #019871, #a0ebcf);
    }
    
    .topHalf p {
      margin-bottom: 30px;
    }
    svg {
      fill: white;
    }
    .topHalf h1 {
      font-size: 2.25rem;
      display: block;
      font-weight: 500;
      letter-spacing: 0.15rem;
      text-shadow: 0 2px rgba(128, 128, 128, 0.6);
    }
            
    /* Original Author of Bubbles Animation -- https://codepen.io/Lewitje/pen/BNNJjo */
    .bg-bubbles{
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;            
      z-index: 1;
    }
    
    li{
      position: absolute;
      list-style: none;
      display: block;
      width: 40px;
      height: 40px;
      background-color: rgba(255, 255, 255, 0.15);/* fade(green, 75%);*/
      bottom: -160px;
    
      -webkit-animation: square 20s infinite;
      animation:         square 20s infinite;
    
      -webkit-transition-timing-function: linear;
      transition-timing-function: linear;
    }
    li:nth-child(1){
      left: 10%;
    }		
    li:nth-child(2){
      left: 20%;
    
      width: 80px;
      height: 80px;
    
      animation-delay: 2s;
      animation-duration: 17s;
    }		
    li:nth-child(3){
      left: 25%;
      animation-delay: 4s;
    }		
    li:nth-child(4){
      left: 40%;
      width: 60px;
      height: 60px;
    
      animation-duration: 22s;
    
      background-color: rgba(white, 0.3); /* fade(white, 25%); */
    }		
    li:nth-child(5){
      left: 70%;
    }		
    li:nth-child(6){
      left: 80%;
      width: 120px;
      height: 120px;
    
      animation-delay: 3s;
      background-color: rgba(white, 0.2); /* fade(white, 20%); */
    }		
    li:nth-child(7){
      left: 32%;
      width: 160px;
      height: 160px;
    
      animation-delay: 7s;
    }		
    li:nth-child(8){
      left: 55%;
      width: 20px;
      height: 20px;
    
      animation-delay: 15s;
      animation-duration: 40s;
    }		
    li:nth-child(9){
      left: 25%;
      width: 10px;
      height: 10px;
    
      animation-delay: 2s;
      animation-duration: 40s;
      background-color: rgba(white, 0.3); /*fade(white, 30%);*/
    }		
    li:nth-child(10){
      left: 90%;
      width: 160px;
      height: 160px;
    
      animation-delay: 11s;
    }
    
    @-webkit-keyframes square {
      0%   { transform: translateY(0); }
      100% { transform: translateY(-500px) rotate(600deg); }
    }
    @keyframes square {
      0%   { transform: translateY(0); }
      100% { transform: translateY(-500px) rotate(600deg); }
    }
    
    .bottomHalf {
      align-items: center;
      padding: 35px;
    }
    .bottomHalf p {
      font-weight: 500;
      font-size: 1.05rem;
      margin-bottom: 20px;
    }
    
    a {
      border: none;
      color: white!important;
      cursor: pointer;
      border-radius: 12px;            
      padding: 10px 18px;            
      background-color: #019871;
      text-shadow: 0 1px rgba(128, 128, 128, 0.75);
      text-decoration: none!important;
    }
    a:hover {
      background-color: #85ddbf;
      text-decoration: none!important;
    }

    .kiri {
        text-align: left;
    }

    
.kanan {
    text-align: right;
    width: 306px;
}
    </style>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body id="printableArea">
 

@php
    
// Ini akan menjadi Token Verifikasi Callback Anda yang dapat Anda peroleh dari dasbor.
// Pastikan untuk menjaga kerahasiaan token ini dan tidak mengungkapkannya kepada siapa pun.
// Token ini akan digunakan untuk melakukan verfikasi pesan callback bahwa pengirim callback tersebut adalah Xendit
$xenditXCallbackToken = '3f992c56013184cb60c97bb686874313964a5404c9a86902033cdf540f6d88d4';

// Bagian ini untuk mendapatkan Token callback dari permintaan header, 
// yang kemudian akan dibandingkan dengan token verifikasi callback Xendit
$reqHeaders = getallheaders();
$xIncomingCallbackTokenHeader = isset($reqHeaders['x-callback-token']) ? $reqHeaders['x-callback-token'] : "";

// Untuk memastikan permintaan datang dari Xendit
// Anda harus membandingkan token yang masuk sama dengan token verifikasi callback Anda
// Ini untuk memastikan permintaan datang dari Xendit dan bukan dari pihak ketiga lainnya.
if($xIncomingCallbackTokenHeader === $xenditXCallbackToken){
  // Permintaan masuk diverifikasi berasal dari Xendit
    
  // Baris ini untuk mendapatkan semua input pesan dalam format JSON teks mentah
  $rawRequestInput = file_get_contents("php://input");
  // Baris ini melakukan format input mentah menjadi array asosiatif
  $arrRequestInput = json_decode($rawRequestInput, true);
  print_r($arrRequestInput);
  
  $_id = $arrRequestInput['id'];
  $_externalId = $arrRequestInput['external_id'];
  $_userId = $arrRequestInput['user_id'];
  $_status = $arrRequestInput['status'];
  $_paidAmount = $arrRequestInput['paid_amount'];
  $_paidAt = $arrRequestInput['paid_at'];
  $_paymentChannel = $arrRequestInput['payment_channel'];
  $_paymentDestination = $arrRequestInput['payment_destination'];

  // Kamu bisa menggunakan array objek diatas sebagai informasi callback yang dapat digunaka untuk melakukan pengecekan atau aktivas tertentu di aplikasi atau sistem kamu.

}else{
  // Permintaan bukan dari Xendit, tolak dan buang pesan dengan HTTP status 403
  http_response_code(403);
}
@endphp

    <div class="wrapperAlert" >

        <div class="contentAlert">
      
          <div class="topHalf" >
      
            {{-- <p><svg viewBox="0 0 512 512" width="100" title="check-circle">
              <path d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z" />
              </svg></p> --}}
              {{-- <img src="{{ asset('frontend/NicePng_check-png_3325750.png') }}" alt=""> --}}
              <img src="{{ asset('frontend/NicePng_check-png_3325750.png') }}" style="max-width: 107px;" alt="">
            <h1>Recharge Successful</h1>
      
           <ul class="bg-bubbles">
             <li></li>
             <li></li>
             <li></li>
             <li></li>
             <li></li>
             <li></li>
             <li></li>
             <li></li>
             <li></li>
             <li></li>
           </ul>
          </div>
      
          <div class="bottomHalf">
      
            {{-- <p>Well Done!, you actually managed to accomplish something today...</p> --}}

            <table>
                <tr>
                    <td class="kiri">Order ID : </td>
                    <td class="kanan">{{ $_externalId }}</td>
                </tr>
                <tr>
                    <td class="kiri">Status : </td>
                    <td class="kanan">{{ $_status }}</td>
                </tr>
                <tr>
                    <td class="kiri">Date : </td>
                    <td class="kanan">{{ $_paidAt }}</td>
                </tr>
                <tr>
                    <td class="kiri">Payment Channel : </td>
                    <td class="kanan">{{ $_paymentChannel }}</td>
                </tr>
                <tr>
                    <td class="kiri">Total Price : </td>
                    <td class="kanan">{{ rupiah($_paidAmount) }}</td>
                </tr>
            </table>

            <br>
            <br>
            <br>
            <a href="{{ route('my-detail-order',$_externalId) }}" id="alertMO">Order Detail</a>
            <a href="#" onclick="printDiv('printableArea')" id="alertMO">Print</a>

            <br>
      
          </div>
      
        </div>        
      
      </div>
    
</body>

<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
</html>