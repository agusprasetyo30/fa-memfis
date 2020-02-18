<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @page {
            margin: 0cm 0cm;
        }

        html,body{
            padding: 0;
            margin: 0;
            font-size: 12px;
        }

        body{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin-top: 3.1cm;
            margin-bottom: 2cm;
        }


        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 3cm;
        }

        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 1.8cm;
        }
        ul li{
            display: inline-block;
        }

        table{
            border-collapse: collapse;
        }

        #head{
            top: 10px;
            left: 210px;
            position: absolute;
            text-align: center;
        }

        .container{
            width: 100%;
            margin: 0 36px;
        }

        .barcode{
            margin-left:70px;
            margin-top:12px;
        }

        #content{
            width:100%;
            margin-bottom:20px;
        }

        #content2 .body{
            width: 100%;
            border-left:  2px solid  #e6eef2;
            border-right:  2px solid  #e6eef2;
            border-bottom:  2px solid  #e6eef2;
        }

        .page_break {
            page-break-before: always;
        }
    </style>
</head>
<body>
    <header>
        <img src="./vendor/courier/img/form/printoutfa/HeaderFA-A4-Potrait.png" alt=""width="100%">
        <div id="head">
            <table width="95%">
                <tr>
                    <td width="50%" valign="middle" style="font-size:12px;line-height:15px;">
                        Juanda International Airport, Surabaya Indonesia
                        <br>
                        Phone : 031-8686482 &nbsp;&nbsp;&nbsp; Fax : 031-8686500
                        <br>
                        Email : marketing@ptmmf.co.id
                        <br>
                        Website : www.ptmmf.co.id
                    </td>
                    <td width="50%" valign="top" align="center" style="padding-top:-16px">
                        {{-- jika if didalam h1 akan broken --}}
                        <h1 style="font-size:24px;">
                            {{$header_title}} Payment Journal
                        <br>
                        <span style="font-size:18px;">(Account Payable)</span></h1>
                    </td>
                </tr>
            </table>
        </div>
    </header>

    <footer>
        <div class="container">
            <table width="100%">
                <tr>
                    <td>  <span style="margin-left:6px;">Created By : Name ; Timestamp  &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;Approved By : Name ; Timestamp &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; Printed By :  Name ; Timestamp </span> </td>
                </tr>
            </table>
        </div>
        <img src="./vendor/courier/img/form/trial-balance/Footer.png" width="100%" alt="" >
    </footer>

    <div id="content">
        <div class="container">
            <table width="100%" cellpadding="4">
                <tr>
                    <td valign="top" width="18%">Transaction No.</td>
                    <td valign="top" width="1%">:</td>
                    <td valign="top" width="31%">{{$data->transactionnumber}}</td>
                    <td valign="top" width="18%">
                      Payment To
                    </td>
                    <td valign="top" width="1%">:</td>
                    <td valign="top" width="31%">{{$to->name}}</td>
                </tr>
                <tr>
                    <td valign="top" width="18%">Date</td>
                    <td valign="top" width="1%">:</td>
                    <td valign="top" width="31%">{{$data->transactionnumber}}</td>
                    <td valign="top" width="18%">Currency</td>
                    <td valign="top" width="1%">:</td>
                    <td valign="top" width="31%">{{strtoupper($data->currencies->code)}}</td>
                </tr>
                <tr>
                    <td valign="top" width="18%">Ref No.</td>
                    <td valign="top" width="1%">:</td>
                    <td valign="top" width="31%">{{$data->refno}}</td>
                    <td valign="top" width="18%">Exchange Rate</td>
                    <td valign="top" width="1%">:</td>
                    <td valign="top" width="31%">{{number_format($data->exchangerate, 0, 0, '.')}}</td>
                </tr>
            </table>
        </div>
    </div>

    <div id="content2">
        <div class="container">
            <div class="body">
                <table width="100%" cellpadding="4" page-break-inside: auto;>
                    <thead>
                        <tr style="background:#e6eef2;">
                            <td width="15%" align="center">Account Code</td>
                            <td width="20%" align="center">Account Name</td>
                            <td width="31%" align="center">Description</td>
                            <td width="17%" align="center">Debit</td>
                            <td width="17%" align="center">Credit</td>
                        </tr>
                    </thead>
                    <tbody>
                        @for($a = 0 ; $a<count($data_child); $a++)
													@php
														$arr = $data_child[$a]
													@endphp
                          <tr>
                              <td width="15%" align="center">{{$arr->coa_code}}</td>
                              <td width="20%" align="center">{{$arr->coa_name}}</td>
                              <td width="31%" align="center">{{$arr->_desc}}</td>
                              <td width="17%" align="center">
																@php
																	if ($arr->debit) {
																		echo $data->currencies->symbol.' '.
																		number_format($arr->debit, 0, 0, '.');
																	}
																@endphp
                              </td>
                              <td width="17%" align="center">
																@php
																	if ($arr->credit) {
																		echo $data->currencies->symbol.' '.
																		number_format($arr->credit, 0, 0, '.');
																	}
																@endphp
                              </td>
                          </tr>
                        @endfor
                    </tbody>
                    <tr style="background:#d3e9f5;">
                        <td colspan="3"><i>Terbilang total amount</i></td>
                        <td colspan="2" style="background:#e6eef2">
													<b>Total : <span>{{$data->currencies->symbol}} {{number_format($total, 0, 0, '.')}}<span></b>
												</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div id="content3">
        <div class="container">
            <table width="100%" border="1">
                <tr>
                    <td align="center" rowspan="2">
                        @if ('payment' == 'payment')
                            Submitted By
                        @else
                            Prepared By
                        @endif
                    </td>
                    <td align="center"  rowspan="2">Approve By <br><span style="font-size: 10px;"><b><i>President Director</i></b></span></td>
                    <td align="center" colspan="3">FINANCE & ACCOUNTING</td>
                    <td align="center"  rowspan="2">
                        @if ('payment' == 'payment')
                            Received By
                        @else
                            Paid By
                        @endif
                    </td>
                </tr>
                <tr>
                    <td align="center">Received By <br><span style="font-size: 10px;"><b><i>Accounting</i></b> </span></td>
                    <td align="center">Acknowledge By <br><span style="font-size: 10px;"><b><i>Finance Manager</i></b> </span></td>
                    <td align="center">Processed By<br><span style="font-size: 10px;"><b><i>Cashier</i></b></span> </td>
                </tr>
                <tr>
                    <td height="50"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>